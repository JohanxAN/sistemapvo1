@extends('layouts.app')

@section('template_title')
    Venta Detalle
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Venta Detalle') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('venta-detalles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Boleta</th>
										<th>Id Producto</th>
										<th>Cantidad</th>
										<th>Total Venta</th>
										<th>Fecha Venta</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventaDetalles as $ventaDetalle)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ventaDetalle->id_boleta }}</td>
											<td>{{ $ventaDetalle->id_producto }}</td>
											<td>{{ $ventaDetalle->cantidad }}</td>
											<td>{{ $ventaDetalle->total_venta }}</td>
											<td>{{ $ventaDetalle->fecha_venta }}</td>

                                            <td>
                                                <form action="{{ route('venta-detalles.destroy',$ventaDetalle->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('venta-detalles.show',$ventaDetalle->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('venta-detalles.edit',$ventaDetalle->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ventaDetalles->links() !!}
            </div>
        </div>
    </div>
@endsection
