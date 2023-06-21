@extends('admin.dashboard.body.main')
@section('css')
    <!-- Data Table css -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/assets/css/datatables.css">
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-primary">{{session('success')}}</div>
            @endif
            <div class="card-body">
                <div class="title-header option-title">
                    <h5>Product List</h5>
                    <form class="d-inline-flex">
                        <a href="{{route('products.create')}}" class="align-items-center btn btn-theme">
                            <i data-feather="plus"></i>Add New
                        </a>
                    </form>
                </div>

                <div class="table-responsive table-product">
                    <table class="table all-package theme-table" id="table_id">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Unit</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $key=>$product)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>
                                        <img width="70" src="{{$product->image?asset('uploads/product/'.$product->image):asset('backend/assets/images/bg.png')}}" alt="">
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        @if (App\Models\Unit::where('id',$product->id)->exists())
                                        {{$product->unit->name}}
                                        @else 
                                        unkhno
                                        @endif
                                        
                                    </td>
                                    <td>{{$product->stock}}</td>
                                    <td>{{$product->selling_price}}</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{route('products.edit',$product->id)}}">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                               
                                                <form action="{{route('products.destroy',$product->id)}}" method="POST" id="destroy">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" onclick="return confirm('Are you sure you want to delete this record?')">
                                                        <i class="ri-delete-bin-line"></i>
                                                      </button>
                                                </form>
                                               
                                            </li>
                                        </ul>
                                    </td>
                                </tr> 
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- All User Table Ends-->
@endsection
@section('js')
    <!-- Data table js -->
    <script src="{{asset('backend')}}/assets/js/jquery.dataTables.js"></script>
    <script src="{{asset('backend')}}/assets/js/custom-data-table.js"></script>

    <!-- all checkbox select js -->
    <script src="{{asset('backend')}}/assets/js/checkbox-all-check.js"></script>
@endsection