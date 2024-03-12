@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')

@stop

@section('content')
    <div class=" py-2">
        <div class="card">
            <div class="card-body">

                <hr class="my-4">
                {!! Form::model($certificate, [
                    'route' => ['admin.certificates.update', $certificate],
                    'method' => 'put',
                    'files' => true,
                ]) !!}
                <div class="flex">
                    <h1 class="h2 font-weight-bold">Certificado y Link de Grupo: {{ $course->title }}</h1>
                    {!! Form::submit('Editar Certificado y Link', ['class' => 'btn btn-primary mt-2']) !!}
                    <a class="btn btn-danger ml-2 mt-2" href="{{ route('admin.certificates.index') }}">VOLVER</a>

                </div>

                @include('admin.certificates.partials.form')


                {!! Form::close() !!}


                {{-- {!! Form::open(['route' => 'admin.course.certificate.store', 'autocomplete' => 'off', 'files' => true]) !!}
            {!! Form::hidden('course_id', $course->id) !!}
            
            @include('admin.certificates.partials.form')
            
            <div class="text-right">
                {!! Form::submit('Registrar Informacion', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!} --}}
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
