@extends('Backend.layout.template')


@section('adminBodyContent')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Category Information</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">All Categories</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body" style="display: block;">
                                <form action="{{ route('category.update', $category->id) }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                               name="categoryName" aria-describedby="emailHelp"
                                               placeholder="Enter Category Name" value="{{ $category->cat_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select Parent Category</label>
                                        <select name="categoryParent" id="" class="form-control">
                                            <option value="0">Select a category if any</option>
                                            @foreach($primary_category  as $parentCat)
                                                <option value="{{ $parentCat->id }}" {{ $parentCat->id == $category->parent_id ? 'selected' : ' ' }}>{{ $parentCat->cat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Category Description</label>
                                        <textarea name="categoryDesc" id="" cols="30" rows="10" class="form-control"
                                                  placeholder="Enter Category Description">{{ $category->cat_description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Category Logo</label>
                                        <input type="file" class="form-control-file" name="categoryLogo"
                                               id="exampleFormControlFile1">
                                    </div>


                                    <button type="submit" class="btn btn-primary d-inline-block">Add New Category
                                    </button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
