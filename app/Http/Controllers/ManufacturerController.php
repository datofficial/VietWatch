<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Http\Requests\StoreManufacturerRequest;
use App\Http\Requests\UpdateManufacturerRequest;

class ManufacturerController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::all();
        return view('Dashboard.Manufacturer.index', compact('manufacturers'));
    }

    public function create()
    {
        return view('Dashboard.Manufacturer.create');
    }

    public function store(StoreManufacturerRequest $request)
    {
        $manufacturer = Manufacturer::create($request->validated());

        return redirect()->route('manufacturers.index')->with('success', 'Nhà sản xuất đã được tạo thành công');
    }

    public function show(Manufacturer $manufacturer)
    {
        return view('Dashboard.Manufacturer.show', compact('manufacturer'));
    }

    public function edit(Manufacturer $manufacturer)
    {
        return view('Dashboard.Manufacturer.edit', compact('manufacturer'));
    }

    public function update(UpdateManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer->update($request->validated());

        return redirect()->route('manufacturers.index')->with('success', 'Nhà sản xuất đã được cập nhật thành công');
    }

    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();

        return redirect()->route('manufacturers.index')->with('success', 'Nhà sản xuất đã được xóa thành công');
    }
}
