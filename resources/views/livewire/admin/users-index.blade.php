<div>
    @if (session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>Exito!</strong> {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header input-group mb-3">
            <input type="text" wire:keydowm="limpiar_page" wire:model="search" class="form-control w-80"
                placeholder="Escribe un Nombre..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <a class="btn btn-primary" href="{{ route('admin.users.usersfull') }}"><i
                        class="fas fa-user-plus mr-2"></i>Agregar Empleado</a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->roles->isNotEmpty())
                                    <h5><span class="badge badge-success">{{ $user->roles->first()->name }}</span></h5>
                                    @else
                                    <h5><span class="badge badge-warning">Sin Rol</span></h5>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @if ($user->id != 1 || $user->hasRole('admin'))
                                            <a class="btn btn-danger mr-2"
                                                href="{{ route('admin.users.eliminar_empleado', $user) }}">Eliminar</a>
                                            <a class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                        @else
                                        <h3><span class="badge badge-info">SUPER ADMINISTRADOR</span></h3>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    No hay ningún usuario registrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
</div>
