@extends('Backend.layout.template')


@section('adminBodyContent')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Categories</li>
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
                            <h3 class="card-title">All Category</h3>

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
                                        <th scope="col">Category Icon</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Category Description</th>
                                        <th scope="col">Parent Category</th>
                                        <th scope="col">Is Featured?</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($category as $cat)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>
                                            @if($cat->cat_thumbnail == null)
                                            No icon available
                                            @else
                                            <img src="{{ asset('Backend/img/category/' . $cat->cat_thumbnail) }}"
                                                width="50" alt="Category Icon">
                                            @endif
                                        </td>
                                        <td><strong>{{ $cat->cat_name }}</strong></td>
                                        <td>{{ $cat->cat_description }}</td>
                                        <td>
                                            @if($cat->parent_id == 0)
                                            <span class="badge badge-success">Primary</span>
                                            @else
                                            @if(empty($cat->parent_id))
                                            <span class="badge badge-warning">No Parent</span>
                                            @else
                                            <span class="badge badge-primary">{{ $cat->parent->cat_name}}</span>
                                            @endif

                                            @endif
                                        </td>
                                        <td>
                                            @if($cat->cat_featured == 0)
                                            <span class="badge badge-danger">No</span>
                                            @else
                                            <span class="badge badge-primary">Yes</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                @if($cat->parent_id == 0)
                                                <a href="{{ route('category.edit', $cat->id) }}"
                                                    class="btn btn-primary btn-sm">Update</a>
                                                @else
                                                <a href="{{ route('category.edit', $cat->id) }}"
                                                    class="btn btn-primary btn-sm">Update</a>
                                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteBrand{{ $cat->id }}">Delete</a>
                                                @endif

                                                {{-- Modal start--}}
                                                <div class="modal fade" id="deleteBrand{{ $cat->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are you
                                                                    sure?</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('category.destroy', $cat->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Modal end--}}
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