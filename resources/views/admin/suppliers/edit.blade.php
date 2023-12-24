@extends('admin.dashboard.body.main')
@section('content')
<header>
    <div class="bg-primary p-3 fs-2">Edit Supplier</div>
</header>
<div class="row">
    <div class="col-12">
        <form action="{{route('suppliers.update',$supplier->id)}}" method="POST" class="theme-form theme-form-2 mega-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Image</h5>
                        </div>
                            <img width="200" class="img-account-profile mb-2" src="{{$supplier->photo?asset('uploads/suppliers/'.$supplier->photo):asset('backend/assets/images/user-placeholder.svg') }}" alt="" id="blah" />

                            <div class="small font-italic text-muted mb-2">JPG or PNG no larger than 2 MB</div>
                            <input type="file" class="form-control" name="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                </div>
            </div>
            <div class="col-sm-8 m-auto">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-primary">{{session('success')}}</div>
                    @endif
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Supplier Details</h5>
                        </div>
                            <div class="mb-2 row align-items-center">
                                <label class="form-label-title mb-0">Name<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control" id="name" value="{{$supplier->name}}" name="name" type="text">
                                </div>
                                @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-2 row align-items-center">
                                <label class="form-label-title mb-0">Email Address<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control" value="{{$supplier->email}}" name="email" type="email">
                                </div>
                                @error('email')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-2 row align-items-center">
                                <label class="form-label-title mb-0">Phone<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input type="number" value="{{$supplier->phone}}" class="form-control" name="phone">
                                </div>
                                @error('phone')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-2 row align-items-center">
                                <label class="form-label-title mb-0">Shopname<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{$supplier->shopname}}" class="form-control" name="shopname">
                                </div>
                                @error('shopname')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-2 row align-items-center">
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Type of Supplier<span class="text-danger">*</span></label>
                                    <select name="type" id="" class="form-control form-select">
                                        <option selected="" disabled="">type of supplier:</option>
                                        <option {{$supplier->type == 'Whole Seller'?'selected':''}} value="Whole Seller">Whole Seller</option>
                                        <option {{$supplier->type == 'Distributor'?'selected':''}} value="Distributor">Distributor</option>
                                    </select>
                                    @error('type')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Bank Name<span class="text-danger">*</span></label>
                                    <select name="bank_name" id="" class="form-control form-select">
                                        <option selected="" disabled="">select bank:</option>
                                        <option {{$supplier->bank_name == 'AB'?'selected':''}} value="AB">AB</option>
                                        <option {{$supplier->bank_name == 'city'?'selected':''}} value="city">city</option>
                                        <option {{$supplier->bank_name == 'SIBL'?'selected':''}} value="SIBL">SIBL</option>
                                    </select>
                                    @error('unit_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row align-items-center">
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Account holder</label>
                                    <input class="form-control" value="{{$supplier->account_holder}}" name="account_holder" type="text">
                                    @error('account_holder')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label-title mb-2">Account number</label>
                                    <input class="form-control" value="{{$supplier->account_number}}" name="account_number" type="text">
                                    @error('account_nubmer')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row align-items-center">
                                <label class="form-label-title mb-2">Address<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <textarea name="address" class="form-control">{{$supplier->address}}</textarea>
                                </div>
                                @error('address')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-primary d-inline btn-sm" type="submit">Save</button>
                                <a class="btn btn-secondary d-inline" href="{{ route('suppliers.index') }}">Cancel</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection