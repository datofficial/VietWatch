<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Hiển thị danh sách đơn hàng
    public function index()
    {
        $orders = Order::orderByRaw("FIELD(Status, 'pending', 'processing', 'completed', 'cancelled')")
                ->orderBy('created_at', 'desc')
                ->paginate(4); 
        return view('Dashboard.Order.index', compact('orders'));
    }

    // Hiển thị chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with('detailOrders.detailWatch')->findOrFail($id);
        return view('Dashboard.Order.show', compact('order'));
    }

    // Hiển thị form tạo đơn hàng mới
    public function create()
    {
        // Load thêm các dữ liệu cần thiết nếu có (ví dụ: danh sách sản phẩm, khách hàng,...)
        return view('Dashboard.Order.create');
    }

    // Lưu đơn hàng mới
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'total_price' => 'required|numeric',
            // Thêm các trường cần thiết khác
        ]);

        $order = new Order();
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->address = $request->address;
        $order->total_price = $request->total_price;
        // Gán thêm các trường khác nếu có
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được tạo thành công');
    }

    // Hiển thị form chỉnh sửa đơn hàng
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('Dashboard.Order.edit', compact('order'));
    }

    // Cập nhật đơn hàng
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,processing,completed,cancelled',
        ]);
    
        $order = Order::findOrFail($id);
        $order->Status = $request->status;
        $order->save();
    
        return redirect()->route('orders.index')->with('success', 'Trạng thái đơn hàng đã được cập nhật thành công.');
    }

    // Xóa đơn hàng
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được xóa thành công');
    }
}
