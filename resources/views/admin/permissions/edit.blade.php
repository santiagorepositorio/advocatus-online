@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')
    <h1>Edicion del Permiso</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($permission, ['route' => ['admin.permissions.update', $permission], 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre: ') !!}
            {!! Form::text('name', null, [
                'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                'placeholder' => 'Escriba un Nombre de Permiso',
            ]) !!}
            @error('name')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
            {!! Form::submit('Editar Permisos', ['class' => 'btn btn-primary mt-2']) !!}
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-danger mt-2">SALIR</a>
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