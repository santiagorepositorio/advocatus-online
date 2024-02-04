@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')
    <h1>Advocatus</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h5">Nombre:</h1>
            <p class="form-control">{{ $user->name }}</p>
            <h1 class="h5">Lista de Estatus:</h1>
            {!! Form::model($user, ['route' => ['admin.customer.customers_update', $courses], 'method' => 'put']) !!}
            <div class="mb-4">
                {!! Form::label('status', 'Tipo') !!}
                {!! Form::select('status', $courses, null, ['class' => 'form-input block w-full mt-1']) !!}
            </div>
            {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop