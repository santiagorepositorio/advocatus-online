<div class="form-group">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Escriba un Nombre de Categoria']) !!}
     @error('name')
    <span class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </span>                        
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly','class' => 'form-input block w-full mt-1'.($errors->has('slug') ? ' border-red-600' : '')]) !!}
    @error('slug')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('status', 'Tipo :') !!}
    {!! Form::select('status', ['Curso'=>'Curso','Perfil'=>'Perfil', 'Blog'=>'Blog', 'Material'=>'Material', 'Centro'=>'Centro'], null, ['class' => 'form-input block w-full mt-1']) !!}
</div>


