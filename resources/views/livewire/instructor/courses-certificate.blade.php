<div>
    <div class=" flex gap-3">
        <h1 class="text-2xl font-bold">Registrar Link - Horas - Certificado</h1>
        @if ($course->certificate->id ?? false)
           {{-- <a class="btn btn-primary" href="{{ route('admin.certificates.edit', $course->certificate->id) }}">EDITAR </a> --}}
        @else
            <td width="10px">
                <a class="inline-block bg-green-500 text-white px-4 py-2 rounded-lg mr-4 cursor-pointer"
                    wire:click="asigna({{ $course->id }})">HABILITAR</a>
            </td>
        @endif
    </div>
    <hr class="mt-2 mb-6">
    @if ($course->certificate->id ?? false)
        <div class=" py-2">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($course->certificate, [
                        'route' => ['instructor.certificates.update', $course->certificate],
                        'method' => 'put',
                        'files' => true,
                    ]) !!}
                    <div class="flex justify-end">

                        {!! Form::submit('Guardar Cambios', ['class' => 'btn btn-primary mt-2']) !!}
                        

                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('link', 'Link de Grupo', ['class' => 'font-weight-bold']) !!}
                        {!! Form::text('link', null, [
                            'class' => 'form-input block w-full mt-1' . ($errors->has('link') ? ' is-invalid' : ''),
                            'placeholder' => 'Ingrese el link del grupo',
                        ]) !!}
                        @error('link')
                            <strong class="text-xs text-red-500">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('carga', 'Carga horaria', ['class' => 'font-weight-bold']) !!}
                        {!! Form::text('carga', null, [
                            'class' => 'form-input block w-full mt-1' . ($errors->has('carga') ? ' is-invalid' : ''),
                            'placeholder' => 'Ingrese la carga horaria',
                        ]) !!}
                        @error('carga')
                            <strong class="text-xs text-red-500">{{ $message }}</strong>
                        @enderror
                    </div>
                    <h2 class="h3 font-weight-bold mt-8 mb-4">Imagen del Certificado</h2>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-2">Debe subir una imagen en formato PNG para una mejor resolución.</p>
                            {!! Form::file('file', [
                                'class' => 'form-input w-full ' . ($errors->has('file') ? ' border-red-600' : ''),
                                'id' => 'file',
                                'accept' => 'image/*',
                            ]) !!}
                            @error('file')
                                <strong class="text-xs text-red-500">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <figure class="text-center">
                                @isset($course->certificate->image)
                                    <img name="picture" id="picture" class="w-full h-72 object-cover object-center"
                                        src="{{ Storage::url($course->certificate->image->url) }}" alt="Certificado">
                                @else
                                    <img name="picture" id="picture" class="w-full h-72 object-cover object-center"
                                        src="{{ asset('img/home/imagen-no-disponible.png') }}" alt="Certificado">
                                @endisset
                            </figure>
                        </div>

                    </div>


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
    @else
    @endif

</div>
