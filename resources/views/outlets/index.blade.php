@extends('layouts.outlet')

@section('title', __('outlet.list'))

@section('content')
    <div class="mb-8 flex justify-between items-center">
        {{-- <div class="float-right"> --}}
        <div>
            {{-- @can('user', new App\Outlet()) --}}
            @can('user', App\Models\Outlet::class)
                <a href="{{ route('outlets.create') }}" class="btn btn-primary">Registrar Otro Nuevo</a>
            @endcan
        </div>
        <h1 class="text-2xl">Centros Registrados {{ __('app.total') }} : {{ $outlets->total() }}</h1>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="p-4 bg-white border-b border-gray-200">
                        <form method="GET" action="" accept-charset="UTF-8" class="flex items-center">

                            <input placeholder="Escribar el Nombre a buscar" name="q" type="text" id="q"
                                class="form-input mx-2" value="{{ request('q') }}">
                            <input type="submit" value="Buscar" class="btn btn-secondary">
                            <a href="{{ route('outlets.index') }}" class="btn btn-red">Resetear</a>
                        </form>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                    {{ __('app.table_no') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Dirección
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">LATITUDE
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">LONGITUDE
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                    ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($outlets as $key => $outlet)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                        {{ $outlets->firstItem() + $key }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{!! $outlet->name_link !!}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $outlet->address }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $outlet->latitude }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $outlet->longitude }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                        <a class="btn btn-primary" href="{{ route('outlets.show', $outlet) }}"
                                            id="show-outlet-{{ $outlet->id }}">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-4">{{ $outlets->appends(Request::except('page'))->render() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
