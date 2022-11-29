

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalle de Venta') }}
                            </span>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Producto</th>
                                        <th>Precio Unitario</th>
										<th>Cantidad</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventaList as $ventaDetalle)
                                        <tr>
											<td>{{ $ventaDetalle->descripcion_producto }}</td>
                                            <td>{{ $ventaDetalle->precio_venta_producto }}</td>
											<td>{{ $ventaDetalle->cantidad }}</td>
                                            <td>{{ $ventaDetalle->cantidad * $ventaDetalle->precio_venta_producto }}</td>
                                            <td>
                                            <form action="{{ route('venta-detalles.destroy',$ventaDetalle->id_producto) }}" method="POST">
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
                    
                    <div class="card-body">
                        <div class="box box-info padding-1">
                            <div class="box-body">
                                <div class="form-group">
                                    <strong>Documento:</strong>
                                    <select class="form-control" name="documento">
                                        <option value="0">Boleta</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Tipo Pago:</strong>
                                    <select class="form-control" name="tipo_pago">
                                        <option value="0">Efectivo</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <p>Subtotal: ${{$total}}</p>
                        <p>IVA: ${{$total * 0.19}}</p>
                        <p>Total: $<span id="total">{{$total *1.19}}</span></p>
                        <hr>
                        <form method="POST" action="{{ route('venta-cabeceras.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <strong>Monto Efectivo: $</strong>
                            <div class="form-group">
                                {{ Form::label('Monto Efectivo') }}
                                {{ Form::number('monto_efectivo', 0, ['id' => 'pago', 'class' => 'form-control' . ($errors->has('monto_efectivo') ? ' is-invalid' : ''), 'placeholder' => 'Monto Efectivo']) }}
                                {!! $errors->first('monto_efectivo', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <p  class="text-danger">Vuelto: $<span id="vuelto">0</span></p>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                        </form>
                        
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <script>
        let total = document.getElementById('total').innerText; 
        let pago = document.getElementById('pago'); 
        var vuelto = document.getElementById("vuelto");
        pago.addEventListener("keyup", function(){
            const newTotal =  parseInt(this.value)-parseInt(total)
            if(newTotal > 0){
                vuelto.textContent = newTotal;
            }else{
                vuelto.textContent = 0;
            }
        });

    </script>