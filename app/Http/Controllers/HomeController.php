<?php

namespace App\Http\Controllers;
use App\ImagenArti;
use App\Articulo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        if (auth()->user()->tipo == 'Administrador' OR auth()->user()->tipo == 'Secretaria' ) {
            return view('home')->with('pagina','home');
        }
        else{
            $imagenes = ImagenArti::all();
            $articulos = Articulo :: paginate('12');
            return view('vistas.vistas',compact('articulos'))->with(compact('imagenes'));
        }
        
    }
}
