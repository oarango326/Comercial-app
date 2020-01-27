<?php

namespace App\Http\Controllers;

use DB;
use carbon\carbon;
use Illuminate\Http\Request;
use App\Cliente;
use App\Visita;
use App\Http\Requests\RequestClientCreate;

class clientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*
    function __construct()
    {
        $this->middleware('auth');
    }
*/
    public function index()
    {
        // esto es con query builder
        //$clientes=DB::table('clientes')->get();
        //esto es con Eloquent
        //return Cliente::paginate(10);
        $clientes=Cliente::orderby('nombre','ASC')->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.createCliente');
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
    //return $request->all();
    DB::table('clientes')->insert([
             "nombre" => $request->input('Nombre'),
             "cif" => $request->input('Cif'),
             "direccion" => $request->input('Direccion'),
             "ciudad" => $request->input('Ciudad'),
             "estado" => $request->input('Estado'),
             "cp" => $request->input('CodigoPostal'),
             "telefono" => $request->input('Telefono'),
             "email"=>$request->input('Email'),
             "created_at"=>carbon::now(),
             "updated_at"=>carbon::now(),
         ]);
      //Cliente::create($request->all());
      return redirect()->route('clientes.index')->with('info', "Cliente Creado Correctamente");
      //return 'formulario enviado';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente=Cliente::FindOrFail($id);
        //return $cliente;
        if($cliente){
            return response()->json($cliente);
            //return view('clientes.showCliente', compact('cliente'));
        }else{
            return view('errors.clientNotFound');
        }

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$cliente=DB::table('clientes')->where('id', $id)->first();
        //return $cliente;

        $cliente=Cliente::FindOrFail($id);
        if($cliente){
            return view('clientes.editCliente', compact('cliente'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestClientCreate $request, $id)
    {
        //return $request->all();
        DB::table('clientes')->where('id', $id)->update([
             "nombre" => $request->input('Nombre'),
             "cif" => $request->input('Cif'),
             "direccion" => $request->input('Direccion'),
             "ciudad"=> $request->input('Ciudad'),
             "estado"=> $request->input('Estado'),
             "cp" => $request->input('CodigoPostal'),
             "telefono" => $request->input('Telefono'),
             "activo"=>$request->input('Activo'),
             "email"=>$request->input('email'),
             "updated_at"=>carbon::now(),
        ]);

        //se reestructuro con Eloquent
       //Cliente::FindOrFail($id)->update($request->all());
       return redirect()->route('clientes.edit', $request->id)->with('info','Se Actualizo el registro Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request)
    // {
    //     $id=$request->input('id-delete');
    //    $cliente=DB::table('visitas')
    //             ->select('visitas.id','visitas.cliente_id','visitas.proxVisita','visitas.comentario')
    //             ->join('clientes', 'clientes.id', '=', 'visitas.cliente_id')
    //             ->where ('clientes.id', $id)
    //             ->get();
    //     //return $cliente->count();
    //     if($cliente->count()>0)
    //     {
    //         return redirect()->route('clientes.index')->with('info','El cliente No puede ser eliminado posee resistros asociados');
    //     }
    //     else
    //     {
    //         DB::table('clientes')->where('id', $id)->delete();
    //         return redirect()->route('clientes.index')->with('info','Se elimino el registro correctamente');
    //     }

    // }

    public function destroy(request $request)
    {
        //
        $id=$request->input('id-delete');
        //return $request;
        try{
            Cliente::findOrfail($id)->delete();
        }catch(\Exception $e){
            return redirect()->route('clientes.index')->with('info', 'El cliente No puede ser eliminado posee registros asociados');
        }

        return redirect()->route('clientes.index')->with('info', 'El registro ha sido eliminado');

    }


    public function textoBuscar(Request $request)
    {
        //return $request->all();
       if($request['buscar']==null){

            return redirect()->route('clientes.index');
            //$clientes=Cliente::paginate(10);
             //return view('clientes.index', compact('clientes'));
            //return redirect()->route('clientes.index');
        }
        else
        {
           $clientes=DB::table('clientes')
             ->where('nombre', 'like', '%'.$request['buscar'].'%')
             ->orwhere('estado','like','%'.$request['buscar'].'%')
             ->orwhere('ciudad','like','%'.$request['buscar'].'%')
             ->orwhere('cif', 'like', '%'.$request['buscar'].'%')
             ->orwhere('telefono', 'like', '%'.$request['buscar'].'%')
             ->orderby('nombre','asc')->paginate(10);

            //dd($clientes);
            return view('clientes.index', compact('clientes'));
        //return json_encode($clientes);
        }
    }
}
