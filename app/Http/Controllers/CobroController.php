<?php

namespace App\Http\Controllers;

use App\Cobro;
use App\Cliente;
use App\Articulo;
use App\DetalleCobro;
use App\Factura;
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
                $cobro->factura_id=$request->factura_id;
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
                if($request->factura_id){
                    $factura=Factura::findorfail($request->factura_id);
                    $factura->saldo=$factura->saldo-($cobro->total+$cobro->abono);
                    $factura->save();
                }

            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('cobros.index')->with('info', $e->getmessage());
        }
        return redirect()->route('cobros.show', $cobro->id)->with('info','El cobro se ha guardado correctamente' );
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
                ->select('Articulos.ean','detallecobros.cobro_id','detallecobros.articulo_id',
                        'articulos.codigo','articulos.nombre','detallecobros.cantidad',
                        'detallecobros.precio','detallecobros.total_linea')
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
        return abort(404);
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
        return redirect()->route('cobros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id=$request->input('id-delete');
        //
        try{
            DB::beginTransaction();
                $detallecobro=Cobro::findorfail($id)->detallecobro();
                $cobro=Cobro::findorfail($id);

                if($cobro->factura_id){
                    $factura=Factura::findorfail($cobro->factura_id);
                    $factura->saldo=$factura->saldo+($cobro->total+$cobro->abono);
                    $factura->save();
                }

                $detallecobro->delete();
                $cobro->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('cobros.index')->with('info', $e->getmessage());
        }
        return redirect()->route('cobros.index')->with('info', 'El registro ha sido eliminado');

    }

    public function FacturasCliente(Cliente $cliente)
    {
        // $facturasCliente=Cliente::findorfail($cliente->id)
        // ->Factura()->where('saldo','>',0)->get();
        $facturasCliente=DB::table('facturas')
        ->select('facturas.*')
        ->join('clientes','facturas.cliente_id','=','clientes.id')
        ->where('clientes.id','=',$cliente->id)
        ->where('facturas.saldo','>',0)
        ->get();

        if(empty($facturasCliente)){
            return response('',400);
        }
        else{
            return $facturasCliente;
        }
    }
}
