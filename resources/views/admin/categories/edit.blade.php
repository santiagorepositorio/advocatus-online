@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')
    <h1>Edicion de la Categoria</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-primary" role="alert">
    <strong>Exito!</strong> {{ session('info') }}
</div>
    
@endif
<div class="card">
    <div class="card-body">
        {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}
            @include('admin.categories.partials.form')
            
            {!! Form::submit('Editar Categoria', ['class' => 'btn btn-primary mt-2']) !!}
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