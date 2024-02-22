<div class="form-group">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
        'placeholder' => 'Escriba un Nombre de Permiso',
    ]) !!}
    @error('name')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<strong>Permisos</strong>

@error('permissions')
    <br>
    <small class="text-danger">
        <strong>{{ $message }}</strong>
    </small>
    <br>
@enderror
<div class="container">
    <div class="row justify-content-center">
        @foreach ($permissions as $permission)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-2">
                <div class="custom-control custom-switch custom-switch-lg">
                    {!! Form::checkbox('permissions[]', $permission->id, null, [
                        'class' => 'custom-control-input',
                        
                        'id' => 'permissions_' . $permission->id,
                    ]) !!}
                
                    <label class="custom-control-label" for="{{ 'permissions_' . $permission->id }}">{{ $permission->name }}</label>
                </div>
            </div>
        @endforeach
    </div>
</div>



