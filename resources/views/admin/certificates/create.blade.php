@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')
    <h1>Asignacion de Certificado y Link</h1>
@stop

@section('content')
<div class="container py-2">
    <div class="card">
        <div class="card-body">
            <h1 class="h2 font-weight-bold">Certificado y Link de Grupo:</h1>
            <h1 class="h2 font-weight-bold">{{ $course->title }}</h1>
            <hr class="my-4">
            {!! Form::open(['route' => 'admin.course.certificate.store', 'autocomplete' => 'off', 'files' => true]) !!}
            {!! Form::hidden('course_id', $course->id) !!}
            
            <div class="form-group mb-4">
                {!! Form::label('link', 'Link de Grupo', ['class' => 'font-weight-bold']) !!}
                {!! Form::text('link', null, ['class' => 'form-control'.($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el link del grupo']) !!}
                @error('link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-4">
                {!! Form::label('carga', 'Carga horaria', ['class' => 'font-weight-bold']) !!}
                {!! Form::text('carga', null, ['class' => 'form-control'.($errors->has('carga') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la carga horaria']) !!}
                @error('carga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <h2 class="h3 font-weight-bold mt-8 mb-4">Imagen del Certificado</h2>
            <div class="row mb-4">
                <div class="col-md-6">
                    <figure class="text-center">
                        @isset($course->certificate->image)
                            <img name="picture" id="picture" class="img-fluid" src="{{ Storage::url($course->certificate->image->url) }}" alt="Certificado">
                        @else           
                            <img name="picture" id="picture" class="img-fluid" src="https://media.istockphoto.com/id/1146532466/es/foto/fondo-digital-azul-abstracto.jpg?s=2048x2048&w=is&k=20&c=Fa-z_DwZb-gz2FSD63efzRFlW3wxfUwpjFXR-gq2jzc=" alt="Certificado">
                        @endisset
                    </figure>
                </div>
                <div class="col-md-6">
                    <p class="mb-2">Debe subir una imagen en formato PNG para una mejor resolución.</p>
                    {!! Form::file('file', ['class' => 'form-control-file'.($errors->has('file') ? ' is-invalid' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="text-right">
                {!! Form::submit('Registrar Informacion', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop