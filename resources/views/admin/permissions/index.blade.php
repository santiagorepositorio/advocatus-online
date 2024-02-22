@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')
    <h1>Gestion de Roles y Permisos</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>Exito!</strong> {{ session('info') }}
    </div>
        
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('admin.permissions.create') }}">Crear Permiso</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td width="10px"><a class="btn btn-secondary" href="{{ route('admin.permissions.edit', $permission->id) }}">Edit</a></td>
                            <td width="10px">
                                <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST">                                 
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                    
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                No hay ningun Permiso Registrado
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
