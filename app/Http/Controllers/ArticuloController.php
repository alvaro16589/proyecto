<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Proveedor;
use App\Marca;
use App\User;
use App\Temporal;
use App\ImagenArti;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Http\Requests\StoreArticuloRequest;
use Illuminate\Http\File;
use Response;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->tipo == 'Administrador') {
           
            $marcas = Marca::all();
            $proveedores = Proveedor::orderBy('id','DESC')->where('estado', 'activo')->paginate(10);//muestra todos los datos de la lista en un list
            $articulos = Articulo::paginate(10);//muestra todos los datos de la lista en un list
            return view('articulo/articulo',compact('articulos'),compact('marcas'))->with(compact('proveedores'))->with('pagina','articulo');//hace el envio de datos en al url de clientes 
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
        return 'estamos en el controlador create';
    }
  
    

    public function dropzone(Request $request){

        $temporal = new Temporal();
        if ($request->hasFile('file')) {
            $file = $request->file('file');//generando ruta de guardado
            $name = uniqid().$file->getClientOriginalName();//generando nombre de usuario
            $file->move(public_path().'/asset/img/articulos',$name);////'
            
            $temporal->nombre = $name;
            $temporal->save();
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticuloRequest $request)
    {//'estado','nombre','descripcion','imagen','vencimiento','stok'
        $temporals = Temporal::all();
        $arti = new Articulo();
        
        if ($request->hasFile('Imagen')) {
            $file = $request->file('Imagen');//generando ruta de guardado
            $name = time().$file->getClientOriginalName();//generando nombre de usuario
            $file->move(public_path().'/asset/img/articulos',$name);////'
            $arti->imagen = $name;
        }
        else{
            $arti->imagen = 'default-150x150.png';
        }
        
        $arti->estado = 'activo';
        $arti->nombre = $request->input('Nombre');
        $arti->descripcion = $request->input('Descripcion');
        $arti->vencimiento = $request->input('Vencimiento');
        $arti->stok = $request->input('Cantidad');
        $arti->precio = $request->input('Precio');
        $arti->idusua = auth()->user()->id;
        $arti->idmar = $request->input('Marca');
        $arti->idprov = $request->input('Proveedor');
        $arti->save();
        foreach ($temporals as $temporal) {
            $imagen = new ImagenArti();
            $imagen->imagen = $temporal->nombre;
            $imagen->idarti = $arti->id;    
            $imagen->save();
            $temporal->delete();
        }
        
        
        $marcas = Marca::all();
        $proveedores = Proveedor::orderBy('id','DESC')->where('estado', 'activo')->paginate(10);//muestra todos los datos de la lista en un list
        $articulos = Articulo::paginate(10);//muestra todos los datos de la lista en un list
        return view('articulo/articulo',compact('articulos'),compact('marcas'))->with(compact('proveedores'))->with('status','Guardado exitoso...!')->with('pagina','articulo');//hace el envio de datos en al url de clientes  
   
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request)
    {
        
        $marcas = Marca::all();
        $proveedores = Proveedor::orderBy('id','DESC')->where('estado', 'activo')->paginate(10);//muestra todos los datos de la lista en un list
        $articulos = Articulo::orderBy('id','DESC')->where('nombre', 'like','%'.$request->input('Buscar').'%')->paginate(10);//muestra todos los datos de la lista en un list
        return view('articulo/articulo',compact('articulos'),compact('marcas'))->with(compact('proveedores'))->with('pagina','articulo');//hace el envio de datos en al url de clientes 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(articulo $articulo)
    {
        if ($articulo->estado == 'activo') {
            $articulo->estado = 'inactivo';
        }else{
           
            $articulo->estado =  'activo';
           
        } 
        
        $articulo->save();
        $marcas = Marca::all();
        $proveedores = Proveedor::orderBy('id','DESC')->where('estado', 'activo')->paginate(10);//muestra todos los datos de la lista en un list
        $articulos = Articulo::paginate(10);//muestra todos los datos de la lista en un list
        return view('articulo/articulo',compact('articulos'),compact('marcas'))->with(compact('proveedores'))->with('pagina','articulo');//hace el envio de datos en al url de clientes 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticuloRequest $request, articulo $articulo)
    {
        if ($request->hasFile('Imagen')) {
            //eliminacion de la foto ya existente
            if ($articulo->imagen != 'default-150x150.png') { 
                $file_path = public_path().'/asset/img/articulos/'.$articulo->imagen;
                \File::delete($file_path);         
           }
            //agregando la nueva foto al path
            $file = $request->file('Imagen');//generando ruta de guardado
            $name = time().$file->getClientOriginalName();//generando nombre de usuario
            $file->move(public_path().'/asset/img/articulos',$name);////'
            $articulo->imagen = $name;
        }
        
        $articulo->nombre = $request->input('Nombre');
        $articulo->descripcion = $request->input('Descripcion');
        $articulo->vencimiento = $request->input('Vencimiento');
        $articulo->stok = $request->input('Cantidad');
        $articulo->precio = $request->input('Precio');
        $articulo->idmar = $request->input('Marca');
        $articulo->idprov = $request->input('Proveedor');
        
        $articulo->save();

        $marcas = Marca::all();
        $proveedores = Proveedor::orderBy('id','DESC')->where('estado', 'activo')->paginate(10);//muestra todos los datos de la lista en un list
        $articulos = Articulo::paginate(10);//muestra todos los datos de la lista en un list
        return view('articulo/articulo',compact('articulos'),compact('marcas'))->with(compact('proveedores'))->with('status','Actualización hecha, Satisfactoriamente...!')->with('pagina','articulo');//llamar a la vista del provee
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(articulo $articulo)
    {
        if ($articulo->imagen != 'default-150x150.png') { 
             $file_path = public_path().'/asset/img/articulos/'.$articulo->imagen;
             \File::delete($file_path);         
        }
       
        $articulo->delete();
        $marcas = Marca::all();
        $proveedores = Proveedor::orderBy('id','DESC')->where('estado', 'activo')->paginate(10);//muestra todos los datos de la lista en un list
        $articulos = Articulo::paginate(10);//muestra todos los datos de la lista en un list
        return view('articulo/articulo',compact('articulos'),compact('marcas'))->with(compact('proveedores'))->with('status','Eliminación hecha, Satisfactoriamente...!')->with('pagina','usuario');//llamar a la vista del provee
    }
     //___________________________##################################################################################_________________________
    //                  REPORTES
    
    public function reporte()
    {
        $articulos = Articulo::paginate(10);
        return view('articulo/reporte', compact('articulos'))->with('pagina','Reporte de artículos');
    }
    public function pdf() 
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $articulos = Articulo::all();
        $coment = 'Reporte de artículos con los datos sin filtrar';
        $pdf = PDF::loadView('pdf.articulo', compact('articulos','coment'))->setPaper('letter');//,'landscape' para cambiar la horientacion de la hoja
        return $pdf->stream('articulo.pdf');//descargar directa "dawnload" en lugar de stream
    }
    public function reporteac() // vista usuarios solo activos
    {
        $articulos = Articulo::orderBy('id','DESC')->where('estado', 'activo')->paginate(10);
        return view('articulo/reporte', compact('articulos'))->with('pagina','Reporte de artículos activos');
    }
    public function pdfac() //vista solo usuarios activos
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $articulos = Articulo::orderBy('id','DESC')->where('estado', 'activo')->get();
        $coment = 'Reporte de artículos activos';
        $pdf = PDF::loadView('pdf.articulo', compact('articulos','coment'))->setPaper('letter');//,'landscape' para cambiar la horientacion de la hoja
        return $pdf->stream('articulo.pdf');//descargar directa "dawnload" en lugar de stream
    }
    public function reportein() //Usuarios inactivos
    {
        $articulos = Articulo::orderBy('id','DESC')->where('estado', 'inactivo')->paginate(10);
        return view('articulo/reporte', compact('articulos'))->with('pagina','Reporte de artículos inactivos');
    }
    public function pdfin() //usuarios inactivos
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $articulos = Articulo::orderBy('id','DESC')->where('estado', 'inactivo')->get();
        $coment = 'Reporte de artículos inactivos';
        $pdf = PDF::loadView('pdf.articulo', compact('articulos','coment'))->setPaper('letter');//,'landscape' para cambiar la horientacion de la hoja
        return $pdf->stream('articulo.pdf');//descargar directa "dawnload" en lugar de stream
    }
}
