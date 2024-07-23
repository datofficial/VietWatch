<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('Dashboard.Color.index', compact('colors'));
    }

    public function create()
    {
        return view('Dashboard.Color.create');
    }

    public function store(StoreColorRequest $request)
    {
        $color = Color::create($request->validated());

        return redirect()->route('colors.index')->with('success', 'Màu đồng hồ đã được tạo thành công');
    }

    public function show(Color $color)
    {
        return view('Dashboard.Color.show', compact('color'));
    }

    public function edit(Color $color)
    {
        return view('Dashboard.Color.edit', compact('color'));
    }

    public function update(UpdateColorRequest $request, Color $color)
    {
        $color->update($request->validated());

        return redirect()->route('colors.index')->with('success', 'Màu đồng hồ đã được cập nhật thành công');
    }

    public function destroy(Color $color)
    {
        $color->delete();

        return redirect()->route('colors.index')->with('success', 'Màu đồng hồ đã được xóa thành công');
    }
}
