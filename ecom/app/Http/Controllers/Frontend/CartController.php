<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Frontend.pages.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'product_id' => 'required',

        ], [
            'product_id.required' => 'Please Choose Your Product'
        ]);

        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();
        } else {
            $cart = Cart::where('ip_address', $request->ip())->where('product_id', $request->product_id)->first();
        }

        if (!is_null($cart)) {
            $cart->increment('product_quantity');
            return redirect()->route('ecom.home');
        } else {
            $cart = new Cart();
            if (Auth::check()) {
                $cart->user_id = Auth::id();
            }
            $cart->ip_address = $request->ip();
            $cart->product_id = $request->product_id;
            $cart->save();

            return redirect()->route('ecom.home');
        }
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
        //
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
        $cart = Cart::find($id);
        if (!is_null($cart)) {
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
        } else {
            return redirect()->route('ecom.home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        if (!is_null($cart)) {
            $cart->delete();
        } else {
            return redirect()->route('ecom.home');
        }
    }
}
