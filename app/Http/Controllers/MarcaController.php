<?php

namespace App\Http\Controllers;

use App\Marca;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMarcaRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade as PDF;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->tipo == 'Administrador') {
            $marcas = Marca::paginate(14);//muestra todos los datos de la lista en un list
            return view('marca/marca',compact('marcas'))->with('pagina','marca');//hace el envio de datos en al url de clientes 
        }
        else{
            abort(403,"No esta autorizado para realizar esta acción.");// con 401 Unauthorized // 403 es personalizable
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarcaRequest $request)
    {
        $marca = new Marca();
        $marca->nombre = $request->input('Nombre');
        $marca->ciudad = $request->input('Ciudad');
        $marca->save();
        $marcas = Marca::paginate(14);//muestra todos los datos de la lista en un list
        return view('marca/marca',compact('marcas'))->with('status','Guardado exitoso...!')->with('pagina','marca');//hace el envio de datos en al url de clientes 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request)
    {
        $marcas = Marca::orderBy('id','DESC')->where('nombre', 'like','%'.$request->input('Buscar').'%')->orWhere('ciudad', 'like','%'.$request->input('Buscar').'%')->paginate(14);//muestra todos los datos de la lista en un list
        return view('marca/marca',compact('marcas'))->with('pagina','marca');//hace el envio de datos en al url de clientes
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMarcaRequest $request, Marca $marca)
    {
        $marca->nombre = $request->input('Nombre');
        $marca->ciudad = $request->input('Ciudad');
        $marca->save();
        $marcas = Marca::paginate(14);//muestra todos los datos de la lista en un list
        return view('marca/marca',compact('marcas'))->with('status','Actualización hecha, Satisfactoriamente...!')->with('pagina','marca');//hace el envio de datos en al url de clientes 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();
        $marcas = Marca::paginate(14);//muestra todos los datos de la lista en un list
        return view('marca/marca',compact('marcas'))->with('status','Eliminación hecha, Satisfactoriamente...!')->with('pagina','marca');//hace el envio de datos en al url de clientes 
    }
     //___________________________##################################################################################_________________________
    //                  REPORTES
    
    public function reporte()
    {
        $marcas = Marca::paginate(10);
        return view('marca/reporte', compact('marcas'))->with('pagina','Reporte de marcas');
    }
    public function pdf() 
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $marcas = Marca::all();
        $coment = 'Reporte de marcas con los datos por id';
        $pdf = PDF::loadView('pdf.marca', compact('marcas','coment'))->setPaper('letter');//,'landscape' para cambiar la horientacion de la hoja
        return $pdf->stream('marcas.pdf');//descargar directa "dawnload" en lugar de stream
    }
    public function reporteac() // vista usuarios solo activos
    {
        $marcas = Marca::orderBy('ciudad','ASC')->paginate(10);
        return view('marca/reporte', compact('marcas'))->with('pagina','Reporte de marcas por ciudad');
    }
    public function pdfac() //vista solo usuarios activos
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $marcas = Marca::orderBy('ciudad','ASC')->get();//desc descendente //ASC ascendente
        $coment = 'Reporte de marcas por ciudad';
        $pdf = PDF::loadView('pdf.marca', compact('marcas','coment'))->setPaper('letter');//,'landscape' para cambiar la horientacion de la hoja
        return $pdf->stream('marcas.pdf');//descargar directa "dawnload" en lugar de stream
    }
    
}
