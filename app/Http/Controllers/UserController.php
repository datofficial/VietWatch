<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\User;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
class UserController extends Controller
{
    public function index()
    {
        $users = User::with('city', 'district', 'ward')->get();
        return view('Dashboard.User.index', compact('users'));
    }

    public function create()
    {
        $cities = City::all();
        $districts = District::all(); // Thêm dòng này để lấy tất cả các quận/huyện
        $wards = Ward::all(); // Thêm dòng này để lấy tất cả các xã/phường
        return view('Dashboard.User.create', compact('cities','districts','wards'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        return redirect()->route('users.index')->with('success', 'Người dùng đã được tạo thành công');
    }

    public function show(User $user)
    {
        return view('Dashboard.User.show', compact('user'));
    }

    public function edit(User $user)
    {
        $cities = City::all();
        $districts = District::all(); // Thêm dòng này để lấy tất cả các quận/huyện
        $wards = Ward::all(); // Thêm dòng này để lấy tất cả các xã/phường
        return view('Dashboard.User.edit', compact('user', 'cities','districts','wards'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('users.index')->with('success', 'Người dùng đã được cập nhật thành công');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Người dùng đã được xóa thành công');
    }

    // AJAX methods
    public function getDistrictsByCity($city_id)
    {
        $districts = District::where('city_id', $city_id)->pluck('NameDistrict', 'id');
        return response()->json($districts);
    }

    public function getWardsByDistrict($district_id)
    {
        $wards = Ward::where('district_id', $district_id)->pluck('NameWard', 'id');
        return response()->json($wards);
    }

    public function registerCustomer() {
        $districts = District::all();
        $cities = City::all();
        $wards = Ward::all();
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('Home.Register.index', [
        'districts' => $districts,
        'cities' => $cities,
        'wards' => $wards,
        'categories' => $categories,
        'manufacturers' => $manufacturers,
        ]);
    }

    public function register_process(Request $request)
    {
        $array = [];
        $array = Arr::add($array,'NameUser', $request->name);
        $array = Arr::add($array, 'email', $request->email);
        $array = Arr::add($array, 'password', Hash::make($request->password));
        $array = Arr::add($array, 'PhoneNumber', $request->phone);
        $array = Arr::add($array, 'Address', $request->address);
        $array = Arr::add($array, 'Role', 'user');
        $array = Arr::add($array, 'IDCity', $request->city);
        $array = Arr::add($array, 'IDDistrict', $request->district);
        $array = Arr::add($array, 'IDWard', $request->ward);
        
        User::create($array);
        // flash()->addSuccess('Thêm Thành Công');
        return Redirect::route('home.loginCustomer');
    }

    public function loginCustomer() {
        return view('Home.Login.index');
    }

    public function loginCustomer_process(Request $request) 
    {
        $credentials = $request->only(['email', 'password']);
        
        // Tìm người dùng theo email
        $user = User::where('email', $request->email)->first();
        
        // Kiểm tra người dùng có tồn tại và vai trò của người dùng có phải là 'user'
        if ($user && $user->Role == 'user') {
            // Thử đăng nhập
            if (Auth::guard('customers')->attempt($credentials)) {
                $account = Auth::guard('customers')->user();
                session(['customer' => $account]);
                return redirect()->route('home.index')->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->route('home.loginCustomer')->with('error', 'Sai email hoặc mật khẩu');
            }
        } else {
            return redirect()->route('home.loginCustomer')->with('error', 'Tài khoản không tồn tại hoặc không có quyền truy cập');
        }
    }

    public function logout() {
        // Auth::logout();
        // session()->forget('customer');
        // return Redirect::route('customer.login');
    }

    // Phương thức hiển thị form đăng nhập admin
    public function showAdminLoginForm()
    {
        return view('Dashboard.Login.index');
    }

    // Phương thức xử lý đăng nhập admin
    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $admin = User::where('email', $request->email)->value('Role');
        if($admin == 'admin') {
            if (Auth::guard('admins')->attempt($credentials)) {
                $account = Auth::guard('admins')->user();
                Auth::login($account);
                session(['admin' => $account]);
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
            }
        }else {
            return redirect()->back()->withErrors(['email' => 'Thông tin đăng nhập chưa chính xác.']);
        }
        
    }

    // Phương thức xử lý đăng xuất admin
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
