@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Cafeteria Admin</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show') }} Detallespedido</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('detallespedidos.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Pedido Id:</strong>
                        {{ $detallespedido->pedido_id }}
                    </div>
                    <div class="form-group">
                        <strong>Producto Id:</strong>
                        {{ $detallespedido->producto_id }}
                    </div>
                    <div class="form-group">
                        <strong>Cantidad:</strong>
                        {{ $detallespedido->cantidad }}
                    </div>
                    <div class="form-group">
                        <strong>Subtotal:</strong>
                        {{ $detallespedido->subtotal }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
    

