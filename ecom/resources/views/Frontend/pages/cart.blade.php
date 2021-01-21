@extends('Frontend.layout.template')


@section('body-content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div>

<div class="body-content outer-top-xs">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th class="cart-description item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                    <th class="cart-total last-item">Grandtotal</th>
                                    <th class="cart-edit item">Update</th>
                                    <th class="cart-romove item">Remove</th>
                                </tr>
                            </thead><!-- /thead -->
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="#" class="btn btn-upper btn-primary outer-left-xs">Continue
                                                    Shopping</a>
                                                <a href="#"
                                                    class="btn btn-upper btn-primary pull-right outer-right-xs">Update
                                                    shopping cart</a>
                                            </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach($cart as $cartItems)
                                @php
                                $i++;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>

                                    <td class="cart-image">
                                        <a class="entry-thumbnail" href="detail.html">
                                            <img src="assets/images/products/p1.jpg" alt="">
                                        </a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class="cart-product-description"><a
                                                href="detail.html">{{ $cartItems->product->product_title }}</a></h4>
                                        <div class="cart-product-info">
                                            <span class="product-color">COLOR:<span>Blue</span></span>
                                        </div>
                                    </td>

                                    <td class="cart-product-quantity">
                                        <div class="quant-input">

                                            <input type="text" value="{{ $cartItems->product_quantity }}">
                                        </div>
                                    </td>
                                    <td class="cart-product-sub-total">
                                        @if($cartItems->product->product_offer_price != NULL)
                                        <span class="cart-sub-total-price">৳
                                            {{ $cartItems->product->product_offer_price }}</span>
                                        @elseif($cartItems->product->product_offer_price == NULL)
                                        <span class="cart-sub-total-price">৳
                                            {{ $cartItems->product->product_price }}</span>
                                        @endif

                                    </td>
                                    <td class="cart-product-grand-total">
                                        @if($cartItems->product->product_offer_price != NULL)
                                        <span class="cart-sub-total-price">৳
                                            {{ $cartItems->product->product_offer_price * $cartItems->product_quantity }}</span>
                                        @elseif($cartItems->product->product_offer_price == NULL)
                                        <span class="cart-sub-total-price">৳
                                            {{ $cartItems->product->product_price * $cartItems->product_quantity }}</span>
                                        @endif
                                    </td>
                                    <td class="cart-product-edit">
                                        <a href="#" class="product-edit">Update</a>
                                    </td>
                                    <td class="romove-item">
                                        <a href="#" title="cancel" class="icon">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div>
                </div><!-- /.shopping-cart-table -->
                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Estimate shipping and tax</span>
                                    <p>Enter your destination to get shipping and tax.</p>
                                </th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="info-title control-label">Country <span>*</span></label>
                                        <select class="form-control unicase-form-control selectpicker"
                                            style="display: none;">
                                            <option>--Select options--</option>
                                            <option>India</option>
                                            <option>SriLanka</option>
                                            <option>united kingdom</option>
                                            <option>saudi arabia</option>
                                            <option>united arab emirates</option>
                                        </select>
                                        <div class="btn-group bootstrap-select form-control unicase-form-control">
                                            <button type="button" class="btn dropdown-toggle selectpicker btn-default"
                                                data-toggle="dropdown" title="--Select options--"><span
                                                    class="filter-option pull-left">--Select options--</span>&nbsp;<span
                                                    class="caret"></span></button>
                                            <div class="dropdown-menu open">
                                                <ul class="dropdown-menu inner selectpicker" role="menu">
                                                    <li data-original-index="0" class="selected"><a tabindex="0"
                                                            class="" data-normalized-text="--Select options--"><span
                                                                class="text">--Select options--</span><span
                                                                class="glyphicon glyphicon-ok icon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="1"><a tabindex="0" class=""
                                                            data-normalized-text="India"><span
                                                                class="text">India</span><span
                                                                class="glyphicon glyphicon-ok icon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="2"><a tabindex="0" class=""
                                                            data-normalized-text="SriLanka"><span
                                                                class="text">SriLanka</span><span
                                                                class="glyphicon glyphicon-ok icon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="3"><a tabindex="0" class=""
                                                            data-normalized-text="united kingdom"><span
                                                                class="text">united kingdom</span><span
                                                                class="glyphicon glyphicon-ok icon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="4"><a tabindex="0" class=""
                                                            data-normalized-text="saudi arabia"><span class="text">saudi
                                                                arabia</span><span
                                                                class="glyphicon glyphicon-ok icon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="5"><a tabindex="0" class=""
                                                            data-normalized-text="united arab emirates"><span
                                                                class="text">united arab emirates</span><span
                                                                class="glyphicon glyphicon-ok icon-ok check-mark"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title control-label">State/Province <span>*</span></label>
                                        <select class="form-control unicase-form-control selectpicker"
                                            style="display: none;">
                                            <option>--Select options--</option>
                                            <option>TamilNadu</option>
                                            <option>Kerala</option>
                                            <option>Andhra Pradesh</option>
                                            <option>Karnataka</option>
                                            <option>Madhya Pradesh</option>
                                        </select>
                                        <div class="btn-group bootstrap-select form-control unicase-form-control">
                                            <button type="button" class="btn dropdown-toggle selectpicker btn-default"
                                                data-toggle="dropdown" title="--Select options--"><span
                                                    class="filter-option pull-left">--Select options--</span>&nbsp;<span
                                                    class="caret"></span></button>
                                            <div class="dropdown-menu open">
                                                <ul class="dropdown-menu inner selectpicker" role="menu">
                                                    <li data-original-index="0" class="selected"><a tabindex="0"
                                                            class="" data-normalized-text="--Select options--"><span
                                                                class="text">--Select options--</span><span
                                                                class="glyphicon glyphicon-ok icon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="1"><a tabindex="0" class=""
                                                            data-normalized-text="TamilNadu"><span
                                                                class="text">TamilNadu</span><span
                                                                class="glyphicon glyphicon-ok icon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="2"><a tabindex="0" class=""
                                                            data-normalized-text="Kerala"><span
                                                                class="text">Kerala</span><span
                                                                class="glyphicon glyphicon-ok icon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="3"><a tabindex="0" class=""
                                                            data-normalized-text="Andhra Pradesh"><span
                                                                class="text">Andhra Pradesh</span><span
                                                                class="glyphicon glyphicon-ok icon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="4"><a tabindex="0" class=""
                                                            data-normalized-text="Karnataka"><span
                                                                class="text">Karnataka</span><span
                                                                class="glyphicon glyphicon-ok icon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="5"><a tabindex="0" class=""
                                                            data-normalized-text="Madhya Pradesh"><span
                                                                class="text">Madhya Pradesh</span><span
                                                                class="glyphicon glyphicon-ok icon-ok check-mark"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title control-label">Zip/Postal Code</label>
                                        <input type="text" class="form-control unicase-form-control text-input"
                                            placeholder="">
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Discount Code</span>
                                    <p>Enter your coupon code if you have one..</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control unicase-form-control text-input"
                                            placeholder="You Coupon..">
                                    </div>
                                    <div class="clearfix pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-4 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">$600.00</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">$600.00</span>
                                    </div>
                                </th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO
                                            CHEKOUT</button>
                                        <span class="">Checkout with multiples address!</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->
            </div><!-- /.shopping-cart -->
        </div> <!-- /.row -->

    </div><!-- /.container -->
</div>
@endsection