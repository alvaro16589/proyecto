<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClienteRequest;
use Illuminate\Support\Facades\DB;  
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$clientes = Cliente::all();//muestra todos los datos de la lista en un list
        $clientes = DB::table('cliente')->simplePaginate(10);
        return view('/cliente/cliente',compact('clientes'))->with('pagina','cliente');//hace el envio de datos en al url de clientes 
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
    public function store(StoreClienteRequest $request)
    {
        
        $client = new Cliente();
        $client->nombre = $request->input('Nombre');  
        $client->apellido = $request->input('Apellido');
        $client->ci =(int) $request->input('CI');
        $client->save();
        $clientes = Cliente::all();//muestra todos los datos de la lista en un list
        return view('/cliente/cliente',compact('clientes'))->with('status','Guardado satisfactoriamente...!')->with('pagina','cliente');//hace el envio de datos en al url de clientes 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $clientes = Cliente::all();//muestra todos los datos de la lista en un list
        return view('/cliente/cliente',compact('clientes'))->with('pagina','cliente');//hace el envio de datos en al url de clientes 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return 'estas aqui en edit del controlador del cliente';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClienteRequest $request, Cliente $cliente)
    {
        $cliente->nombre = $request->input('Nombre');
        $cliente->apellido = $request->input('Apellido');
        $cliente->ci = $request->input('CI');
        $cliente->save();
        $clientes = Cliente::all();//muestra todos los datos de la lista en un list
        return view('/cliente/cliente',compact('clientes'))->with('status','Actualización hecha, satisfactoriamente...!')->with('pagina','cliente');//hace el envio de datos en al url de clientes 
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        $clientes = Cliente::all();//muestra todos los datos de la lista en un list
        return view('/cliente/cliente',compact('clientes'))->with('status','Eliminado satisfactoriamente...!')->with('pagina','cliente');//hace el envio de datos en al url de clientes 
    }
}
