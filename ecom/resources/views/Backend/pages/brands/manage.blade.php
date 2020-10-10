@extends('Backend.layout.template')


@section('adminBodyContent')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Brands</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Brands</li>
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
                                <h3 class="card-title">All Brands</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#SL</th>
                                        <th scope="col">Brand Icon</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Brand Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($brands as $brand)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>
                                            @if($brand->image == null)
                                                No icon available
                                            @else
                                                <img src="{{ asset('Backend.img.Brands' . $brand->image) }}" alt="Brand Icon">
                                            @endif
                                        </td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->desc }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="" class="btn btn-primary">Update</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                        @php
                                        $i++;
                                        @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
