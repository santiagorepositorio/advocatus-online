<div class="mb-4">
    {!! Form::label('link', 'Link de Grupo') !!}
    {!! Form::text('link', null, ['class' => 'form-input block w-full mt-1'.($errors->has('link') ? ' border-red-600' : '')]) !!}
    @error('link')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('carga', 'Carga horaria') !!}
    {!! Form::textarea('carga', null, ['class' => 'form-input block w-full mt-1'.($errors->has('carga') ? ' border-red-600' : '')]) !!}
    @error('carga')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">
    Imgen del Certificado
</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->certificate->image)
        <img name="picture" id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($course->certificate->image->url) }}"> 
        @else           
        <img name="picture" id="picture" class="w-full h-64 object-cover object-center" src="{{asset('img/home/imagen-no-disponible.png') }}"> 
        @endisset
    </figure>
    <div>
        <p class="mb-2">Debe subir uma imagen en formato PNG para su mejor resolucion</p>
        {!! Form::file('file', ['class' => 'form-input w-full '.($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
        @error('file')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
</div> 