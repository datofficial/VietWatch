<?php

namespace App\Http\Controllers;

use App\Models\Watch;
use App\Models\Manufacturer;
use App\Models\Category;
use App\Http\Requests\StoreWatchRequest;
use App\Http\Requests\UpdateWatchRequest;

class WatchController extends Controller
{
    public function index()
    {
        $watches = Watch::all();
        return view('Dashboard.Watch.index', compact('watches'));
    }

    public function create()
    {
        $manufacturers = Manufacturer::all();
        $categories = Category::all();
        return view('Dashboard.Watch.create', compact('manufacturers', 'categories'));
    }

    public function store(StoreWatchRequest $request)
    {
        $data = $request->validated();
        Watch::create($data);
        return redirect()->route('watches.index')->with('success', 'Đồng hồ đã được tạo thành công');
    }

    public function show(Watch $watch)
    {
        return view('Dashboard.Watch.show', compact('watch'));
    }

    public function edit(Watch $watch)
    {
        $manufacturers = Manufacturer::all();
        $categories = Category::all();
        return view('Dashboard.Watch.edit', compact('watch', 'manufacturers', 'categories'));
    }

    public function update(UpdateWatchRequest $request, Watch $watch)
    {
        $data = $request->validated();
        $watch->update($data);
        return redirect()->route('watches.index')->with('success', 'Đồng hồ đã được cập nhật thành công');
    }

    public function destroy(Watch $watch)
    {
        $watch->delete();
        return redirect()->route('watches.index')->with('success', 'Đồng hồ đã được xóa thành công');
    }
}
