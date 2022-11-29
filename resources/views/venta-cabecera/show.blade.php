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
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <a class="btn btn-primary" href="{{ route('venta-cabeceras.index') }}"> Volver</a>
                             <div class="float-right">
                                <form action="{{ route('productos.destroy',$ventaCabecera->id) }}" method="POST">
                                    <a class="btn btn-sm btn-primary " href="{{ route('venta-cabeceras.pdf',$ventaCabecera->id) }}"><i class="fa fa-fw fa-eye"></i>BOLETA</a>
                                </form>
                            </div>
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
                                        <th>Precio Unitario</th>
										<th>Cantidad</th>
                                        <th>Total Venta</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($ventaDetalles as $ventaDetalle)
                                        <tr>
											<td>{{ $ventaDetalle->descripcion_producto }}</td>
                                            <td>${{ $ventaDetalle->precio_unitario }}</td>
											<td>{{ $ventaDetalle->cantidad }}</td>
                                            <td>${{ $ventaDetalle->total_venta }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            $ {{ $ventaCabecera->subtotal }}
                        </div>
                        <div class="form-group">
                            <strong>Iva:</strong>
                            $ {{ $ventaCabecera->IVA }}
                        </div>
                        <div class="form-group">
                            <strong>Total Venta:</strong>
                            $ {{ $ventaCabecera->total_venta }}
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
