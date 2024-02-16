@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')
    <h1>Edicion del Rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
            @include('admin.roles.partials.form')
            
            {!! Form::submit('Editar Permisos', ['class' => 'btn btn-primary mt-2']) !!}
            <a href="{{ route('admin.roles.index') }}" class="btn btn-danger mt-2">SALIR</a>
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