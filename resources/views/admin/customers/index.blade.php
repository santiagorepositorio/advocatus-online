@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')
    <h1>Gestion de Clientes</h1>
@stop

@section('content')
    @livewire('admin.customers-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop