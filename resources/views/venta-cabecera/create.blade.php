@extends('layouts.app')

@section('template_title')
    Create Venta Cabecera
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Venta Cabecera</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('venta-cabeceras.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('venta-cabecera.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
