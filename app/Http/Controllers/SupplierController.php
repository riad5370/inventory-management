<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.suppliers.index',[
            'supplers'=>Supplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|string|max:50',
            'email'=>'required|email|max:50|unique:suppliers,email',
            'phone'=>'required|string|max:25|unique:suppliers,phone',
            'shopname'=>'required|string|max:100',
            'type'=>'required|string|max:25',
            'bank_name'=>'required|max:50',
            'account_holder'=>'max:50',
            'account_number'=>'max:50',
            'address'=>'required|string|max:150',
            'photo'=>'image|file|mimes:jpg,png,wepb|max:2048',
        ];
        $validateData = $request->validate($rules);

        /*Handle upload an image*/
        if($request->file('photo')){
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/suppliers/'),$imageName);
            $validateData['photo'] =$imageName;
        }
        else{
            $imageName = null; // Only set to null if no photo is provided
        }

        Supplier::create($validateData);
        return Redirect::route('suppliers.index')->withSuccess('New supplier has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit',[
            'supplier'=>$supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $rules = [
            'name'=>'required|string|max:50',
            'email'=>'required|email|max:50|unique:suppliers,email,'.$supplier->id,
            'phone'=>'required|string|max:25|unique:suppliers,phone,'.$supplier->id,
            'shopname'=>'required|string|max:100',
            'type'=>'required|string|max:25',
            'bank_name'=>'required|max:50',
            'account_holder'=>'max:50',
            'account_number'=>'max:50',
            'address'=>'required|string|max:150',
            'photo'=>'image|file|mimes:jpg,png,wepb|max:2048',
        ];
        $validateData = $request->validate($rules);
        if(!$request->hasFile('photo')){
            $supplier->update($validateData);
            return Redirect::route('suppliers.index')->withSuccess('supplier has been updated!');
        }
        if($supplier->photo){
            if(file_exists('uploads/suppliers/'.$supplier->photo)){
                unlink(public_path('uploads/suppliers/'.$supplier->photo));  
            }
        }
        if ($request->file('photo')) {
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/suppliers/'), $imageName);
            $validateData['photo'] = $imageName;
        }
            
        $supplier->update($validateData);
        return Redirect::route('suppliers.index')->withSuccess('supplier has been updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        
        if($supplier->photo){
            $imagePath = public_path('uploads/suppliers/'.$supplier->photo);
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
        }

        $supplier->delete();
        return back()->withSuccess('supplier has been deleted!');
    }
}
