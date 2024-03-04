<div>
    @if (session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>Exito!</strong> {{ session('info') }}
    </div>
        
    @endif
    <div class="card">
        <div class="card-header">
            <input wire:keydowm="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escribe un Nombre..."></input>
                        
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Categoria</th>
                        <th>Estado</th>
                        <th>Link y Certificado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->category->name }}</td>
                            @if ($course->status == 3)
                            <td><span class="badge badge-pill badge-success">APROBADO</span>
                            </td>
                            @else
                            <td><span class="badge badge-pill badge-success">EN REVISION</span></td>
                            @endif
                            @if ($course->certificate->id ?? false)
                            <td><span class="badge badge-info">OK</span></td>
                            @else
                            <td><span class="badge badge-pill badge-danger">NO TIENE</span></td>
                            @endif
                            @if ($course->certificate->id ?? false)
                                
                            <td width="10px"><a class="btn btn-primary" href="{{ route('admin.certificates.edit', $course->certificate->id) }}">EDITAR
                            </a></td>
                            @else
                            <td width="10px">
                                
                                <a class="btn btn-success mr-4" wire:click="asigna({{ $course->id  }})">HABILITAR</a>                            
                            </td>
                            @endif
                            
                            
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                No hay ningun Course
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
                {{ $courses->links() }}
        </div>
    </div>
</div>
