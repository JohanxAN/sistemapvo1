<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\VentaCabecera;
use App\Models\VentaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

session_start();
/**
 * Class VentaDetalleController
 * @package App\Http\Controllers
 */
class VentaDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventaDetalles = VentaDetalle::paginate();

        return view('venta-detalle.index', compact('ventaDetalles'))
            ->with('i', (request()->input('page', 1) - 1) * $ventaDetalles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function create()
    {
        $ventaDetalle = new VentaDetalle();
        $productos = Producto::pluck("descripcion_producto", "id");
        if(!isset($_SESSION["CART"])){
            $_SESSION["CART"] = array();
        };
        $total = 0;
        foreach ($_SESSION["CART"] as $key => $value) {
            $total += $value->precio_venta_producto *  $value->cantidad;
        }
        $ventaList = $_SESSION["CART"];
        $documentos = ["Boleta"];
        $TipoPago = ["Efectivo"];
        return view('venta-detalle.create', compact('ventaDetalle', "productos", "ventaList", "total", "documentos", "TipoPago"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(VentaDetalle::$rules);

        $producto = Producto::find($request["id_producto"]);

        $data = (object)["id_producto" => $request["id_producto"], "codigo_producto" => $producto->codigo_producto, "descripcion_producto" => $producto->descripcion_producto, "cantidad" => $request["cantidad"], "precio_venta_producto" => $producto->precio_venta_producto];
       
        if($request["cantidad"] > $producto->stock_producto){
            $message = 'Sin Stock. Stock Disponible '.$producto->stock_producto.' unidades de '.$producto->descripcion_producto;
            return redirect()->route('venta-detalles.create')
            ->with('error', $message);
        }
        if(isset($_SESSION["CART"])){
           $array =  $_SESSION["CART"];
           array_push($array, $data);
           $_SESSION["CART"] = $array;
        }else{
            $array =  array();
            array_push($array, $data);
            $_SESSION["CART"] = $array;
        }

        return redirect()->route('venta-detalles.create')
            ->with('success', 'Agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $ventaDetalle = $_SESSION["CART"];

        return view('venta-detalle.show', compact('ventaDetalle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ventaDetalle = VentaDetalle::find($id);

        return view('venta-detalle.edit', compact('ventaDetalle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  VentaDetalle $ventaDetalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VentaDetalle $ventaDetalle)
    {
        request()->validate(VentaDetalle::$rules);

        $ventaDetalle->update($request->all());

        return redirect()->route('venta-detalles.create')
            ->with('success', 'actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $array = $_SESSION["CART"];
        foreach ($array as $key => $value) {
            if($value->id_producto == $id){
                unset($array[$key]);
            }
        }
        $_SESSION["CART"] = $array;
        return redirect()->route('venta-detalles.create')
            ->with('success', 'eliminado correctamente');
    }
}
