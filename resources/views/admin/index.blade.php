@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')
    <h1>Penel Central</h1>
@stop

@section('content')
    @livewire('admin.home-panel')
    <script>
        document.addEventListener('livewire:load', function () {
            
            console.log('Livewire cargado');
        });
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stack('scrippanel')
@stop

