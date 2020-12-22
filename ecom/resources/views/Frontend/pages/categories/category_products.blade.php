@extends('Frontend.layout.template')
@section('body-content')





<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ route('ecom.home') }}">Home</a></li>
                <li class='active'>All Products</li>
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->

@include('Frontend.includes.sidebar')
<!-- /.sidebar -->
<div class='col-md-9'>
    <!-- ========================================== SECTION – HERO ========================================= -->

    <div id="category" class="category-carousel hidden-xs">
        <div class="item">
            <div class="image"><img src="{{ asset('Frontend/assets/images/banners/cat-banner-1.jpg') }}" alt=""
                    class="img-responsive"></div>
            <div class="container-fluid">
                <div class="caption vertical-top text-left">
                    <div class="big-text"> Big Sale</div>
                    <div class="excerpt hidden-sm hidden-md"> Save up to 49% off</div>
                    <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit
                    </div>
                </div>
                <!-- /.caption -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>


    <div class="clearfix filters-container m-t-10">
        <div class="row">
            <div class="col col-sm-6 col-md-2">
                <div class="filter-tabs">
                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                        <li class="active"><a data-toggle="tab" href="#grid-container"><i
                                    class="icon fa fa-th-large"></i>Grid</a></li>
                        <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a>
                        </li>
                    </ul>
                </div>
                <!-- /.filter-tabs -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6">
                <div class="col col-sm-3 col-md-6 no-padding">
                    <div class="lbl-cnt"><span class="lbl">Sort by</span>
                        <div class="fld inline">
                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position
                                    <span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <li role="presentation"><a href="#">position</a></li>
                                    <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                    <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                    <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.fld -->
                    </div>
                    <!-- /.lbl-cnt -->
                </div>
                <!-- /.col -->
                <div class="col col-sm-3 col-md-6 no-padding">
                    <div class="lbl-cnt"><span class="lbl">Show</span>
                        <div class="fld inline">
                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span
                                        class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <li role="presentation"><a href="#">1</a></li>
                                    <li role="presentation"><a href="#">2</a></li>
                                    <li role="presentation"><a href="#">3</a></li>
                                    <li role="presentation"><a href="#">4</a></li>
                                    <li role="presentation"><a href="#">5</a></li>
                                    <li role="presentation"><a href="#">6</a></li>
                                    <li role="presentation"><a href="#">7</a></li>
                                    <li role="presentation"><a href="#">8</a></li>
                                    <li role="presentation"><a href="#">9</a></li>
                                    <li role="presentation"><a href="#">10</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.fld -->
                    </div>
                    <!-- /.lbl-cnt -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-4 text-right">
                <div class="pagination-container">
                    <ul class="list-inline list-unstyled">
                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                    <!-- /.list-inline -->
                </div>
                <!-- /.pagination-container -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <div class="search-result-container">
        <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                    <div class="row">


                        @php
                        // $products = $category->products()->paginate(15);
                        $products = App\Models\Backend\Product::where('product_category_id',
                        $category->id)->paginate(15);
                        @endphp

                        @if($products->count() > 0)
                        @foreach($products as $product)
                        <div class="col-sm-6 col-md-4 wow fadeInUp animated"
                            style="visibility: visible; animation-name: fadeInUp;">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a
                                                href="{{ route('ecom.productDetails', $product->product_slug) }}"><img
                                                    src="{{ asset('Frontend/assets/images/products/p5.jpg') }}"
                                                    alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag new"><span>new</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a
                                                href="{{ route('ecom.productDetails', $product->product_slug) }}">{{ $product->product_title }}</a>
                                        </h3>
                                        <div class="rating rateit-small rateit">
                                            <button id="rateit-reset-2" data-role="none" class="rateit-reset"
                                                aria-label="reset rating" aria-controls="rateit-range-2"
                                                style="display: none;">

                                            </button>
                                            <div id="rateit-range-2" class="rateit-range" tabindex="0" role="slider"
                                                aria-label="rating" aria-owns="rateit-reset-2" aria-valuemin="0"
                                                aria-valuemax="5" aria-valuenow="4" aria-readonly="true"
                                                style="width: 70px; height: 14px;">
                                                <div class="rateit-selected" style="height: 14px; width: 56px;"></div>
                                                <div class="rateit-hover" style="height:14px"></div>
                                            </div>
                                        </div>
                                        <div class="description"></div>
                                        <div class="product-price">
                                            @if($product->product_offer_price == NULL)
                                            <span class="price"> {{ $product->product_price }} </span>
                                            @else
                                            <span class="price"> {{ $product->product_offer_price }} </span>
                                            <span class="price-before-discount">{{ $product->product_price }}</span>
                                            @endif
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        @endforeach
                        @else
                        <span class="alert alert-warning">No products available.</span>
                        @endif


                        <!-- /.item -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.category-product -->

            </div>
            <!-- /.tab-pane -->



        </div>
        <!-- /.category-product -->
    </div>
    <!-- /.tab-pane #list-container -->
</div>
<!-- /.tab-content -->
<div class="clearfix filters-container">
    <div class="text-right">
        <div class="pagination-container">
            <ul class="list-inline list-unstyled">
                <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
            <!-- /.list-inline -->
        </div>
        <!-- /.pagination-container -->
    </div>
    <!-- /.text-right -->

</div>
<!-- /.filters-container -->

</div>
<!-- /.search-result-container -->

</div>
<!-- /.col -->

<!-- /.row -->




@endsection