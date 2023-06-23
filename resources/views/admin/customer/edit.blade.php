@extends('admin.dashboard.body.main')
@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{route('customers.update',$customer->id)}}" method="POST" class="theme-form theme-form-2 mega-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Product Image</h5>
                        </div>
                            <img width="200" class="img-account-profile mb-2" src="{{$customer->photo?asset('uploads/customer/'.$customer->photo):asset('backend/assets/images/user-placeholder.svg') }}" alt="" id="blah" />
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
                                    <input class="form-control" id="name" name="name" type="text" value="{{$customer->name}}">
                                </div>
                                @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title mb-0">Email Address<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control" id="name" name="email" type="text" value="{{$customer->email}}">
                                </div>
                                @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-4 row align-items-center">
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Phone<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{$customer->phone}}">
                                    @error('category_id')
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
                                    <input class="form-control" name="account_holder" type="text" value="{{$customer->account_holder}}">
                                    @error('buying_price')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label-title  mb-2">Account number</label>
                                    <input class="form-control" name="account_nubmer" type="text" value="{{$customer->account_nubmer}}">
                                    @error('selling_price')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title mb-2">Address<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <textarea name="address" class="form-control">{{$customer->address}}</textarea>
                                </div>
                                @error('stock')
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