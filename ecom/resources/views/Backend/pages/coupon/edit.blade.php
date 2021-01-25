@extends('Backend.layout.template')


@section('adminBodyContent')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Brand</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Brand Information</li>
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
                                <h3 class="card-title">Update Brand Information</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body" style="display: block;">
                                <form action="{{ route('brands.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="brandName" aria-describedby="emailHelp" placeholder="Enter Brand Name" value="{{ $brand->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Brand Description</label>
                                        <textarea name="brandDesc" id="" cols="30" rows="10" class="form-control" placeholder="Enter Brand Description">{{ $brand->desc }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        @if($brand->image == null)
                                            No icon available <br>
                                        @else
                                            <img src="{{ asset('Backend/img/Brands/' . $brand->image) }}" width="50" alt="Brand Icon">
                                            <br>
                                        @endif
                                        <label for="exampleFormControlFile1">Brand Logo</label>
                                        <input type="file" class="form-control-file" name="brandLogo" id="exampleFormControlFile1">
                                    </div>


                                    <button type="submit" class="btn btn-primary d-inline-block">Save Changes</button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
