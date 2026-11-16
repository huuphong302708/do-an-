<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('admin.Country.Country', compact('countries'));
    }

    public function create()
    {
        return view('admin.Country.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Vui lòng nhập tên quốc gia',
        ]); 

        Country::create(['name' => $request->name]);

        return redirect()->route('admin.country.index')->with('success', 'Thêm quốc gia thành công!');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.Country.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Vui lòng nhập tên quốc gia',
        ]);

        $country = Country::findOrFail($id);
        $country->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.country.index')->with('success', 'Cập nhật quốc gia thành công!');
    }

    public function delete($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return redirect()->route('admin.country.index')->with('success', 'Xóa quốc gia thành công!');
    }
}

