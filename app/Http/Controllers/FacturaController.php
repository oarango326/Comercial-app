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
        $fabricante=$factura->fabricante()->get();
        $cliente=$factura->Cliente()->get();
        $factura=Factura::FindOrFail($factura->id);
      // return [$fabricante,$cliente,$factura];
       return view('facturas.show', compact('factura','fabricante','cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(factura $factura)
    {
        $clientes=Cliente::all();
        $fabricantes=Fabricante::all();
        $fabricante=$factura->fabricante()->get();
        $cliente=$factura->Cliente()->get();
        $factura=Factura::FindOrFail($factura->id);
       //return [$fabricante,$cliente,$factura];
       return view('facturas.edit', compact('factura','fabricante','cliente','clientes','fabricantes'));
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
        $fac=$factura->Findorfail($factura->id)->update($request->all());
        return redirect()->route('facturas.index')->with('info','Factura Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        //
        $id=$request->input('id-delete');
        //return $request;
        try{
            Factura::findorfail($id)->delete();
        }catch(\Exception $e){
            return redirect()->route('facturas.index')->with('info', $e->getmessage());
        }

        return redirect()->route('facturas.index')->with('info', 'El registro ha sido eliminado');

    }
}
