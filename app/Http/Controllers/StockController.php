<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Supplier;
use View;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock = DB::table('stock')->get();
        $supplier = DB::table('supplier')->get();
        return view::make('admin/stock', compact('supplier', 'stock'));
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
        $stock = new Stock();
        $stock->item_ID = $request->item_ID;
        $stock->item_name = $request->item_name;
        $stock->item_price = $request->item_price;
        $stock->item_quantity = $request->item_quantity;
        $stock->supplier_ID = $request->supplier_ID;

        $stock->save();

        return redirect('admin/stock');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        $stock = DB::table('stock')->get();
        
        return view::make('admin/stock', compact($stock));
        //return View::make('/stock')->with('stock', $stock);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $stock = Stock::findOrFail($request->stock_id);

        $stock->update($request->all());
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $stock = Stock::findOrFail($request->stock_id);
        $stock->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $stock = Stock::findOrFail($request->stock_id);

        $stock->delete($request->all());
        return back();
    }
}
