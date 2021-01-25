<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manageCoupons = Coupon::orderBy('id', 'desc')->get();
        return view('Backend.pages.coupon.manage', compact('manageCoupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.pages.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:255'
        ], [
            'code.required' => 'Please provide Coupon Code'
        ]);

        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->coupontype = $request->coupontype;
        $coupon->flat_amount = $request->flat_amount;
        $coupon->percent_amount = $request->percent_amount;
        $coupon->status = $request->status;


        $coupon->save();

        $notification = array(
            "message" => "New Coupon Added Successfully",
            "alert-type" => "success"
        );
        return redirect()->route('coupon.manage')->with($notification); //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editCoupon = Coupon::find($id);


        if (!is_null($editCoupon)) {
            return view('Backend.pages.coupon.edit', compact('editCoupon'));
        } else {
            return redirect()->route('coupon.manage');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|max:255'
        ], [
            'code.required' => 'Please provide Coupon Code'
        ]);

        $coupon = Coupon::find($id);
        $coupon->code = $request->code;
        $coupon->coupontype = $request->coupontype;
        $coupon->flat_amount = $request->flat_amount;
        $coupon->percent_amount = $request->percent_amount;
        $coupon->status = $request->status;


        $coupon->save();

        $notification = array(
            "message" => "Coupon Updated Successfully",
            "alert-type" => "success"
        );
        return redirect()->route('coupon.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::find($id);

        if (!is_null($coupon)) {
            $coupon->delete();
            return redirect()->route('coupon.manage');
        } else {
            return redirect()->route('coupon.manage');
        }
    }
}
