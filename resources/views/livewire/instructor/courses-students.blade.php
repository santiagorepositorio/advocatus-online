<div>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>
    <h1 class="text-2xl font-bold mb-4">ESTUDIANTES DEL CURSO</h1>
    <hr class="mt-2 mb-6">
    <x-table-responsive>
        <div class="px-6 py-4 flex">
            <input wire:model="search" type="text" class="form-input flex-1 w-full rounded-lg shadow-sm"
                placeholder="Ingrese Nombre o Celular del Cliente">

            <a class="btn btn-primary ml-2" href="{{ route('admin.contact.index', $id_course) }}">Lista

            </a>


        </div>
        @if ($studentLista->count())
            <table class="min-w-full divide-y divide-y-200">
                <thead class="bg-gray-50 text-left">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nombre</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Contacto</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Estado</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Acciones</th>

                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-left">
                    @foreach ($studentLista as $student)
                        <tr class="hover:bg-gray-50">
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                <div class="text-sm ">
                                    <div class="font-medium text-gray-700">{{ $student->name }}</div>
                                    <div class="text-gray-400">Alumno</div>
                                </div>
                            </th>

                            <td class="px-6 py-4">
                                <div class="text-sm">
                                    <div class="flex">

                                        <p class="text-sm text-gray-500 mr-auto">
                                            <i class="fab fa-whatsapp mr-2"></i>
                                            {{ $student->phone }}
                                        </p>
                                    </div>
                                    <div class="text-gray-400">
                                        <i class="fas fa-at mr-2"></i>
                                        {{ $student->email }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @switch($student->statusr)
                                    @case(1)
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                            PreInscrito
                                        </span>
                                    @break

                                    @case(2)
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>
                                            Inscrito
                                        </span>
                                    @break

                                    @case(3)
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                            Certificado
                                        </span>
                                    @break

                                    @default
                                @endswitch

                            </td>


                            <td class="px-6 py-4 text-left">
                                @switch($student->statusr)
                                    @case(1)
                                        <div class="flex gap-4">

                                            <i class="fas fa-user-shield text-blue-700 cursor-pointer"
                                                wire:click="inscribir({{ $student->id }})"> Inscribir</i>
                                            <i class="fas fa-user-slash text-red-700 cursor-pointer"
                                                wire:click="revertir({{ $student->id }})"> Revertir</i>
                                        </div>
                                    @break

                                    @case(2)
                                        <div class="flex gap-4">
                                            <i class="fas fa-user-graduate text-green-700 cursor-pointer"
                                                wire:click="certificar({{ $student->id }})"> Certificar</i>

                                            <i class="fas fa-user-slash text-red-700 cursor-pointer"
                                                wire:click="revertir({{ $student->id }})"> Revertir</i>
                                        </div>
                                    @break

                                    @case(3)
                                        <div class="flex gap-4">
                                            <i class="fas fa-user-slash text-red-700 cursor-pointer"
                                                wire:click="revertir({{ $student->id }})"> Revertir</i>

                                        </div>
                                    @break

                                    @default
                                @endswitch

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                No hay coincidencia en la busqueda
            </div>
        @endif
        <div class="px-6 py-4">
            {{ $studentLista->links() }}
        </div>
    </x-table-responsive>
</div>
