@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')
    <h1>Registro de Categorias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}
                @include('admin.categories.partials.form')
                
                {!! Form::submit('Crear Categoria', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
<script src="{{ asset('js/admin/categories/form.js') }}"></script>
    <script> console.log('Hi!'); </script>
@stop
