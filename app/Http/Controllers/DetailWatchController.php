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
        $detailWatches = DetailWatch::with('watch', 'strap', 'color')->get();
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
        $request->validate([
            'IDWatch' => 'required',
            'IDMaterialStrap' => 'required',
            'IDColor' => 'required',
            'Price' => 'required|numeric',
        ]);
    
        DetailWatch::create($request->all());
    
        return redirect()->route('detail_watches.index')->with('success', 'Chi tiết đồng hồ đã được thêm thành công');
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
        ]);

        $detailWatch = DetailWatch::findOrFail($id);
        $detailWatch->update($request->all());

        return redirect()->route('detail_watches.index')->with('success', 'Chi tiết đồng hồ đã được cập nhật thành công');
    }

    public function destroy($id)
    {
        $detailWatch = DetailWatch::findOrFail($id);
        $detailWatch->delete();

        return redirect()->route('detail_watches.index')->with('success', 'Chi tiết đồng hồ đã được xóa thành công');
    }
}
