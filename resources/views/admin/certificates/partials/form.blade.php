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
{{-- <div class="form-group mb-4">
    {!! Form::label('course_id', 'Link de Grupo', ['class' => 'font-weight-bold']) !!}
    {!! Form::text('course_id', null, ['class' => 'form-control'.($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el link del grupo']) !!}
    @error('link')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> --}}

<h2 class="h3 font-weight-bold mt-8 mb-4">Imagen del Certificado</h2>
<div class="row mb-4">
    <div class="col-md-6">
        <figure class="text-center">
            @isset($course->certificate->image)
                <img name="picture" id="picture" class="img-fluid" src="{{ Storage::url($certificate->image->url) }}" alt="Certificado">
            @else           
                <img name="picture" id="picture" class="img-fluid" src="{{ asset('img/home/imagen-no-disponible.png') }}" alt="Certificado">
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