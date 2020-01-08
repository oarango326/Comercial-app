<?php

namespace App\Http\Controllers;

use App\Fabricante;
use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fabricantes=Fabricante::all();
        return view('fabricantes.index', compact('fabricantes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fabricantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fabricante=Fabricante::create($request->all());
        return redirect()->route('fabricantes.show',$fabricante->id)
        ->with('info',"Registro almacenado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function show(Fabricante $fabricante)
    {
        //
        $fabricante=Fabricante::findorfail($fabricante->id);
        return view('fabricantes.show',compact('fabricante'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabricante $fabricante)
    {
        //
        $fabricante=Fabricante::findorfail($fabricante->id);
        //return $fabricante;
        return view('fabricantes.edit',compact('fabricante'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fabricante $fabricante)
    {
        //
        Fabricante::findorfail($fabricante->id)->update($request->all());
        return redirect()->route('fabricantes.show',$fabricante->id)
        ->with('info',"Registro almacenado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id=$request->input('id-delete');
        //return $request;
        try{
            Fabricante::findorfail($id)->delete();
        }catch(\Exception $e){
            return redirect()->route('fabricantes.index')->with('info', 'No puede ser eliminado posee registros asociados');;
        }

        return redirect()->route('fabricantes.index')->with('info', 'El registro ha sido eliminado');

    }
}
