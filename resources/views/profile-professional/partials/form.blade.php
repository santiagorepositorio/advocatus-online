<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="mb-4">
        {!! Form::label('category_id', 'Seleccione una Categoria') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1 font-bold']) !!}
    </div>
    <div class="mb-4">
        {!! Form::label('name', 'Nombre del Perfil') !!}
        {!! Form::text('name', null, [
            'class' => 'form-input block w-full mt-1 font-bold' . ($errors->has('name') ? ' border-red-600 ' : ''),
            'placeholder' => 'Escriba el Nombre de la Empresa, Firma o Slogan',
        ]) !!}

        @error('name')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
    <div class="mb-4">
        {!! Form::label('slug', 'Slug del perfil') !!}
        {!! Form::text('slug', null, [
            'readonly' => 'readonly',
            'class' => 'form-input block w-full mt-1 font-bold' . ($errors->has('slug') ? ' border-red-600' : ''),
        ]) !!}
        @error('slug')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="mb-4">
        {!! Form::label('rpa', 'Registro Juridico') !!}
        {!! Form::text('rpa', null, [
            'class' => 'form-input block w-full mt-1 font-bold' . ($errors->has('rpa') ? ' border-red-600' : ''),
            'placeholder' => 'Registro RPA si tiene',
        ]) !!}
        @error('rpa')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
    <div class="mb-4">
        {!! Form::label('nit', 'NIT') !!}
        {!! Form::text('nit', null, [
            'class' => 'form-input block w-full mt-1 font-bold' . ($errors->has('nit') ? ' border-red-600' : ''),
            'placeholder' => 'Escriba su NIT si tiene',
        ]) !!}

        @error('nit')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
    <div class="mb-4">
        {!! Form::label('phone', 'Celular') !!}
        {!! Form::text('phone', null, [
            'class' => 'form-input block w-full mt-1 font-bold' . ($errors->has('phone') ? ' border-red-600' : ''),
            'placeholder' => 'Escriba su Número de Celular',
        ]) !!}

        @error('phone')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="mb-4">
        {!! Form::label('city', 'Ciudad') !!}
        {!! Form::text('city', null, [
            'class' => 'form-input block w-full mt-1 font-bold' . ($errors->has('city') ? ' border-red-600' : ''),
            'placeholder' => 'Escriba la Ciudad residente "La Paz"',
        ]) !!}
        @error('city')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
    <div class="mb-4">
        {!! Form::label('state', 'Pais') !!}
        {!! Form::text('state', null, [
            'class' => 'form-input block w-full mt-1 font-bold' . ($errors->has('state') ? ' border-red-600' : ''),
            'placeholder' => 'Escriba el Pais residente "Bolivia"',
        ]) !!}

        @error('state')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
    <div class="mb-4">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, [
            'class' => 'form-input block w-full mt-1 font-bold' . ($errors->has('email') ? ' border-red-600' : ''),
            'placeholder' => 'Escriba su email',
        ]) !!}

        @error('email')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
    <div class="mb-4">
        {!! Form::label('about', 'Descripcion del curso') !!}
        {!! Form::textarea('about', null, [
            'class' => 'form-input block w-full mt-1 font-bold' . ($errors->has('about') ? ' border-red-600' : ''),
            'placeholder' => 'Escriba todo lo referete a la Institucion o "Quienes Somos"',
        ]) !!}
        @error('about')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
    <div>

        {!! Form::hidden('latitude', old('latitude', request('latitude')), [
            'id' => 'latitude',
            'class' => 'form-input' . ($errors->has('latitude') ? ' border-red-500' : ''),
            'required' => true,
        ]) !!}

        {!! Form::hidden('longitude', old('longitude', request('longitude')), [
            'id' => 'longitude',
            'class' => 'form-input' . ($errors->has('longitude') ? ' border-red-500' : ''),
            'required' => true,
        ]) !!}
        {!! Form::label('mapid', 'Tu Ubicación') !!}
        <div id="mapid" class=" mb-4 mt-4 h-64 sm:h-96 lg:h-128 w-full"></div>

    </div>
</div>
<h1 class="text-2xl font-bold mt-8 mb-2">
    Imgen del Perfil
</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($profile->image)
            <img name="picture" id="picture" class="w-full h-72 object-cover object-center"
                src="{{ Storage::url($profile->image->url) }}">
        @else
            <img name="picture" id="picture" class="w-full h-72 object-cover object-center"
                src="{{ asset('img/home/imagen-no-disponible.png') }}">
        @endisset
    </figure>
    <div>
        <p class="mb-2">Debe subir una imagen de su Perfil de lo contrario cargara una por defecto</p>
        {!! Form::file('file', [
            'class' => 'form-input w-full ' . ($errors->has('file') ? ' border-red-600' : ''),
            'id' => 'file',
            'accept' => 'image/*',
        ]) !!}
        @error('file')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
</div>
