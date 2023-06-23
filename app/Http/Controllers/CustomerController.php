<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index',[
            'customers'=>$customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'photo' => 'image|file|max:1024',
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:customers,email',
            'phone' => 'required|string|max:25|unique:customers,phone',
            'account_holder' => 'max:50',
            'account_nubmer' => 'max:25',
            'bank_name' => 'max:25',
            'address' => 'required|string|max:100',
        ];
        $validatedData = $request->validate($rules);

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/customer/'), $imageName);
            $validatedData['photo'] = $imageName;
        }
        Customer::create($validatedData);
        return Redirect::route('customers.index')->withSuccess('customer details has been created!');

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
    public function edit(Customer $customer)
    {
        return view('admin.customer.edit',[
            'customer'=>$customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $rules = [
            'photo' => 'image|file|max:1024',
            'name' => 'string|max:50',
            'email' => 'email|max:50|unique:customers,email',
            'phone' => 'string|max:25|unique:customers,phone',
            'account_holder' => 'max:50',
            'account_nubmer' => 'max:25',
            'bank_name' => 'max:25',
            'address' => 'string|max:100',
        ];
        $validatedData = $request->validate($rules);

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/customer/'), $imageName);
            $validatedData['photo'] = $imageName;
        }
        $customer->update($validatedData);
        return Redirect::route('customers.index')->withSuccess('customer details has been created!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
