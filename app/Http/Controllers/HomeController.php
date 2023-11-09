<?php

namespace App\Http\Controllers;

//Se utiliza para importar la fachada Http, que proporciona una forma sencilla de realizar solicitudes HTTP en tu aplicación. 
use Illuminate\Support\Facades\Http;

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
        //Http::get() se utiliza para realizar una solicitud GET a la URL especificada. 
        //$usuarios = HTTP::get('https://jsonplaceholder.typicode.com/users');
        //. Luego, se utiliza el método json() para obtener los datos de la respuesta en formato JSON y almacenarlos en la variable $usuariosArray. En resumen, esta línea de código convierte los datos JSON obtenidos de la solicitud en un arreglo PHP para que puedas trabajar con ellos en tu aplicación.
        //$usuariosArray = $usuarios->json();
                            //se utiliza para crear un arreglo asociativo donde la clave es el nombre de la variable y el valor es el contenido de la variable. En este caso, $usuariosArray es una variable que contiene un arreglo de datos que previamente obtuviste de una solicitud HTTP, como se mencionó en tu código anterior.
        //return view('home', compact('usuariosArray'));
    }
}
