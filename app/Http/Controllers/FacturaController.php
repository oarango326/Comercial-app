<?php

namespace App\Http\Controllers;

use App\factura;
use App\Cliente;
use App\Fabricante;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function index()
    {
        $fabricantes=Fabricante::all();
        $facturas=Factura::all();
        return view('facturas.index', compact('facturas','fabricantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fabricantes=Fabricante::all();
        $clientes=Cliente::all();
        return view('facturas.create', compact('clientes','fabricantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request;
         Factura::create($request->all());

         return redirect()->route('facturas.index')->with('info','Factura Registrada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(factura $factura)
    {
        //
        try{
            Factura::findorfail($factura->id)->delete();
        }catch(\Exception $e){
            return redirect()->route('facturas.index')->with('info', $e->getmessage());
        }

        return redirect()->route('facturas.index')->with('info', 'El registro ha sido eliminado');

    }
}
