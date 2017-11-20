<?php

namespace Product\Http\Controllers;

use Illuminate\Http\Request;
use Product\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = \Product\Product::orderBy('id', 'DESC')->paginate();
            return view('products.index', compact('products'));
        } catch (\Exception $e) {
            return redirect()->route('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('products.create');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('errors', 'Ha ocurrido un error inesperado, lo sentimos');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {

        $product = new \Product\Product;

        $product->name  = $request->name;
        $product->short = $request->short;
        $product->body  = $request->body;

        $product->save();
        return redirect()->route('products.index')->with('info', 'Producto creado con éxito');

        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('errors', 'Ha ocurrido un error inesperado, lo sentimos');
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
        try {
            $product = \Product\Product::findOrFail($id);
            return view('products.show', compact('product'));
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('errors', 'Ha ocurrido un error inesperado, lo sentimos');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $product = \Product\Product::findOrFail($id);
            return view('products.edit', compact('product'));
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('errors', 'Ha ocurrido un error inesperado, lo sentimos');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = \Product\Product::find($id);

        $product->name  = $request->name;
        $product->short = $request->short;
        $product->body  = $request->body;

        $product->save();

        return redirect()->route('products.index')->with('info', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = \Product\Product::find($id);
            $product->delete();
            return back()->with('info', 'Producto eliminado con éxito');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('errors', 'Ha ocurrido un error inesperado, lo sentimos');
        }
    }
}
