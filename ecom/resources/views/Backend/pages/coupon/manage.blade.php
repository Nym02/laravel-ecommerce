@extends('Backend.layout.template')


@section('adminBodyContent')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Coupons</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Coupons</li>
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
                            <h3 class="card-title">All Coupons</h3>

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
                                        <th scope="col">Coupon Code</th>
                                        <th scope="col">Coupon Type</th>
                                        <th scope="col">Flat Amount</th>
                                        <th scope="col">Percent Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($manageCoupons as $mCoupon)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $mCoupon->code }}</td>
                                        <td>
                                            @if($mCoupon->coupontype == 1)
                                            <span class="badge badge-primary">Flat Discount</span>
                                            @else
                                            <span class="badge badge-info">Percent Discount</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($mCoupon->flat_amount != NULL)
                                            {{ $mCoupon->flat_amount }}
                                            @else
                                            <span class="badge badge-warning">Not Applied</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($mCoupon->percent_amount != NULL)
                                            {{ $mCoupon->percent_amount }}
                                            @else
                                            <span class="badge badge-warning">Not Applied</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($mCoupon->status == 1)
                                            <span class="badge badge-success">Active</span>
                                            @else
                                            <span class="badge badge-danger">In-Active</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('coupon.edit', $mCoupon->id) }}"
                                                    class="btn btn-primary">Update</a>
                                                <a href="" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteCoupon{{ $mCoupon->id }}">Delete</a>
                                                {{-- Modal start--}}
                                                <div class="modal fade" id="deleteCoupon{{ $mCoupon->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                                <form
                                                                    action="{{ route('coupon.destroy', $mCoupon->id) }}"
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