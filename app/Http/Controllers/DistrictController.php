<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\City;
use App\Http\Requests\StoreDistrictRequest;
use App\Http\Requests\UpdateDistrictRequest;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::with('city')->get();
        return view('Dashboard.District.index', compact('districts'));
    }

    public function create()
    {
        $cities = City::all();
        return view('Dashboard.District.create', compact('cities'));
    }

    public function store(StoreDistrictRequest $request)
    {
        $district = District::create($request->validated());

        return redirect()->route('districts.index')->with('success', 'Quận/huyện đã được tạo thành công');
    }

    public function show(District $district)
    {
        return view('Dashboard.District.show', compact('district'));
    }

    public function edit(District $district)
    {
        $cities = City::all();
        return view('Dashboard.District.edit', compact('district', 'cities'));
    }

    public function update(UpdateDistrictRequest $request, District $district)
    {
        $district->update($request->validated());

        return redirect()->route('districts.index')->with('success', 'Quận/huyện đã được cập nhật thành công');
    }

    public function destroy(District $district)
    {
        $district->delete();

        return redirect()->route('districts.index')->with('success', 'Quận/huyện đã được xóa thành công');
    }

    // Method for AJAX
    public function getDistrictsByCity($city_id)
    {
        $districts = District::where('city_id', $city_id)->get();
        return response()->json($districts->pluck('NameDistrict', 'id'));
    }
}
