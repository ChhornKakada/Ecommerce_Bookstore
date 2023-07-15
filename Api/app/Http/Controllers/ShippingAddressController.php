<?php

namespace App\Http\Controllers;

use App\Models\Shipping_address;
use App\Http\Requests\StoreShipping_addressRequest;
use App\Http\Requests\UpdateShipping_addressRequest;

class ShippingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreShipping_addressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShipping_addressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping_address  $shipping_address
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping_address $shipping_address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping_address  $shipping_address
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping_address $shipping_address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShipping_addressRequest  $request
     * @param  \App\Models\Shipping_address  $shipping_address
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShipping_addressRequest $request, Shipping_address $shipping_address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping_address  $shipping_address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping_address $shipping_address)
    {
        //
    }
}
