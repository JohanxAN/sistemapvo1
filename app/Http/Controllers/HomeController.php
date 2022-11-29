<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

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
        $productos = Producto::orderByRaw("CAST(ventas_producto as UNSIGNED) DESC")->limit(10)->get();

        $puntos = [];
        foreach ($productos as $producto) {
            $puntos[] = ["name" => $producto["descripcion_producto"], "y" => floatval($producto["ventas_producto"])];
        }
        return view('home', ['data' => json_encode($puntos)]);
    }
}
