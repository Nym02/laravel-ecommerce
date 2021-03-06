@extends('Backend.layout.template')


@section('adminBodyContent')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                            <h3 class="card-title">Edit Product</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body" style="display: block;">
                            <form action="{{ route('product.update', $editProduct->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" name="productTitle"
                                                placeholder="Enter Product Name"
                                                value="{{ $editProduct->product_title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Regular Price</label>
                                            <input type="text" class="form-control" id="" name="productRegularPrice"
                                                aria-describedby="emailHelp" placeholder="Regular Price"
                                                value="{{ $editProduct->product_price }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select name="productCategory" id="" class="form-control">
                                                <option value="0">Select a Category</option>
                                                @foreach($productCategory as $parentCategory)
                                                <option value="{{ $parentCategory->id }}" @if($editProduct->
                                                    product_category_id == $parentCategory->id) selected
                                                    @endif>{{ $parentCategory->cat_name }}</option>
                                                @foreach(App\Models\Backend\Category::orderBy('cat_name','asc')->where('parent_id',
                                                $parentCategory->id)->get() as $childCategory)
                                                <option value="{{ $childCategory->id }}" @if($editProduct->
                                                    product_category_id == $childCategory->id) selected @endif>
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
                                                <option value="{{ $brand->id }}" @if($editProduct->product_brand_id ==
                                                    $brand->id) selected @endif >{{ $brand->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Offer Price</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="productOfferPrice" aria-describedby="emailHelp"
                                                placeholder="Offer Price" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Quantity</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="productQuantity" aria-describedby="emailHelp"
                                                placeholder="Quantity" value="{{ $editProduct->product_quantity }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="productStatus" id="" class="form-control">
                                                <option value="#">Select a Status</option>
                                                <option value="1" @if($editProduct->product_status == 1) selected @endif
                                                    >Active</option>
                                                <option value="0" @if($editProduct->product_status == 0) selected @endif
                                                    >Draft</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Is Featured?</label>
                                            <select name="isFeatured" id="" class="form-control">
                                                <option value="">Select Featured Status</option>
                                                <option value="1" @if($editProduct->is_featured == 1) selected @endif>
                                                    Yes
                                                </option>
                                                <option value="0" @if($editProduct->is_featured == 0) selected @endif>No
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Product Tags</label>
                                            <input type="text" name="productTags" class="form-control"
                                                value="{{ $editProduct->product_tag }}">
                                        </div>






                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">

                                        <div class="form-group">
                                            <label for="">Short Description</label>
                                            <textarea name="shortDescription" class="form-control"
                                                placeholder="Product Description" id="" cols="30"
                                                rows="10">{{ $editProduct->product_shortDescription }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="productDescription" class="form-control"
                                                placeholder="Product Description" id="" cols="30"
                                                rows="10">{{ $editProduct->product_description }}</textarea>
                                        </div>

                                    </div>



                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group">
                                            <label for="">Product Main Thumbnail</label>
                                            <input type="file" class="form-control-file" name="productThumbnail[]"
                                                id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group">
                                            <label for="">Image 2</label>
                                            <input type="file" class="form-control-file" name="productThumbnail[]"
                                                id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group">
                                            <label for="">Image 3</label>
                                            <input type="file" class="form-control-file" name="productThumbnail[]"
                                                id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group">
                                            <label for="">Image 4</label>
                                            <input type="file" class="form-control-file" name="productThumbnail[]"
                                                id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group">
                                            <label for="">Image 5</label>
                                            <input type="file" class="form-control-file" name="productThumbnail[]"
                                                id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                </div>
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