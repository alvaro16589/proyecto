<?php

namespace App\Http\Controllers;

use App\Detalle;
use App\Articulo;
use App\Detallearticulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade as PDF;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $detalle = new Detalle();
        $detalle->iduser = auth()->user()->id;
        $detalle->estado = 'proceso';//estados HECHO ... PROCESO (en proceso)
        $detalle->save();

        $items = explode(",",$request->input('iditems'));//funcion para convertir una cadena en array con señalamiento de un serparador
        foreach ($items as $item ) {//'cantidad','precio','idart','iddetall'
            $producto = new Detallearticulo();
            $producto->cantidad = 2; 
            $producto->precio = Articulo::where('id', $item)->first()->precio;
            $producto->idart = $item;
            $producto->iddetall = $detalle->id;
            $producto->save();
        }
        $cantidades = explode(",",$request->input('cantitems'));
        $its = Detallearticulo::where('iddetall', $detalle->id)->get();
        $ite = 1;//contador de iteraciones
       
        foreach ($its as $it) { 
            $itesub = 1;//contador de iteraciones
            foreach ($cantidades as $cantidad) {
                if ($ite == $itesub ) {
                    $it->cantidad = $cantidad;
                    $it->save();

                    break;
                }
                $itesub = $itesub + 1;
            }
            $ite = $ite + 1;
        }
        //consultal para rellenar los valores###################################################
        ######################################################################33
        $detalles = Detalle::join('detallearticulo','detallearticulo.iddetall','=','detalle.id')
                        ->join('articulo','detallearticulo.idart','=','articulo.id')
                        ->join('users','users.id','=','detalle.iduser')
                        ->where('detalle.id' ,'=',$detalle->id)
                        ->select('detalle.created_at',
                                'articulo.id',
                                'detallearticulo.cantidad',
                                'articulo.nombre',
                                'articulo.descripcion',
                                'detallearticulo.precio'                                
                            )->get();
        //obtenemos el subtotal para enviarselo a la vista
        $subtotal = 0;
        foreach ($detalles as $det) {
            $subtotal = $subtotal + ($det->precio * $det->cantidad);
        }
        return view('detalle.detalle',compact('detalles'))->with('pagina','Detalle')->with('subtotal',$subtotal);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function show(Detalle $detalle)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function edit(Detalle $detalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detalle $detalle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detalle $detalle)
    {
        //
    }
    
    public function pdf(Request $request)
    {
       
        $det = Detalle::all()->last();
        $detalles = Detalle::join('detallearticulo','detallearticulo.iddetall','=','detalle.id')
        ->join('articulo','detallearticulo.idart','=','articulo.id')
        ->join('users','users.id','=','detalle.iduser')
        ->where('detalle.id' ,'=',$det->id)
        ->select('detalle.created_at',
                'articulo.id',
                'detallearticulo.cantidad',
                'articulo.nombre',
                'articulo.descripcion',
                'detallearticulo.precio'                                
            )->get();
        $subtotal = 0;
        foreach ($detalles as $de) {
            $subtotal = $subtotal + ($de->precio * $de->cantidad);
        }
        
        $impuesto = round($subtotal * 0.093,1);
        $total = round ($subtotal + $impuesto + 5.8,1);
        $coment = 'Detalle de datos de última compra';
        $pdf = PDF::loadView('pdf.invoice', compact('detalles','coment','subtotal','impuesto','total'))->setPaper('letter');//,'landscape' para cambiar la horientacion de la hoja
        return $pdf->stream('invoice.pdf');//descargar directa "dawnload" en lugar de stream
    }
}
