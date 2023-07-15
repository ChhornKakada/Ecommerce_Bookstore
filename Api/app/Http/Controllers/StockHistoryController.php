<?php

namespace App\Http\Controllers;

use App\Models\Stock_history;
use App\Http\Requests\StoreStock_historyRequest;
use App\Http\Requests\UpdateStock_historyRequest;

class StockHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreStock_historyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStock_historyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock_history  $stock_history
     * @return \Illuminate\Http\Response
     */
    public function show(Stock_history $stock_history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock_history  $stock_history
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock_history $stock_history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStock_historyRequest  $request
     * @param  \App\Models\Stock_history  $stock_history
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStock_historyRequest $request, Stock_history $stock_history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock_history  $stock_history
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock_history $stock_history)
    {
        //
    }
}
