<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Empresa;
use App\Models\VentaDetalle;
use App\Models\VentaCabecera;
use Illuminate\Http\Request;
use PDF;

session_start();
date_default_timezone_set('America/Santiago');

/**
 * Class VentaCabeceraController
 * @package App\Http\Controllers
 */
class VentaCabeceraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_destroy();
        $ventaCabeceras = VentaCabecera::paginate();

        return view('venta-cabecera.index', compact('ventaCabeceras'))
            ->with('i', (request()->input('page', 1) - 1) * $ventaCabeceras->perPage());
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $productos = $_SESSION["CART"];
        if(count($productos) == 0){
            $message = 'Debe ingresar productos';
            return redirect()->route('venta-detalles.create')
            ->with('error', $message);
        }
        $total = 0;
        foreach ($productos as $key => $value) {
            $total += $value->precio_venta_producto * $value->cantidad;
        }

        if(!$request->monto_efectivo ||$request->monto_efectivo< $total){
            $message = 'Debe ingresar el monto en efectivo';
            return redirect()->route('venta-detalles.create')
            ->with('error', $message);
        }

        $IVA = $total*0.19;

        $venta = ["id_empresa" => 1, "descripcion" => "", "subtotal" => $total, "IVA" => $IVA, "total_venta" => $total + $IVA, "fecha_venta" => date("Y-m-d H:i:s"), "monto_efectivo" => $request->monto_efectivo];
        $ventaCabecera = VentaCabecera::create($venta);
    
        
        foreach ($productos as $key => $value) {
            $detalle = ["id_boleta" => $ventaCabecera["id"], "codigo_producto"=>$value->codigo_producto, "descripcion_producto"=>$value->descripcion_producto,"cantidad"=> $value->cantidad, "precio_unitario"=>$value->precio_venta_producto,"total_venta"=>($value->precio_venta_producto * $value->cantidad), "fecha_venta"=>date("Y-m-d H:i:s")];
           
            $producto = Producto::find($value->id_producto);
            $producto->stock_producto = (int)$producto->stock_producto - (int)$value->cantidad;
            $producto->ventas_producto = (int)$producto->ventas_producto + (int)$value->cantidad;
            $producto->save();
           
            $ventaDetalle = VentaDetalle::create($detalle);
        }
        $_SESSION["CART"] = [];
        return redirect()->route('venta-cabeceras.show',$ventaCabecera->id)
            ->with('success', 'VentaCabecera creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ventaCabecera = VentaCabecera::find($id);
        $ventaDetalles = VentaDetalle::where('id_boleta', $id)->get();
        return view('venta-cabecera.show', compact('ventaCabecera', "ventaDetalles"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ventaCabecera = VentaCabecera::find($id);

        return view('venta-cabecera.edit', compact('ventaCabecera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  VentaCabecera $ventaCabecera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VentaCabecera $ventaCabecera)
    {
        request()->validate(VentaCabecera::$rules);

        $ventaCabecera->update($request->all());

        return redirect()->route('venta-cabeceras.index')
            ->with('success', 'VentaCabecera actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ventaCabecera = VentaCabecera::find($id)->delete();

        return redirect()->route('venta-cabeceras.index')
            ->with('success', 'VentaCabecera eliminado correctamente');
    }

    public function pdf($id)
    {
        $ventaCabecera = VentaCabecera::find($id);
        $ventaDetalles = VentaDetalle::where('id_boleta', $id)->get();
        $empresa = Empresa::where('id', $ventaCabecera->id_empresa)->first();

        $pdf = PDF::loadView("venta-cabecera.pdf", ['ventaCabecera' => $ventaCabecera, "ventaDetalles" => $ventaDetalles, "empresa" => $empresa]);
        return $pdf->stream();
        return view('venta-cabecera.pdf', compact('ventaCabecera', "ventaDetalles", "empresa"));

    }
}
