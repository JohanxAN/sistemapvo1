<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('codigo_producto') }}
            {{ Form::number('codigo_producto', $producto->codigo_producto, ['class' => 'form-control' . ($errors->has('codigo_producto') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Producto']) }}
            {!! $errors->first('codigo_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria_producto') }}
            {{ Form::select('id_categoria_producto', $categorias, $producto->id_categoria_producto, ['class' => 'form-control' . ($errors->has('id_categoria_producto') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Producto']) }}
            {!! $errors->first('id_categoria_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_producto') }}
            {{ Form::text('descripcion_producto', $producto->descripcion_producto, ['class' => 'form-control' . ($errors->has('descripcion_producto') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Producto']) }}
            {!! $errors->first('descripcion_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_compra_producto') }}
            {{ Form::number('precio_compra_producto', $producto->precio_compra_producto, ['class' => 'form-control' . ($errors->has('precio_compra_producto') ? ' is-invalid' : ''), 'placeholder' => 'Precio Compra Producto']) }}
            {!! $errors->first('precio_compra_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_venta_producto') }}
            {{ Form::number('precio_venta_producto', $producto->precio_venta_producto, ['class' => 'form-control' . ($errors->has('precio_venta_producto') ? ' is-invalid' : ''), 'placeholder' => 'Precio Venta Producto']) }}
            {!! $errors->first('precio_venta_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stock_producto') }}
            {{ Form::number('stock_producto', $producto->stock_producto, ['class' => 'form-control' . ($errors->has('stock_producto') ? ' is-invalid' : ''), 'placeholder' => 'Stock Producto']) }}
            {!! $errors->first('stock_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('minimo_stock_producto') }}
            {{ Form::number('minimo_stock_producto', $producto->minimo_stock_producto, ['class' => 'form-control' . ($errors->has('minimo_stock_producto') ? ' is-invalid' : ''), 'placeholder' => 'Minimo Stock Producto']) }}
            {!! $errors->first('minimo_stock_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ventas_producto') }}
            {{ Form::number('ventas_producto', $producto->ventas_producto, ['class' => 'form-control' . ($errors->has('ventas_producto') ? ' is-invalid' : ''), 'placeholder' => 'Ventas Producto']) }}
            {!! $errors->first('ventas_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>