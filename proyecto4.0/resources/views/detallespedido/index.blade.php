@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Cafeteria Admin</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Detallespedido') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('detallespedidos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Create New') }}
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
                                    
                                    <th>Pedido Id</th>
                                    <th>Producto Id</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detallespedidos as $detallespedido)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $detallespedido->pedido_id }}</td>
                                        <td>{{ $detallespedido->producto_id }}</td>
                                        <td>{{ $detallespedido->cantidad }}</td>
                                        <td>{{ $detallespedido->subtotal }}</td>

                                        <td>
                                            <form action="{{ route('detallespedidos.destroy',$detallespedido->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('detallespedidos.show',$detallespedido->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('detallespedidos.edit',$detallespedido->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $detallespedidos->links() !!}
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
    
