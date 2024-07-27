<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watch;
use App\Models\User;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\DetailWatch;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Models\Order;
use App\Models\DetailOrder; 
use App\Models\PaymentMethod; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $watches = Watch::with('detailWatches')->get(); // Lấy watches cùng với detail watches
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('Home.index', compact('watches', 'categories', 'manufacturers'));
    }

    // Trang giỏ hàng
    public function cart()
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        $cart = Session::get('cart', []);
        return view('Home.Cart.index', compact('categories', 'manufacturers', 'cart'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request)
    {
        $detailWatch = DetailWatch::with('watch', 'materialStrap', 'color')->findOrFail($request->detailWatchId);
        $cart = Session::get('cart', []);
        
        $id = $detailWatch->id;
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $detailWatch->watch->Name,
                'price' => $detailWatch->Price,
                'quantity' => 1,
                'material' => $detailWatch->materialStrap->Name,
                'color' => $detailWatch->color->Name,
                'image' => $detailWatch->Image
            ];
        }
    
        Session::put('cart', $cart);
        return redirect()->route('home.cart')->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->route('home.cart')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateCart(Request $request, $id)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            if ($request->quantity < 1) {
                unset($cart[$id]);
                Session::put('cart', $cart);
                return redirect()->route('home.cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
            } else {
                $cart[$id]['quantity'] = $request->quantity;
                Session::put('cart', $cart);
                return redirect()->route('home.cart')->with('success', 'Đã cập nhật số lượng sản phẩm!');
            }
        }
        return redirect()->route('home.cart')->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng!');
    }

    // Trang thanh toán
    public function checkout()
    {
            $user = Auth::guard('customers')->user(); // Lấy thông tin khách hàng đăng nhập

        // Nếu khách hàng chưa đăng nhập, chuyển hướng đến trang đăng nhập
        if (!$user) {
            return redirect()->route('home.loginCustomer')->with('error', 'Bạn cần đăng nhập để thanh toán.');
        }

        $cart = Session::get('cart', []);
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        
        // Lấy danh sách các thành phố, quận/huyện, xã/phường, và phương thức thanh toán
        $cities = City::all();
        $districts = District::all();
        $wards = Ward::all();
        $paymentMethods = PaymentMethod::all();

        // Tính tổng số tiền
        $total = 0;
        foreach ($cart as $item) {
            if ($item['quantity'] < 1) {
                return redirect()->route('home.cart')->with('error', 'Số lượng sản phẩm không hợp lệ. Vui lòng cập nhật giỏ hàng.');
            }
            $total += $item['price'] * $item['quantity'];
        }

        return view('Home.Checkout.index', compact('categories', 'manufacturers', 'cart', 'total', 'user', 'cities', 'districts', 'wards', 'paymentMethods'));
    }

    // Xử lý thanh toán
    public function processCheckout(Request $request)
    {
        $cart = Session::get('cart', []);

        // Kiểm tra số lượng sản phẩm trong giỏ hàng
        foreach ($cart as $id => $item) {
            if ($item['quantity'] < 1) {
                return redirect()->route('home.checkout')->with('error', 'Số lượng sản phẩm không hợp lệ. Vui lòng cập nhật giỏ hàng.');
            }
        }

        // Xử lý logic thanh toán ở đây
        // Ví dụ: Lưu đơn hàng vào cơ sở dữ liệu, gửi email xác nhận, v.v.

        // Sau khi xử lý thanh toán thành công, xóa giỏ hàng
        Session::forget('cart');

        return redirect()->route('home.index')->with('success', 'Thanh toán thành công!');
    }

    // Trang danh mục
    public function allCategories()
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('Home.Category.index', compact('categories', 'manufacturers'));
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);
        $watches = Watch::where('IDCategory', $id)->paginate(4);
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('Home.Category.index', compact('category', 'watches', 'categories', 'manufacturers'));
    }

    // Trang nhà sản xuất
    public function allManufacturers()
    {
        $manufacturers = Manufacturer::all();
        $categories = Category::all();
        return view('Home.Manufacturer.index', compact('manufacturers', 'categories'));
    }

    public function manufacturer($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $watches = Watch::where('IDManufacturer', $id)->paginate(4);
        $manufacturers = Manufacturer::all();
        $categories = Category::all();
        return view('Home.Manufacturer.index', compact('manufacturer', 'watches', 'categories', 'manufacturers'));
    }

    // Trang chi tiết đồng hồ
    public function detailwatch($id)
    {
        $watch = Watch::with('manufacturer', 'category')->findOrFail($id);
        $detailWatch = DetailWatch::where('IDWatch', $id)->first(); // Lấy detail watch đầu tiên của đồng hồ này
        $relatedDetailWatches = DetailWatch::where('IDWatch', $id)->get(); // Lấy tất cả detail watches của đồng hồ này
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('Home.DetailWatch.index', compact('watch', 'detailWatch', 'relatedDetailWatches', 'categories', 'manufacturers'));
    }

    // Trang liên hệ
    public function contact()
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('Home.Contact.index', compact('categories', 'manufacturers'));
    }

    public function sendContact(Request $request)
    {
        // Xử lý gửi email hoặc lưu thông tin liên hệ vào cơ sở dữ liệu
        // Ví dụ:
        // Mail::to('admin@vietwatch.com')->send(new ContactMail($request->all()));
    
        return redirect()->route('home.contact')->with('success', 'Cảm ơn bạn đã liên hệ với chúng tôi!');
    }

    // Trang thông tin khách hàng
    public function profile()
    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('Home.Profile.index', compact('categories', 'manufacturers', 'user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        $cities = City::all();
        $districts = District::all();
        $wards = Ward::all();

        return view('Home.Profile.edit', compact('user', 'cities', 'districts', 'wards'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'NameUser' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . session('customer.id'),
            'PhoneNumber' => 'required|string|max:15',
            'Address' => 'required|string|max:255',
            'IDCity' => 'required|exists:cities,id',
            'IDDistrict' => 'required|exists:districts,id',
            'IDWard' => 'required|exists:wards,id',
        ]);
    
        $user = User::find(session('customer.id'));
        $user->NameUser = $request->NameUser;
        $user->email = $request->email;
        $user->PhoneNumber = $request->PhoneNumber;
        $user->Address = $request->Address;
        $user->IDCity = $request->IDCity;
        $user->IDDistrict = $request->IDDistrict;
        $user->IDWard = $request->IDWard;
        $user->save();
    
        session(['customer' => $user]);
    
        return redirect()->route('home.profile')->with('success', 'Thông tin cá nhân đã được cập nhật thành công.');
    }

    public function showRegisterForm()
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('Home.Register.index', compact('categories', 'manufacturers'));
    }

    // Trang đăng ký khách hàng
    public function register(Request $request)
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('home.index')->with('success', 'Đăng ký thành công!');
    }

    // Xem đơn hàng
    public function userOrders(Request $request)
    {
        if (!$request->session()->has('customer')) {
            return redirect()->route('home.loginCustomer')->with('error', 'Bạn cần đăng nhập để xem đơn hàng của mình.');
        }
    
        $customerEmail = $request->session()->get('customer.email');
        $user_id = User::where('email', $customerEmail)->value('id');
        $orders = Order::where('IDUser', $user_id)
                       ->orderBy('created_at', 'desc')
                       ->paginate(4);
    
        return view('Home.Order.index', compact('orders'));
    }

    // Xem chi tiết đơn hàng
    public function orderDetail($id, Request $request)
    {
        if (!$request->session()->has('customer')) {
            return redirect()->route('home.loginCustomer')->with('error', 'Bạn cần đăng nhập để xem chi tiết đơn hàng.');
        }
    
        $order = Order::with('orderDetails.detailWatch.watch', 'orderDetails.detailWatch.materialStrap', 'orderDetails.detailWatch.color')->findOrFail($id);
    
        if ($order->IDUser != $request->session()->get('customer.id')) {
            return redirect()->route('home.orders')->with('error', 'Bạn không có quyền xem đơn hàng này.');
        }
    
        return view('Home.DetailOrder.index', compact('order'));
    }

    // Hủy đơn hàng
    public function cancelOrder($id, Request $request)
    {
        if (!$request->session()->has('customer')) {
            return redirect()->route('home.loginCustomer')->with('error', 'Bạn cần đăng nhập để hủy đơn hàng của mình.');
        }

        $order = Order::findOrFail($id);

        if ($order->IDUser != $request->session()->get('customer.id')) {
            return redirect()->route('home.orders')->with('error', 'Bạn không có quyền hủy đơn hàng này.');
        }

        if ($order->Status == 'pending') {
            $order->Status = 'cancelled';
            $order->save();
            return redirect()->route('home.orders')->with('success', 'Đơn hàng đã được hủy.');
        } else {
            return redirect()->route('home.orders')->with('error', 'Đơn hàng không thể hủy vì đã được xử lý.');
        }
    }

    // Đặt hàng
    public function placeOrder(Request $request)
    {
        if (!$request->session()->has('customer')) {
            return redirect()->route('home.loginCustomer')->with('error', 'Bạn cần đăng nhập để đặt hàng.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|exists:cities,id',
            'district' => 'required|exists:districts,id',
            'ward' => 'required|exists:wards,id',
            'payment_method' => 'required|exists:payment_methods,id',
        ]);

        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('home.cart')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $customerEmail = $request->session()->get('customer.email');
        $user_id = User::where('email', $customerEmail)->value('id');
        $order = new Order();
        $order->NameCustomer = $request->name;
        $order->PhoneCustomer = $request->phone;
        $order->Address = $request->address;
        $order->IDCity = $request->city;
        $order->IDDistrict = $request->district;
        $order->IDWard = $request->ward;
        $order->IDPaymentMethod = $request->payment_method;
        $order->TotalPrice = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        $order->Status = 'pending';
        $order->IDUser = $user_id;
        $order->save();

        foreach ($cart as $item) {
            $orderDetail = new DetailOrder();
            $orderDetail->IDOrder = $order->id;
            $orderDetail->IDDetailWatch = $item['id'];
            $orderDetail->AmountOfWatch = $item['quantity'];
            $orderDetail->Description = 'Order detail for watch id: ' . $item['id'];
            $orderDetail->save();
        }

        Session::forget('cart');

        return redirect()->route('home.orders')->with('success', 'Đơn hàng của bạn đã được đặt thành công.');
    }
}
