<div class="mb-4">
    {!! Form::label('title', 'Titulo de Publicidad') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1'.($errors->has('title') ? ' border-red-600' : '')]) !!}
    @error('title')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripcion del Banner') !!}
    {!! Form::text('description', null, ['class' => 'form-input block w-full mt-1'.($errors->has('description') ? ' border-red-600' : '')]) !!}
    @error('description')
    <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('link', 'Link de la Publicidad') !!}
    {!! Form::text('link', null, ['class' => 'form-input block w-full mt-1'.($errors->has('link') ? ' border-red-600' : '')]) !!}
    @error('link')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>
<h1 class="text-2xl font-bold mt-8 mb-2">
    Imgen del Banner
</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($publicity->image)
        <img name="picture" id="picture" class="w-full h-72 object-cover object-center" src="{{ Storage::url($publicity->image->url) }}"> 
        @else           
        <img name="picture" id="picture" class="w-full h-72 object-cover object-center" src="{{asset('img/home/imagen-no-disponible.png') }}"> 
        @endisset
    </figure>
    <div>
        <p class="mb-2">Debe subir una imagen de su Curso de lo contrario cargara una por defecto</p>
        {!! Form::file('file', ['class' => 'form-input w-full '.($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
        @error('file')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
</div> 