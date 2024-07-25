<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailWatch;
use App\Models\Watch;
use App\Models\MaterialStrap;
use App\Models\Color;

class DetailWatchController extends Controller
{
    public function index()
    {
        $detailWatches = DetailWatch::with('watch', 'materialStrap', 'color')->get();
        return view('Dashboard.DetailWatch.index', compact('detailWatches'));
    }

    public function create()
    {
        $watches = Watch::all();
        $materialStraps = MaterialStrap::all();
        $colors = Color::all();
        return view('Dashboard.DetailWatch.create', compact('watches', 'materialStraps', 'colors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IDWatch' => 'required|exists:watches,id',
            'IDMaterialStrap' => 'required|exists:material_straps,id',
            'IDColor' => 'required|exists:colors,id',
            'Price' => 'required|numeric',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Quantity' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('images', 'public');
            $validatedData['Image'] = $imagePath;
        }

        DetailWatch::create($validatedData);

        return redirect()->route('detail_watches.index')->with('success', 'Chi tiết Đồng hồ đã được thêm thành công');
    }

    public function edit($id)
    {
        $detailWatch = DetailWatch::findOrFail($id);
        $watches = Watch::all();
        $materialStraps = MaterialStrap::all();
        $colors = Color::all();
        return view('Dashboard.DetailWatch.edit', compact('detailWatch', 'watches', 'materialStraps', 'colors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'IDWatch' => 'required|exists:watches,id',
            'IDMaterialStrap' => 'required|exists:material_straps,id',
            'IDColor' => 'required|exists:colors,id',
            'Price' => 'required|numeric',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Quantity' => 'required|integer|min:0',
        ]);

        $detailWatch = DetailWatch::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('images', 'public');
            $data['Image'] = $imagePath;
        }

        $detailWatch->update($data);

        return redirect()->route('detail_watches.index')->with('success', 'Chi tiết đồng hồ đã được cập nhật thành công');
    }

    public function destroy($id)
    {
        $detailWatch = DetailWatch::findOrFail($id);
        $detailWatch->delete();
        return redirect()->route('detail_watches.index')->with('success', 'Chi tiết đồng hồ đã được xóa thành công');
    }
}
