<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('home',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'email' => 'required'
        ]);
        
        $supplier = new Supplier([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'contact' => $request->get('contact'),
            'email' => $request->get('email'),
        ]);
        $supplier->save();

        return redirect('/supplier');

        // $attributes = request()->validate([
        //     'name' => ['requred', 'min:3'],
        //     'address' => ['requred', 'min:12'],
        //     'contact' => ['requred', 'min:12']
        // ]);

        // return redirect('home'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {

        $supplier = DB::table('supplier')->get();
        return View::make('/supplier')->with('supplier', $supplier);
        //return view('/supplier', compact('supplier'));
        
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
    public function update(Request $request)
    {
        $supplier = Supplier::findOrFail($request->supplier_id);

        $supplier->update($request->all());
        //Supplier::update($request->all());
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
        $supplier = Supplier::findOrFail($request->supplier_id);

        $supplier->delete($request->all());
        return back();
    }
}
