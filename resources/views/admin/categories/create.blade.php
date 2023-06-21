@extends('admin.dashboard.body.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Add New Category</h5>
                        </div>

                        <form action="{{route('categories.store')}}" method="POST" class="theme-form theme-form-2 mega-form">
                            @csrf
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Category Name<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Category Name">
                                </div>
                                @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Category Slug</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="slug" name="slug"type="text" readonly placeholder="Category Slug">
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary d-inline btn-sm" type="submit">Save</button>
                                <a class="btn btn-secondary d-inline" href="{{ route('categories.index') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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