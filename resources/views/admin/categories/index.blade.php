@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')
    <h1>Gestion de Categorias</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>Exito!</strong> {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">Crear Categoria</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Slug</th>
                        <th>Estatus</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->status }}</td>
                            <td width="10px"><a class="btn btn-secondary"
                                    href="{{ route('admin.categories.edit', $category) }}">Edit</a></td>
                            <td width="10px">
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Eliminar</button>

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                No hay ningun Rol Registrado
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



