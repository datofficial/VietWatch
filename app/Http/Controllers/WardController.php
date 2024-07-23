<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use App\Models\District;
use App\Http\Requests\StoreWardRequest;
use App\Http\Requests\UpdateWardRequest;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function index()
    {
        $wards = Ward::with('district')->get();
        return view('Dashboard.Ward.index', compact('wards'));
    }

    public function create()
    {
        $districts = District::all();
        return view('Dashboard.Ward.create', compact('districts'));
    }

    public function store(StoreWardRequest $request)
    {
        $ward = Ward::create($request->validated());

        return redirect()->route('wards.index')->with('success', 'Phường/xã đã được tạo thành công');
    }

    public function show(Ward $ward)
    {
        return view('Dashboard.Ward.show', compact('ward'));
    }

    public function edit(Ward $ward)
    {
        $districts = District::all();
        return view('Dashboard.Ward.edit', compact('ward', 'districts'));
    }

    public function update(UpdateWardRequest $request, Ward $ward)
    {
        $ward->update($request->validated());

        return redirect()->route('wards.index')->with('success', 'Phường/xã đã được cập nhật thành công');
    }

    public function destroy(Ward $ward)
    {
        $ward->delete();

        return redirect()->route('wards.index')->with('success', 'Phường/xã đã được xóa thành công');
    }

    // Method for AJAX
    public function getWardsByDistrict($district_id)
    {
        $wards = Ward::where('district_id', $district_id)->get();
        return response()->json($wards->pluck('NameWard', 'id'));
    }
}
