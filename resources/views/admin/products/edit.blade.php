@extends('admin.dashboard.body.main')
@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{route('products.update',$product->id)}}" method="POST" class="theme-form theme-form-2 mega-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Update Product Image</h5>
                        </div>
                            <img width="200" class="img-account-profile mb-2" src="{{$product->image?asset('uploads/product/'.$product->image):asset('backend/assets/images/bg.png') }}" alt="" id="blah" />
                            <div class="small font-italic text-muted mb-2">JPG or PNG no larger than 2 MB</div>
                            <input type="file" class="form-control" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                </div>
            </div>
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Edit Product</h5>
                        </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title mb-0">Product Name<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control" id="name" name="name" type="text" value="{{$product->name}}" placeholder="Product Name">
                                </div>
                                @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-4 row align-items-center">
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Category<span class="text-danger">*</span></label>
                                    <select name="category_id" id="" class="form-control form-select" >
                                        <option value="">select category:</option> 
                                        @foreach ($categories as $category)
                                            <option {{$product->category_id == $category->id?'selected':''}} value="{{$category->id}}">{{$category->name}}</option> 
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Unit<span class="text-danger">*</span></label>
                                    <select name="unit_id" id="" class="form-control form-select">
                                        <option selected="" disabled="">select tag:</option>
                                        @foreach ($units as $unit)
                                            <option {{$product->unit_id == $unit->id?'selected':''}} value="{{$unit->id}}">{{$unit->name}}</option> 
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Buying Price<span class="text-danger">*</span></label>
                                    <input class="form-control" name="buying_price" type="number" value="{{$product->buying_price}}" placeholder="Buying Price">
                                    @error('buying_price')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Selling Price<span class="text-danger">*</span></label>
                                    <input class="form-control" name="selling_price" type="number" value="{{$product->selling_price}}" placeholder="Selling Price">
                                    @error('selling_price')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title mb-2">Stock<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="stock" value="{{$product->stock}}" type="number" placeholder="Stock">
                                </div>
                                @error('stock')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-primary d-inline btn-sm" type="submit">Save</button>
                                <a class="btn btn-secondary d-inline" href="{{ route('products.index') }}">Cancel</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
<script>
    //slug-creation
    const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");
    name.addEventListener("keyup", function() {
        let preslug = name.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });
</script>
@endsection