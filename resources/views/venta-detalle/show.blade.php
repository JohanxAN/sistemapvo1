@extends('layouts.app')

@section('template_title')
    {{ $ventaDetalle->name ?? 'Show Venta Detalle' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Venta Detalle</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('venta-detalles.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Boleta:</strong>
                            {{ $ventaDetalle->id_boleta }}
                        </div>
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $ventaDetalle->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $ventaDetalle->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Total Venta:</strong>
                            {{ $ventaDetalle->total_venta }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Venta:</strong>
                            {{ $ventaDetalle->fecha_venta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
