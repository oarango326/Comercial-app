<?php

namespace App\Http\Controllers;

use App\Cobro;
use App\Cliente;
use App\Articulo;
use App\DetalleCobro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DB;

class CobroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cobros=Cobro::all();
        return view('cobros.index', compact('cobros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $articulos=Articulo::all();
        $clientes=Cliente::orderby('nombre', 'ASC')->get();
        return view('cobros.create',compact('clientes','articulos'));
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
        try{
            DB::beginTransaction();
                $cobro=new Cobro();
                $cobro->cliente_id=$request->cliente_id;
                $cobro->fechacobro=$request->fechacobro;
                $cobro->tipodocumento=$request->tipodocumento;
                $cobro->numdocumento=$request->numdocumento;
                $cobro->fechadocumento=$request->fechadocumento;
                $cobro->tipocobro=$request->tipocobro;
                $cobro->monto=$request->monto;
                $cobro->abono=$request->abono;
                $cobro->total=$request->total;
                $cobro->save();


                $articulo_id=$request->articulo_id;
                $cantidad=$request->cantidad;
                $precio=$request->precio;
                $total_linea=$request->total_linea;
                if($articulo_id)
                {
                    $idaux=$cobro->id;
                    $contador=0;
                    //almacena las lineas detalle del cobro
                    while($contador<count($articulo_id)){
                        $detallecobro=new DetalleCobro();
                        $detallecobro->cobro_id=$idaux;
                        $detallecobro->articulo_id=$articulo_id[$contador];
                        $detallecobro->cantidad=$cantidad[$contador];
                        $detallecobro->precio=$precio[$contador];
                        $detallecobro->total_linea=$total_linea[$contador];
                        $detallecobro->save();
                        $contador++;
                    }
                }
            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
            return $e->getmessage();
        }
        return redirect()->route('cobros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function show(Cobro $cobro)
    {
        //
        $cliente=Cobro::findorfail($cobro->id)->cliente()->get();
        $detallecobro=DB::table('detallecobros')
                ->select('detallecobros.cobro_id','detallecobros.articulo_id','articulos.codigo','articulos.nombre','detallecobros.cantidad','detallecobros.precio','detallecobros.total_linea')
                ->join('articulos', 'articulos.id', '=', 'detallecobros.articulo_id')
                ->where ('detallecobros.cobro_id','=', $cobro->id)
                ->get();
                //return compact('cliente','cobro','detallecobro');
                return view('cobros.show', compact('cliente','cobro','detallecobro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function edit(Cobro $cobro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cobro $cobro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function destroy(cobro $cobro)
    {
        //
        try{
            DB::beginTransaction();
                Cobro::findorfail($cobro->id)->detallecobro()->delete();
                Cobro::findorfail($cobro->id)->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return $e->getmessage();
        }
        return redirect()->route('cobros.index')->with('info', 'El registro ha sido eliminado');

    }
}
