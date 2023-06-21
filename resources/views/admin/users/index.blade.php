@extends('admin.dashboard.body.main')
@section('css')
    <!-- Data Table css -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/assets/css/datatables.css">
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="title-header option-title">
                    <h5>All Users</h5>
                    <form class="d-inline-flex">
                        <a href="add-new-user.html" class="align-items-center btn btn-theme">
                            <i data-feather="plus"></i>Add New
                        </a>
                    </form>
                </div>

                <div class="table-responsive table-product">
                    <table class="table all-package theme-table" id="table_id">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $key=>$user)
                                <tr>
                                    <td>
                                        <div class="table-image">
                                            <img src="{{asset('backend')}}/{{asset('backend')}}/assets/images/users/1.jpg" class="img-fluid"
                                                alt="">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="user-name">
                                            <span>{{$user->name}}</span>
                                            <span>Essex Court</span>
                                        </div>
                                    </td>
                                    <td>{{$user->email}}</td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="order-detail.html">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalToggle">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
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