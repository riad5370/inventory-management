@extends('admin.dashboard.body.main')
@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{route('customers.store')}}" method="POST" class="theme-form theme-form-2 mega-form" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Product Image</h5>
                        </div>
                            <img width="200" class="img-account-profile mb-2" src="{{ asset('backend/assets/images/bg.png') }}" alt="" id="blah" />
                            <div class="small font-italic text-muted mb-2">JPG or PNG no larger than 2 MB</div>
                            <input type="file" class="form-control" name="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                </div>
            </div>
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Customer Details</h5>
                        </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title mb-0">Customer Name<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Product Name">
                                </div>
                                @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title mb-0">Email Address<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="email" type="text" placeholder="Product Name">
                                </div>
                                @error('email')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-4 row align-items-center">
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Phone<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone">
                                    @error('phone')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Unit<span class="text-danger">*</span></label>
                                    <select name="unit_id" id="" class="form-control form-select">
                                        <option selected="" disabled="">select tag:</option>
                                        {{-- @foreach ($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}}</option> 
                                        @endforeach --}}
                                    </select>
                                    @error('unit_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Account holder</label>
                                    <input class="form-control" name="account_holder" type="text" placeholder="Account holder">
                                    @error('account_holder')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label-title mb-2">Account number</label>
                                    <input class="form-control" name="account_nubmer" type="text" placeholder="Account number">
                                    @error('account_nubmer')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title mb-2">Address<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <textarea name="address" class="form-control"></textarea>
                                </div>
                                @error('address')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-primary d-inline btn-sm" type="submit">Save</button>
                                <a class="btn btn-secondary d-inline" href="{{ route('customers.index') }}">Cancel</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection