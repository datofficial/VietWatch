<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Dashboard.index');
    }

    public function orders()
    {
        $orders = Order::all(); // Hoặc sử dụng paginate nếu cần phân trang
        return view('Dashboard.Orders.index', compact('orders'));
    }
}