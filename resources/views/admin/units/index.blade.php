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
                    <h5>Unit List</h5>
                    <form class="d-inline-flex">
                        <a href="{{route('units.create')}}" class="align-items-center btn btn-theme">
                            <i data-feather="plus"></i>Add New
                        </a>
                    </form>
                </div>

                <div class="table-responsive table-product">
                    <table class="table all-package theme-table" id="table_id">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($units as $key=>$unit)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>{{$unit->name}}</td>
                                    <td>{{$unit->slug}}</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{route('units.edit',$unit->id)}}">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" onclick="return confirm('Are you sure you want to delete this record?') && (event.preventDefault(), document.getElementById('destroy').submit())">
                                                    <i class="ri-delete-bin-line"></i>
                                                  </a>
                                                <form action="{{route('units.destroy',$unit->id)}}" method="POST" id="destroy">
                                                    @csrf
                                                    @method('DELETE')
                                                    
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