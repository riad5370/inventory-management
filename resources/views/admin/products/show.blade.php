@extends('admin.dashboard.body.main')
@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{route('products.store')}}" method="POST" class="theme-form theme-form-2 mega-form" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Product Image</h5>
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
                            <h5>Product Details</h5>
                        </div>
                        <div class="mb-4 row align-items-center">

                            <div class="col-sm-6">
                                <label class="form-label-title  mb-2">Barcode</label>
                                <div class="mt-1">
                                    {!! $barcode !!}
                                    </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label-title  mb-2">Product code</label>
                                <div class="form-control form-control-solid">{{ $product->product_code  }}</div>
                            </div>
                            
                        </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title mb-0">Product Name</label>
                                <div class="form-control form-control-solid">{{ $product->name  }}</div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Category</label>
                                    <div class="form-control form-control-solid">{{ $product->category->name  }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Unit</label>
                                    <div class="form-control form-control-solid">{{ $product->unit->name  }}</div>
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Buying Price</label>
                                    <div class="form-control form-control-solid">{{ $product->buying_price  }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Selling Price</label>
                                    <div class="form-control form-control-solid">{{ $product->selling_price  }}</div>
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title mb-2">Stock</label>
                                <div class="form-control form-control-solid">{{ $product->stock  }}</div>
                            </div>
                            <div>
                                <a class="btn btn-primary d-inline" href="{{ route('products.index') }}">Back</a>
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