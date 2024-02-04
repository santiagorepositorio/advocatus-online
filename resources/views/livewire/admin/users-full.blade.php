<div>
    @if (session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>Exito!</strong> {{ session('info') }}
    </div>
        
    @endif
    <div class="card">
        <div class="card-header input-group mb-3">
            <input type="text" wire:keydowm="limpiar_page" wire:model="search" class="form-control w-80" placeholder="Escribe un Nombre..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
              <a class="btn btn-danger" href="{{ route('admin.users.index') }}" >Cancelar</a>
            </div>
          </div>
        
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td width="10px"><a class="btn btn-success" href="{{ route('admin.users.agregar_empleado', $user) }}">Agregar</a></td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                No hay ningun User Registrado
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
                {{ $users->links() }}
        </div>
    </div>
</div>
