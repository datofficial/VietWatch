<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('Dashboard.City.index', compact('cities'));
    }

    public function getCities()
    {
        return response()->json(City::all());
    }
    
    public function create()
    {
        return view('Dashboard.City.create');
    }

    public function store(StoreCityRequest $request)
    {
        $city = City::create($request->validated());

        return redirect()->route('cities.index')->with('success', 'Thành phố đã được tạo thành công');
    }

    public function show(City $city)
    {
        return view('Dashboard.City.show', compact('city'));
    }

    public function edit(City $city)
    {
        return view('Dashboard.City.edit', compact('city'));
    }

    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());

        return redirect()->route('cities.index')->with('success', 'Thành phố đã được cập nhật thành công');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('cities.index')->with('success', 'Thành phố đã được xóa thành công');
    }
}

