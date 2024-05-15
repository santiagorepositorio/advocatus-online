@props(['profile'])

<article class="mt-4">

    <div
        class="max-w-2xl mx-4 sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto mt-4 bg-white shadow-xl rounded-lg text-gray-900">
        <div class="flex rounded-t-lg h-32 w-full overflow-hidden">
            @isset($profile->image)
                <img class="h-32 w-full object-cover object-center rounded-md" src="{{ Storage::url($profile->image->url) }}"
                    alt="">
            @else
                <img src="{{ asset('assets/imgs/shop/product-16-3.jpg') }}" alt=" random imgee"
                    class="w-full object-cover object-center rounded-lg shadow-lg">
            @endisset

        </div>
        <img class="relative h-12 w-12 -mt-8 object-center object-cover rounded-full shadow-lg mx-auto"
            src="{{ $profile->user->profile_photo_url }}" alt="{{ $profile->name }}">


        <div class="flex flex-col items-center justify-center"> <!-- Contenedor principal -->

            <div class="flex items-center "> <!-- Primera fila -->
                <h1 class="font-bold text-gray-500 text-lg">
                    {{ $profile->name }}
                </h1>
            </div>
            <div class="flex items-center"> <!-- Segunda fila -->
                <button class="text-blue-400 text-lg font-bold" href="">
                    {{ $profile->category->name }}
                </button>
            </div>
            <div class="mt-1 flex justify-center">
                <ul class="flex text-xs mr-1">
                    <li><i class="fas fa-star text-{{ $profile->rating >= 1 ? 'yellow' : 'gray' }}-400 "></i>
                    </li>
                    <li><i class="fas fa-star text-{{ $profile->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                    </li>
                    <li><i class="fas fa-star text-{{ $profile->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                    </li>
                    <li><i class="fas fa-star text-{{ $profile->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                    </li>
                    <li><i class="fas fa-star text-{{ $profile->rating >= 5 ? 'yellow' : 'gray' }}-400"></i>
                    </li>
                </ul>
                <span  class=" md:text-xs bg-yellow-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ">{{ $profile->rating }}</span>
            </div>
        </div>

        <div class="p-1 border-t mx-2 mt-1">
            <div class="flex justify-between relative -mt-8">
                <a href="{{ route('profiles.show', $profile) }}">
                    <div
                        class=" absolute bg-blue-500 hover:bg-blue-700 shadow-lg  shadow-blue-600 text-white cursor-pointer px-2 text-center py-1 rounded-lg h-8 w-12 flex items-center duration-300">
                        <h4 class="text-sm hover:text-base text-center">Ver </h4>
                    </div>
                </a>

                <a href="https://wa.me/{{ $profile->phone }}"><img
                        class="absolute right-0 h-8 w-8 hover:h-10 hover:w-10 flex items-center duration-300"
                        src="{{ asset('assets/imgs/theme/icons/icon-whatsapp.svg') }}"></a>

            </div>
        </div>
    </div>
    {{-- <div>
        @isset($profile->image)
            <img class="h-full w-full object-cover rounded-md" src="{{ Storage::url($profile->image->url) }}"
                alt="">
        @else
            <img src="{{ asset('assets/imgs/shop/product-16-3.jpg') }}" alt=" random imgee"
                class="w-full object-cover object-center rounded-lg shadow-lg">
        @endisset
        <div class="relative p-2 -mt-4">
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <h4 class="sm:text-sm lg:text-lg text-blue-900 font-semibold leading-tight truncate justify-center">
                    {{ $profile->name }}</h4>
                <div class="text-gray-600 text-xs font-semibold">
                    {{ $profile->category->name }}
                </div>
                <div class="mt-1 flex justify-center">
                    {{-- <ul class="flex text-xs mr-1">
                        <li ><i
                                class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400 "></i>
                        </li>
                        <li ><i
                                class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li ><i
                                class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li ><i
                                class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li ><i
                                class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow' : 'gray' }}-400"></i>
                        </li>

                    </ul> --}}
    {{-- <span
                        class=" md:text-xs bg-yellow-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ">{{ $course->rating }}</span> --}}
    {{-- </div>
                <div class="flex justify-between relative">
                    <a href="{{ route('profiles.show', $profile) }}">
                        <div
                            class=" absolute bg-blue-500 hover:bg-blue-700 shadow-lg  shadow-blue-600 text-white cursor-pointer px-2 text-center py-1 rounded-lg h-8 w-12 flex items-center duration-300">
                            <h4 class="text-sm hover:text-base">

                                Ver

                            </h4>
                        </div>
                    </a>

                    <a href="https://wa.me/{{ $profile->phone }}"><img
                            class="absolute right-0 h-8 w-8 hover:h-12 hover:w-12 flex items-center duration-300"
                            src="{{ asset('assets/imgs/theme/icons/icon-whatsapp.svg') }}"></a>
                </div>
            </div>
        </div>

    </div> --}}

</article>
