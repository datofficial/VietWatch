<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watch;
use App\Models\User;
use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $watches = Watch::all();
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('Home.index', compact('watches', 'categories', 'manufacturers'));
    }

    // Trang giỏ hàng
    public function cart()
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('Home.Cart.index', compact('categories', 'manufacturers'));
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
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('Home.DetailWatch.index', compact('watch', 'categories', 'manufacturers'));
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
