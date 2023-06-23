<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Redirect;
use Picqer\Barcode\BarcodeGeneratorHTML;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index',[
            'products'=>Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create',[
            'categories'=>Category::all(),
            'units'=>Unit::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product_code = IdGenerator::generate([
            'table' => 'products',
            'field' => 'product_code',
            'length' => 6,
            'prefix' => 'PC'
        ]);
        $rules = [
            'image' => 'image|file|max:2048',
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'unit_id' => 'required|integer',
            'stock' => 'required|integer',
            'buying_price' => 'required|integer',
            'selling_price' => 'required|integer',
        ];
        $validateData = $request->validate($rules);
         // Save product code value
         $validateData['product_code'] = $product_code;

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/product/'), $imageName);
            $validateData['image'] = $imageName;
        }
        Product::create($validateData);
        return Redirect::route('products.index')->with('success','Unit has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $generator = new BarcodeGeneratorHTML();

        $barcode = $generator->getBarcode($product->product_code, $generator::TYPE_CODE_128);
        return view('admin.products.show',[
            'product'=>$product,
            'barcode'=>$barcode,
        ]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',[
            'product'=>$product,
            'categories'=>Category::all(),
            'units'=>Unit::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'image' => 'image|file|max:2048',
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'unit_id' => 'required|integer',
            'stock' => 'required|integer',
            'buying_price' => 'required|integer',
            'selling_price' => 'required|integer',
        ];
        $validateData = $request->validate($rules);
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/product/'), $imageName);
            $validateData['image'] = $imageName;
        }
        $product->update($validateData);
        return Redirect::route('products.index')->with('success','Unit has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->image){
            if(file_exists(public_path('uploads/product/'.$product->image))){
                unlink(public_path('uploads/product/'.$product->image));
            }
        }
        $product->delete();
        return back();
    }
}
