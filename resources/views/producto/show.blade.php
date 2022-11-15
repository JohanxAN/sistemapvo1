@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? 'Show Producto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo Producto:</strong>
                            {{ $producto->codigo_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Id Categoria Producto:</strong>
                            {{ $producto->id_categoria_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion Producto:</strong>
                            {{ $producto->descripcion_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Compra Producto:</strong>
                            {{ $producto->precio_compra_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Venta Producto:</strong>
                            {{ $producto->precio_venta_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Utilidad:</strong>
                            {{ $producto->utilidad }}
                        </div>
                        <div class="form-group">
                            <strong>Stock Producto:</strong>
                            {{ $producto->stock_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Minimo Stock Producto:</strong>
                            {{ $producto->minimo_stock_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Ventas Producto:</strong>
                            {{ $producto->ventas_producto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
