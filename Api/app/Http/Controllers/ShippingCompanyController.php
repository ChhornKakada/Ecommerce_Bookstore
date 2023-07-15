<?php

namespace App\Http\Controllers;

use App\Models\Shipping_company;
use App\Http\Requests\StoreShipping_companyRequest;
use App\Http\Requests\UpdateShipping_companyRequest;

class ShippingCompanyController extends Controller
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
     * @param  \App\Http\Requests\StoreShipping_companyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShipping_companyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping_company  $shipping_company
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping_company $shipping_company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping_company  $shipping_company
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping_company $shipping_company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShipping_companyRequest  $request
     * @param  \App\Models\Shipping_company  $shipping_company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShipping_companyRequest $request, Shipping_company $shipping_company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping_company  $shipping_company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping_company $shipping_company)
    {
        //
    }
}
