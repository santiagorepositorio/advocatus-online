@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')
    <h1>Cursos pedientes</h1>
@stop

@section('content')
    {{-- @if (session('info'))
        <div class="alert alert-success" role="alert">
            {{ session('info') }}
        </div>
    @endif --}}
    @livewire('admin.courses-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
