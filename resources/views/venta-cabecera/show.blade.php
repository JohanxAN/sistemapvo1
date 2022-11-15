@extends('layouts.app')

@section('template_title')
    {{ $ventaCabecera->name ?? 'Show Venta Cabecera' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('venta-cabeceras.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Venta N°: {{ $ventaCabecera->id }}</strong>
                        </div>
                        <div class="form-group">
                            <strong>Fecha Venta:</strong>
                            {{ $ventaCabecera->fecha_venta }}
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Producto</th>
										<th>Cantidad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($ventaDetalles as $ventaDetalle)
                                        <tr>
											<td>{{ $ventaDetalle->producto->descripcion_producto }}</td>
											<td>{{ $ventaDetalle->cantidad }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            {{ $ventaCabecera->subtotal }}
                        </div>
                        <div class="form-group">
                            <strong>Iva:</strong>
                            {{ $ventaCabecera->IVA }}
                        </div>
                        <div class="form-group">
                            <strong>Total Venta:</strong>
                            {{ $ventaCabecera->total_venta }}
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
