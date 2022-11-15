@extends('layouts.app')

@section('template_title')
    Venta Cabecera
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ventas') }}
                            </span>
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
                                    
										<th>Subtotal</th>
										<th>Iva</th>
										<th>Total Venta</th>
										<th>Fecha Venta</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventaCabeceras as $ventaCabecera)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $ventaCabecera->subtotal }}</td>
											<td>{{ $ventaCabecera->IVA }}</td>
											<td>{{ $ventaCabecera->total_venta }}</td>
											<td>{{ $ventaCabecera->fecha_venta }}</td>

                                            <td>
                                                <form action="{{ route('venta-cabeceras.destroy',$ventaCabecera->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('venta-cabeceras.show',$ventaCabecera->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ventaCabeceras->links() !!}
            </div>
        </div>
    </div>
@endsection
