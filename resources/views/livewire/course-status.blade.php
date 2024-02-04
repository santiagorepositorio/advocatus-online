<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                @isset($current->iframe)
                    {!! $current->iframe !!}
                @else
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/nnuhgPkN64o"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                @endisset
            </div>
            <h1 class="text-3xl text-gray-600 font-bold mt-4">{{ $current->name }}</h1>
            @if ($current->description)
                <div class="text-gray-600">
                    {{ $current->description->name }}
                </div>
            @endif
            <div class="flex justify-between mt-4">
                <div class="flex items-center cursor-pointer " wire:click="completed">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                        <p class="text-sm ml-2">unidad culminada</p>
                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                        <p class="text-sm ml-2">marcar esta unidad como culminada</p>
                    @endif
                </div>
                @if ($current->resource)
                    <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                        <i class="fas fa-download text-gray-600 mr-2 text-lg"></i>
                        <p class="text-sm ml-2">Descargar Recurso</p>
                    </div>
                @else
                @endif
            </div>
            {{-- <p>INDICE {{ $this->index }}</p>
            <p>PREVIOS @if ($this->previous)
                {{ $this->previous->id }}
                @endif
            </p>
            <p>NEXT @if ($this->next)
                {{ $this->next->id }}
                @endif
            </p> --}}
            <div class="card mt-2">
                <div class="card-body flex">
                    @if ($statusr != 1)
                        @if ($this->previous)
                            <a wire:click="changeLesson({{ $this->previous }})" class=" cursor-pointer ">Tema
                                Anterior</a>
                        @endif
                        @if ($this->next)
                            <a wire:click="changeLesson({{ $this->next }})" class="ml-auto cursor-pointer">Siguiente
                                Tema</a>
                        @endif
                    @endif

                </div>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded overflow-hidden ">
            <div class="px-6 py-4">

                <h1 class="text-2xl leading-8 text-center mb-4"><a href="{{ route('courses.show', $course) }}"
                        class=" cursor-pointer">{{ $course->title }}</h1>
                <div class="flex items-center mb-4">



                    <div class="flex justify-around items-center gap-3">
                        @if ($statusr == 1)
                            <div
                                class="pointer-events-auto relative inline-flex items-center rounded-md bg-blue-500 text-[0.8125rem] font-medium leading-5 text-white shadow-sm ring-1  hover:bg-slate-50 hover:text-slate-900 fill-white hover:fill-slate-900">
                                <div class="flex px-3 py-2">
                                    <svg class="mr-2.5 h-5 w-5 flex-none fill-slate-400">
                                        <path d="M5 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v14l-5-2.5L5 18V4Z"></path>
                                    </svg>
                                    Pre Inscrito
                                </div>
                            </div>
                            {{-- <a href="https://chat.whatsapp.com/HF0p7xDqVc64Fsy3jZpKUN"> --}}
                            @if ($course->certificate && $course->certificate->link)
                                <a href="{{ $course->certificate->link }}">
                            @else
                                <a href="">
                            @endif
                            <div
                                class="inline-flex items-center cursor-pointer pointer-events-auto relative rounded-md bg-green-500 text-[0.8125rem] font-medium leading-5 text-white shadow-sm ring-1  hover:bg-slate-50 hover:text-slate-900 fill-white hover:fill-slate-900">
                                <div class="flex px-3 py-2 gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.297-.296.446-.497.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                    </svg>
                                    Unirse al Grupo

                                </div>
                            </div>
                            </a>
                        @elseif($statusr == 2)
                            <div
                                class="pointer-events-auto relative inline-flex items-center rounded-md bg-yellow-500 text-[0.8125rem] font-medium leading-5 text-white shadow-sm ring-1  hover:bg-slate-50 hover:text-slate-900 fill-white hover:fill-slate-900">
                                <div class="flex px-3 py-2 gap-2">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 18 18">
                                        <path
                                            d="M3 7H1a1 1 0 0 0-1 1v8a2 2 0 0 0 4 0V8a1 1 0 0 0-1-1Zm12.954 0H12l1.558-4.5a1.778 1.778 0 0 0-3.331-1.06A24.859 24.859 0 0 1 6 6.8v9.586h.114C8.223 16.969 11.015 18 13.6 18c1.4 0 1.592-.526 1.88-1.317l2.354-7A2 2 0 0 0 15.954 7Z" />
                                    </svg>
                                    INSCRITO
                                </div>
                            </div>
                            @if ($course->certificate && $course->certificate->link)
                                <a href="{{ $course->certificate->link }}">
                            @else
                                <a href="">
                            @endif
                                <div
                                    class="inline-flex items-center cursor-pointer pointer-events-auto relative rounded-md bg-green-500 text-[0.8125rem] font-medium leading-5 text-white shadow-sm ring-1  hover:bg-slate-50 hover:text-slate-900 fill-white hover:fill-slate-900">
                                    <div class="flex px-3 py-2 gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.297-.296.446-.497.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                        </svg>
                                        Unirse al Grupo
                                    </div>
                                </div>
                            </a>
                        @elseif($statusr == 3)
                            <div
                                class="pointer-events-auto relative inline-flex items-center rounded-md bg-cyan-400 text-[0.8125rem] font-medium leading-5 text-white shadow-sm ring-1  hover:bg-slate-50 hover:text-slate-900 fill-white hover:fill-slate-900">
                                <div class="flex px-3 py-2 gap-2">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 18 18">
                                        <path
                                            d="M3 7H1a1 1 0 0 0-1 1v8a2 2 0 0 0 4 0V8a1 1 0 0 0-1-1Zm12.954 0H12l1.558-4.5a1.778 1.778 0 0 0-3.331-1.06A24.859 24.859 0 0 1 6 6.8v9.586h.114C8.223 16.969 11.015 18 13.6 18c1.4 0 1.592-.526 1.88-1.317l2.354-7A2 2 0 0 0 15.954 7Z" />
                                    </svg>
                                    Culminado
                                </div>
                            </div>
                            <a href="{{ route('certificate', $course) }}">
                                <div
                                    class="inline-flex items-center cursor-pointer pointer-events-auto relative rounded-md bg-slate-300 text-[0.8125rem] font-medium leading-5 text-blue-600 shadow-sm ring-1  hover:bg-slate-50 hover:text-slate-900 fill-white hover:fill-slate-900">
                                    <div class="flex px-3 py-2 gap-2">
                                        <svg class="w-5 h-5" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M2 12.1333C2 8.58633 2 6.81283 2.69029 5.45806C3.29749 4.26637 4.26637 3.29749 5.45806 2.69029C6.81283 2 8.58633 2 12.1333 2H19.8667C23.4137 2 25.1872 2 26.5419 2.69029C27.7336 3.29749 28.7025 4.26637 29.3097 5.45806C30 6.81283 30 8.58633 30 12.1333V19.8667C30 23.4137 30 25.1872 29.3097 26.5419C28.7025 27.7336 27.7336 28.7025 26.5419 29.3097C25.1872 30 23.4137 30 19.8667 30H12.1333C8.58633 30 6.81283 30 5.45806 29.3097C4.26637 28.7025 3.29749 27.7336 2.69029 26.5419C2 25.1872 2 23.4137 2 19.8667V12.1333Z"
                                                    fill="#B30B00"></path>
                                                <path
                                                    d="M24.0401 17.8976C22.7327 16.464 19.1701 17.0912 18.3094 17.1808C17.0891 15.9264 16.2284 14.504 15.8798 13.9664C16.3156 12.6224 16.6642 11.1104 16.6642 9.6768C16.6642 8.3328 16.1413 7 14.7576 7C14.2347 7 13.7989 7.2688 13.5374 7.7168C12.9273 8.792 13.1887 10.9312 14.1475 13.16C13.6245 14.7728 12.753 17.1808 11.7179 19.0512C10.3234 19.5888 7.28369 21.0112 7.02221 22.624C6.93505 23.072 7.10937 23.6096 7.45801 23.8784C7.80665 24.2368 8.24244 24.3264 8.67824 24.3264C10.4977 24.3264 12.328 21.7392 13.6354 19.4096C14.6814 19.0512 16.3265 18.5136 17.9825 18.2448C19.8891 20.0368 21.6323 20.2944 22.5039 20.2944C23.7242 20.2944 24.16 19.7568 24.3234 19.3088C24.5522 18.8832 24.3887 18.256 24.0401 17.8976ZM22.8199 18.7936C22.7327 19.152 22.2969 19.5104 21.5125 19.3312C20.5537 19.0624 19.693 18.6144 18.9958 17.9872C19.6059 17.8976 21.0767 17.7184 22.1226 17.8976C22.4712 17.9872 22.907 18.256 22.8199 18.7936ZM14.3872 8.0752C14.4744 7.896 14.6487 7.8064 14.823 7.8064C15.2588 7.8064 15.3459 8.344 15.3459 8.792C15.2588 9.8672 15.0845 11.0208 14.7358 12.0064C14.0386 10.0464 14.1257 8.6128 14.3872 8.0752ZM14.3 18.1664C14.7358 17.36 15.2588 15.848 15.4331 15.3104C15.8689 16.1168 16.6533 17.0128 17.002 17.4496C17.0891 17.3712 15.5203 17.7184 14.3 18.1664ZM11.3475 20.2272C10.1382 22.1872 9.00509 23.4416 8.30781 23.4416C8.22065 23.4416 8.04634 23.4416 7.95918 23.352C7.87202 23.1728 7.78486 22.9936 7.87202 22.8144C7.95918 22.0976 9.35373 21.112 11.3475 20.2272Z"
                                                    fill="white"></path>
                                            </g>
                                        </svg>
                                        Certificado

                                    </div>
                                </div>
                            </a>
                        @endif
                        {{-- <div class="visible-print text-center">
                            {!! QrCode::size(100)->generate(Request::url()); !!}
                            <p>Escanéame para volver a la página principal.</p>
                        </div> --}}

                    </div>
                </div>
                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4"
                            src="{{ $course->teacher->profile_photo_url }}" alt="">
                    </figure>
                    <div>
                        <p>{{ $course->teacher->name }}</p>
                        <a class="text-blue-500 text-sm"
                            href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                    </div>
                </div>
                <p class="text-gray-600 text-sm mt-2">{{ $this->advance . '%' }} Completado</p>
                <div class=" relative pt-1">
                    <div class="overflw-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        <div style="width: {{ $this->advance . '%' }}"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500">
                        </div>
                    </div>
                </div>
                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base inline-block mb-2" class="font-bold"
                                href="">{{ $section->name }}</a>
                            <ul>
                                @if ($statusr != 1)
                                    @foreach ($section->lessons as $lesson)
                                        <li class="flex">
                                            <div>
                                                @if ($lesson->completed)
                                                    @if ($current->id == $lesson->id)
                                                        <span
                                                            class=" inline-block w-4 h-4 border-4 border-blue-500  mt-1 rounded-full mr-2"></span>
                                                    @else
                                                        <span
                                                            class=" inline-block w-4 h-4 bg-blue-500  mt-1 rounded-full mr-2"></span>
                                                    @endif
                                                @else
                                                    @if ($current->id == $lesson->id)
                                                        <span
                                                            class=" inline-block w-4 h-4 border-4 border-gray-500  mt-1 rounded-full mr-2"></span>
                                                    @else
                                                        <span
                                                            class=" inline-block w-4 h-4 bg-gray-500 mt-1 rounded-full mr-2"></span>
                                                    @endif
                                                @endif

                                            </div>
                                            <a class="cursor-pointer"
                                                wire:click="changeLesson({{ $lesson }})">{{ $lesson->name }}

                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </div>
</div>
