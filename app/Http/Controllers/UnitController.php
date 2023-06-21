<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.units.index',[
            'units'=>Unit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:units,name',
            'slug' => 'required|unique:units,slug|alpha_dash',
        ];
        $validateData = $request->validate($rules);
        Unit::create($validateData);
        return Redirect::route('units.index')->with('success','Unit has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('admin.units.edit',[
            'unit'=>$unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $rules = [
            'name' => 'required|unique:units,name,'.$unit->id,
            'slug' => 'required|alpha_dash|unique:units,slug,'.$unit->id
        ];
        $validateData = $request->validate($rules);
        Unit::where('slug',$unit->slug)->update($validateData);
        return Redirect::route('units.index')->with('success','Unit has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return back()->with('success','Unit has been deleted!');
    }
}
