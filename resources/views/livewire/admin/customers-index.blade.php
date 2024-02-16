<div>
    @if (session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>Exito!</strong> {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center flex-grow-1">
                <input wire:keydowm="limpiar_page" wire:model="search" class="form-control mr-2" placeholder="Escribe un Nombre...">
                <div class="form-group mb-0 flex-grow-1">
                    <select wire:model="status" class="form-control" id="status">
                        <option value="" wire:click="limpiar_page">Todos</option>
                        <option value="1">Nuevo</option>
                        <option value="2">Regular</option>
                        <option value="3">Inactivo</option>
                        <option value="5">Ex Empleado</option>
                    </select>
                </div>
            </div>
            @if ($status != 0)
            <a href="{{ route('admin.customers.status', $status) }}" class="btn btn-outline-danger btn-lg ml-2 align-items-center">
                <i class="far fa-file-pdf mr-1"></i> Listado
            </a>
            @endif
        </div>
        

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Celular</th>
                            <th>Estatus</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ substr($user->phone, 3) }}</td>
                                <td>
                                    @if ($user->status == 1)
                                        <span class="badge badge-success">Nuevo</span>
                                    @elseif ($user->status == 2)
                                        <span class="badge badge-primary">Regular</span>
                                    @elseif ($user->status == 3)
                                        <span class="badge badge-danger">Inactivo</span>
                                    @elseif ($user->status == 5)
                                        <span class="badge badge-warning">Ex Empleado</span>
                                    @endif
                                </td>
                                <td width="10px"><a class="btn btn-primary"
                                        href="{{ route('admin.customer.customers_edit', $user) }}">Edit</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    No hay ningún usuario registrado
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
