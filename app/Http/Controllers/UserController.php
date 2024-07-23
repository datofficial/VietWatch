<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('Dashboard.User.create', compact('cities'));
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
        return view('Dashboard.User.edit', compact('user', 'cities'));
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
        return view('Home.Register.index', [
        'districts' => $districts,
        'cities' => $cities,
        'wards' => $wards
        ]);
    }

    public function register_process(Request $request)
    {
        $array = [];
        $array = Arr::add($array,'NameUser', $request->name);
        $array = Arr::add($array, 'Email', $request->email);
        $array = Arr::add($array, 'Password', bcrypt($request->password));
        $array = Arr::add($array, 'PhoneNumber', $request->phonenumber);
        $array = Arr::add($array, 'Address', $request->address);
        $array = Arr::add($array, 'Role', $request->role);
        $array = Arr::add($array, 'IDCity', $request->IDCity);
        $array = Arr::add($array, 'IDDistrict', $request->IDDistrict);
        $array = Arr::add($array, 'IDWard', $request->IDWard);
        
        User::create($array);
        // flash()->addSuccess('Thêm Thành Công');
        return Redirect::route('home.loginCustomer');
    }

    public function loginCustomer() {
        return view('Home.Login.index');
    }

    

    public function loginCustomer_process(Request $request) {
        $accountCustomer = $request->only(['email', 'password']);

        if(Auth::guard('users')->attempt($accountCustomer)){
            echo 'login';
        }else{
            return Redirect::route('home.loginCustomer');
        }
    }

    public function logout() {
        // Auth::logout();
        // session()->forget('customer');
        // return Redirect::route('customer.login');
    }
}
