<?php

namespace App\Http\Controllers;

use App\Models\MaterialStrap;
use App\Http\Requests\StoreMaterialStrapRequest;
use App\Http\Requests\UpdateMaterialStrapRequest;

class MaterialStrapController extends Controller
{
    public function index()
    {
        $materialStraps = MaterialStrap::all();
        return view('Dashboard.MaterialStrap.index', compact('materialStraps'));
    }

    public function create()
    {
        return view('Dashboard.MaterialStrap.create');
    }

    public function store(StoreMaterialStrapRequest $request)
    {
        $materialStrap = MaterialStrap::create($request->validated());

        return redirect()->route('material_straps.index')->with('success', 'Chất liệu dây đã được tạo thành công');
    }

    public function show(MaterialStrap $materialStrap)
    {
        return view('Dashboard.MaterialStrap.show', compact('materialStrap'));
    }

    public function edit(MaterialStrap $materialStrap)
    {
        return view('Dashboard.MaterialStrap.edit', compact('materialStrap'));
    }

    public function update(UpdateMaterialStrapRequest $request, MaterialStrap $materialStrap)
    {
        $materialStrap->update($request->validated());

        return redirect()->route('material_straps.index')->with('success', 'Chất liệu dây đã được cập nhật thành công');
    }

    public function destroy(MaterialStrap $materialStrap)
    {
        $materialStrap->delete();

        return redirect()->route('material_straps.index')->with('success', 'Chất liệu dây đã được xóa thành công');
    }
}
