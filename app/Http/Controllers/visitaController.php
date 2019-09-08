<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Cliente;
use App\Visita;
use App\Http\Requests\CreateVisitaRequest;


class visitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $visitas=Visita::orderBy('proxVisita','asc')
                        ->get();

      return view('visitas.index', compact('visitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('visitas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVisitaRequest $request)
    {

        Visita::create($request->all());
        //return $request->all();

        //return $cliente;
        return redirect()->route('visita.index')->with('info','Visita Registrada Correctamente');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       $visita=Visita::FindOrFail($id);
       return view('visitas.show', compact('visita'));
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
        $visita=Visita::FindOrFail($id);
          return view('visitas.edit', compact('visita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateVisitaRequest $request, $id)
    {
       if(isset($request->estado))
        {
            Visita::FindOrFail($id)->update($request->all());
        }else{

            $visita=Visita::FindOrFail($id);
            $visita->proxVisita=$request->proxVisita;
            $visita->estado=0;
            $visita->comentario=$request->comentario;
            $visita->save();
        }

        //dd($request);
       // Visita::FindOrFail($id)->update($request->all());
        return redirect()->route('visita.index')->with('info','Visita Actualizada Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //return $id;
        Visita::findOrFail($id)->delete();
        return redirect()->route('visita.index')->with('info','Visita Eliminada Correctamente');
    }

    public function creavisita($id)
    {
        //
        $cliente=Cliente::FindOrFail($id);
        return view('visitas.createfromcliente', compact('cliente'));

    }

    public function clienteBuscar(Request $request)
    {
        //return $request->all();
       if($request==''){
            return redirect()->route('visita.index');
        }
        else
        {
            $clientes=DB::table('clientes')
                     ->where('nombre', 'like', '%'.$request['buscar'].'%')
                     ->orwhere('cif', 'like', '%'.$request['buscar'].'%')
                     ->orwhere('telefono', 'like', '%'.$request['buscar'].'%')
                     ->get();

           // dd($clientes);
            return view('visitas.create', compact('clientes'));


        //return json_encode($clientes);
        }
    }

}
