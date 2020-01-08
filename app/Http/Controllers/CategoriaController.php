<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias=Categoria::all();
        return view('categorias.index', compact('categorias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categorias.create');
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
        $categoria=Categoria::create($request->all());
        return redirect()->route('categorias.show',$categoria->id)
        ->with('info','Registro almacenado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
        $categoria=Categoria::findorfail($categoria->id);
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
        $categoria=Categoria::findorfail($categoria->id);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
        Categoria::findorfail($categoria->id)->update($request->all());
        return redirect()->route('categorias.show',$categoria->id)
        ->with('info',"Registro almacenado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id=$request->input('id-delete');
        //return $request;
        try{
            Categoria::findorfail($id)->delete();
        }catch(\Exception $e){
            return redirect()->route('categorias.index')->with('info', 'No puede ser eliminado posee registros asociados');;
        }

        return redirect()->route('categorias.index')->with('info', 'El registro ha sido eliminado');

    }
}
