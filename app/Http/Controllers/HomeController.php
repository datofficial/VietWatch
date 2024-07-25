<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watch;
use App\Models\User;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\DetailWatch;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

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
        $cart = Session::get('cart', []);
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        
        // Tính tổng số tiền
        $total = 0;
        foreach ($cart as $item) {
            if ($item['quantity'] < 1) {
                return redirect()->route('home.cart')->with('error', 'Số lượng sản phẩm không hợp lệ. Vui lòng cập nhật giỏ hàng.');
            }
            $total += $item['price'] * $item['quantity'];
        }

        return view('Home.Checkout.index', compact('categories', 'manufacturers', 'cart', 'total'));
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
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('Home.Profile.index', compact('categories', 'manufacturers'));
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
}
