@extends('Backend.layout.template')


@section('adminBodyContent')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit District</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit District Information</li>
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
                                <h3 class="card-title">All District</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body" style="display: block;">
                                <form action="{{ route('district.update', $district->id) }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                               name="districtName" aria-describedby="emailHelp"
                                               placeholder="Enter District Name" value="{{ $district->district_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select Parent Category</label>
                                        <select name="divisionName" id="" class="form-control">
                                            <option value="0">Select a category if any</option>
                                            @foreach($divisions  as $division)
                                                <option
                                                    value="{{ $division->id }}" {{ $district->division_id == $division->id ? 'selected' : ' ' }}>
                                                    {{ $division->division_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <button type="submit" class="btn btn-primary d-inline-block">Save Changes
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
