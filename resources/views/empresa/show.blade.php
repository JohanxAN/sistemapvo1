@extends('layouts.app')

@section('template_title')
    {{ $empresa->name ?? 'Show Empresa' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Empresa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empresas.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Razon Social:</strong>
                            {{ $empresa->razon_social }}
                        </div>
                        <div class="form-group">
                            <strong>Rut:</strong>
                            {{ $empresa->rut }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $empresa->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $empresa->marca }}
                        </div>
                        <div class="form-group">
                            <strong>Serie Boleta:</strong>
                            {{ $empresa->serie_boleta }}
                        </div>
                        <div class="form-group">
                            <strong>Nro Correlativo Venta:</strong>
                            {{ $empresa->nro_correlativo_venta }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $empresa->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
