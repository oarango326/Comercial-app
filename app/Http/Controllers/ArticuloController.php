<?php

namespace App\Http\Controllers;
use DB;
use App\Articulo;
use App\Categoria;
use App\Fabricante;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$articulos=DB::table('Articulos')->get();
        $articulos=Articulo::all();
       // return $articulos;
        return view('articulos.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias=Categoria::all();
        $fabricantes=Fabricante::all();
        return view('articulos.create', compact('categorias', 'fabricantes') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

            Articulo::create($request->all());
            return redirect()->route('articulos.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
        $articulo=Articulo::FindOrFail($articulo->id);
        //return $articulo;
         return view('articulos.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        $categorias=Categoria::all();
        $fabricantes=Fabricante::all();
        $articulo=Articulo::FindOrFail($articulo->id);
        return view('articulos.edit', compact('articulo','categorias','fabricantes'));
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        //return $request;
        if(isset($request->activar)){
            $articulo=Articulo::findorfail($articulo->id);
            $articulo->activo=$request->activar;
            $articulo->save();
            return redirect()->route('articulos.index');
        }else{
            try{
                $articulo=Articulo::findorfail($articulo->id);
                $articulo->update($request->all());
                return redirect()
                    ->route('articulos.edit',$articulo->id)
                    ->with('success','Articulo Actualizado Exitosamente');
            }catch(\PDOException $e)
            {
                return redirect()
                    ->route('articulos.edit',$articulo->id)
                    ->with('error','Ha ocurrido un error: '.$e->getmessage());
            }
        }

        // //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        //
        $id=$request->input('id-delete');
        //return $request;
        try{
            Articulo::findOrfail($id)->delete();
        }catch(\Exception $e){
            return redirect()->route('articulos.index')->with('info', $e->getmessage());
        }

        return redirect()->route('articulos.index')->with('info', 'El registro ha sido eliminado');

    }
}
