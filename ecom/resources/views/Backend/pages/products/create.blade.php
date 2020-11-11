@extends('Backend.layout.template')


@section('adminBodyContent')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create New Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create New Product</li>
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
                                <h3 class="card-title">Add Product</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body" style="display: block;">
                                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" class="form-control" name="productTitle"
                                                       placeholder="Enter Product Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="productDescription" class="form-control"
                                                          placeholder="Product Description" id="" cols="30"
                                                          rows="10"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Regular Price</label>
                                                <input type="text" class="form-control" id=""
                                                       name="productRegularPrice" aria-describedby="emailHelp"
                                                       placeholder="Regular Price">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select name="productCategory" id="" class="form-control">
                                                    <option value="0">Select a Category</option>
                                                    @foreach($productCategory as $parentCategory)
                                                        <option
                                                            value="{{ $parentCategory->id }}">{{ $parentCategory->cat_name }}</option>
                                                        @foreach(App\Models\Backend\Category::orderBy('cat_name','asc')->where('parent_id', $parentCategory->id)->get() as $childCategory)
                                                            <option value="{{ $childCategory->id }}">
                                                                -- {{ $childCategory->cat_name }}</option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Brand</label>
                                                <select name="productBrand" id="" class="form-control">
                                                    <option value="0">Select a Brand</option>
                                                    @foreach($productBrand as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="">Offer Price</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                       name="productOfferPrice" aria-describedby="emailHelp"
                                                       placeholder="Offer Price">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Quantity</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                       name="productQuantity" aria-describedby="emailHelp"
                                                       placeholder="Quantity">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="productStatus" id="" class="form-control">
                                                    <option value="#">Select a Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Draft</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Product Main Thumbnail</label>
                                                <input type="file" class="form-control-file" name="productThumbnail[]"
                                                       id="exampleFormControlFile1">
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label for="">Image 2</label>
                                                        <input type="file" class="form-control-file"
                                                               name="productThumbnail[]"
                                                               id="exampleFormControlFile1">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label for="">Image 3</label>
                                                        <input type="file" class="form-control-file"
                                                               name="productThumbnail[]"
                                                               id="exampleFormControlFile1">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label for="">Image 4</label>
                                                        <input type="file" class="form-control-file"
                                                               name="productThumbnail[]"
                                                               id="exampleFormControlFile1">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label for="">Image 5</label>
                                                        <input type="file" class="form-control-file"
                                                               name="productThumbnail[]"
                                                               id="exampleFormControlFile1">
                                                    </div>
                                                </div>
                                            </div>


                                            <button type="submit" class="btn btn-primary d-inline-block">Add New Product
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
