@extends('Backend.layout.template')


@section('adminBodyContent')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create New Coupon</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Create New Coupon</li>
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
                            <h3 class="card-title">Create Coupon</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body" style="display: block;">
                            <form action="{{ route('coupon.store', $editCoupon->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Coupon Code</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="code"
                                        aria-describedby="emailHelp" placeholder="Enter Coupon Code"
                                        value="{{ $editCoupon->code }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Coupon Type</label>
                                    <select name="coupontype" id="" class="form-control">
                                        <option value="0">Select Coupon Type</option>
                                        <option value="1" {{ $editCoupon->coupontype == 1 ? 'selected' : '' }}>Flat
                                            Discount</option>
                                        <option value="0" {{ $editCoupon->coupontype == 0 ? 'selected' : '' }}>Percent
                                            Discount</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Flat Amount</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="flat_amount"
                                        aria-describedby="emailHelp" value="{{ $editCoupon->flat_amount }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Percent Amount</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        name="percent_amount" aria-describedby="emailHelp"
                                        value="{{ $editCoupon->percent_amount }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Coupon Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="0">Select Coupon Type</option>
                                        <option value="1" {{ $editCoupon->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $editCoupon->status == 0 ? 'selected' : '' }}>In-Active
                                        </option>
                                    </select>
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