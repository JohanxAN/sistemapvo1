<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>


                   
                        <div style="text-align:center">
                            <hr>
                            <span>R.U.T.: {{$empresa->rut}}</span><br/>
                            <span>Boleta N°: {{ $ventaCabecera->id }}</span><br/>
                            <span>Fecha Emisión:  {{ $ventaCabecera->fecha_venta }}</span>
                            <hr>
                            <span style="text-transform:uppercase; font-size:20px">{{$empresa->razon_social}}</span><br/>
                            
                           
                        </div>
              
                       
                        <hr>
                        
    
                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:left">Producto</th>
                                    <th style="text-align:left">Precio Unitario</th>
                                    <th style="text-align:left">Cantidad</th>
                                    <th style="text-align:left">Total Venta</th>
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
                 
                
                    <div style="width:200px;float:right; margin-top:50px">
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
                        <div class="form-group">
                            <strong>Vuelto:</strong>
                            $ {{ $ventaCabecera->monto_efectivo - $ventaCabecera->total_venta }}
                        </div>
                    </div>
 

    </section>
</body>
</html>

   

