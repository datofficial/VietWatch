<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('Dashboard.PaymentMethod.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('Dashboard.PaymentMethod.create');
    }

    public function store(StorePaymentMethodRequest $request)
    {
        $paymentMethod = PaymentMethod::create($request->validated());

        return redirect()->route('payment_methods.index')->with('success', 'Phương thức thanh toán đã được tạo thành công');
    }

    public function show(PaymentMethod $paymentMethod)
    {
        return view('Dashboard.PaymentMethod.show', compact('paymentMethod'));
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('Dashboard.PaymentMethod.edit', compact('paymentMethod'));
    }

    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->update($request->validated());

        return redirect()->route('payment_methods.index')->with('success', 'Phương thức thanh toán đã được cập nhật thành công');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();

        return redirect()->route('payment_methods.index')->with('success', 'Phương thức thanh toán đã được xóa thành công');
    }
}
