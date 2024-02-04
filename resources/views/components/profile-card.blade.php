@props(['profile'])

<article class="mt-4 swiper-slide">
    <div>
        <img src="{{ asset('assets/imgs/shop/product-16-3.jpg') }}" alt=" random imgee"
                class="w-full object-cover object-center rounded-lg shadow-lg">
        {{-- @isset($profile->image)
            <img src="{{ asset('assets/imgs/shop/product-16-3.jpg') }}" alt=" random imgee"
                class="w-full object-cover object-center rounded-lg shadow-lg">
        @else
            <img class="h-36 w-full object-cover rounded-md" src="{{ Storage::url($profile->image->url) }}" alt="">
        @endisset --}}
        <div class="relative p-2 -mt-12 ">
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <h4 class="sm:text-sm lg:text-lg text-blue-900 font-semibold uppercase leading-tight truncate justify-center">{{ $profile->name }}</h4>
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
                </div>
                <div class="flex justify-between relative">
                    <div
                        class=" absolute bg-blue-500 hover:bg-blue-700 shadow-lg  shadow-blue-600 text-white cursor-pointer px-2 text-center py-1 rounded-lg h-8 w-8 hover:h-12 hover:w-12 flex items-center duration-300">
                        <h4 class="text-sm hover:text-base">
                            <a href="{{ route('profiles.show', $profile) }}">
                                Ver
                            </a>                            
                        </h4>
                    </div>

                    <a href="#"><img
                            class="absolute right-0 h-8 w-8 hover:h-12 hover:w-12 flex items-center duration-300"
                            src="{{ asset('assets/imgs/theme/icons/icon-whatsapp.svg') }}"></a>
                </div>
            </div>
        </div>

    </div>

</article>
