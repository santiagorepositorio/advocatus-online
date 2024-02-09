@extends('adminlte::page')

@section('title', 'Advocatus Online Certificados')

@section('content_header')
    <h1>Cursos para certificación</h1>
@stop

@section('content')
    {{-- @if (session('info'))
        <div class="alert alert-success" role="alert">
            {{ session('info') }}
        </div>
    @endif --}}
    @livewire('admin.course-certificate')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop