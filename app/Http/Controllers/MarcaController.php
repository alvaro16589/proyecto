<?php

namespace App\Http\Controllers;

use App\Marca;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMarcaRequest;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::paginate(14);//muestra todos los datos de la lista en un list
        return view('marca/marca',compact('marcas'))->with('pagina','marca');//hace el envio de datos en al url de clientes 
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
}
