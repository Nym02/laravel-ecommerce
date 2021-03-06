@extends('Backend.layout.template')


@section('adminBodyContent')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Products</li>
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
                            <h3 class="card-title">All Product</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#SL</th>
                                            <th scope="col">Thumbnail</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Brand</th>
                                            <th scope="col">Offer Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Is Featured?</th>
                                            <th scope="col">Tags</th>
                                            <th scope="col">Short Description</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach($product_list as $product)
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td>

                                                @foreach($product->productImage as $productImg)

                                                <img src="{{ asset('Backend/img/products/' . $productImg->product_image) }}"
                                                    alt="" width="35">

                                                @php
                                                break;
                                                @endphp

                                                @endforeach

                                            </td>
                                            <td>{{ $product->product_title }}</td>
                                            <td>BDT {{ $product->product_price }}</td>
                                            <td>{{ $product->productCategory->cat_name }}</td>
                                            <td>
                                                @if($product->product_brand_id == 0 || $product->product_brand_id ==
                                                NULL)
                                                <span class="badge badge-danger">No Brand Selected</span>
                                                @else
                                                {{ $product->productBrand->name }}
                                                @endif

                                            </td>
                                            <td>{{ $product->product_offer_price }}</td>
                                            <td>{{ $product->product_quantity }}</td>
                                            <td>
                                                @if($product->product_status == 1)
                                                <span class="badge badge-success">Active</span>
                                                @elseif($product->product_status == 0)
                                                <span class="badge badge-danger">Deactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->is_featured == 1)
                                                <span class="badge badge-success">Featured</span>
                                                @else
                                                <span class="badge badge-warning">Not Featured</span>
                                                @endif
                                            </td>
                                            <td><span class="badge badge-info">{{ $product->product_tag }}</span></td>
                                            <td>
                                                {{ substr($product->product_shortDescription, 0,50) }}
                                            </td>

                                            <td>{{ substr($product->product_description, 0, 50) }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="" data-toggle="modal"
                                                        data-target="#exampleModal{{ $product->id }}"
                                                        class="btn btn-info btn-sm">View</a>
                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                        class="btn btn-primary btn-sm">Update</a>
                                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#deleteProduct{{ $product->id }}">Delete</a>
                                                    {{-- Modal start--}}
                                                    <div class="modal fade" id="deleteProduct{{ $product->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Are
                                                                        you sure?</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('product.destroy', $product->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-danger">
                                                                            Delete
                                                                        </button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Modal end--}}


                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal
                                                                        title</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ...
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection