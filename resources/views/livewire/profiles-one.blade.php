<div class="">
    <h1 class="text-center text-3xl text-gray-600 mt-4">Profesionales Destacados</h1>
    <p class="text-center text-gray-500 text-sm mt-2 "></p>
    <section class="swiper">
        <div class=" swiper-wrapper">
            @foreach ($courses as $course)
                <article class="mt-4 mb-10 swiper-slide">
                    <div>
                        @isset($course->image)
                            <img src="{{ asset('assets/imgs/shop/product-16-3.jpg') }}" alt=" random imgee"
                                class=" w-48 object-cover object-center rounded-lg shadow-lg">
                        @else
                            <img class="h-36 w-full object-cover rounded-md" src="{{ Storage::url($course->image->url) }}"
                                alt="">
                        @endisset
                        <div class="relative p-2 -mt-12 md:w-36 lg:w-48 xl:w-48">
                            <div class="bg-white p-4 rounded-lg shadow-lg">
                                <h4
                                    class="sm:text-sm lg:text-lg text-blue-900 font-semibold uppercase leading-tight truncate justify-center">
                                    Reinor &
                                    Asociados</h4>
                                <div class="text-gray-600 text-xs font-semibold">
                                    Abogado - Estudio Juridico
                                </div>
                                <div class="mt-1 flex justify-center">
                                    <ul class="flex text-xs mr-1">
                                        <li><i
                                                class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400 "></i>
                                        </li>
                                        <li><i
                                                class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li><i
                                                class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li><i
                                                class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li><i
                                                class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>

                                    </ul>
                                    <span
                                        class=" md:text-xs bg-yellow-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ">{{ $course->rating }}</span>
                                </div>
                                <div class="flex justify-between relative">
                                    <div
                                        class=" absolute bg-blue-500 hover:bg-blue-700 shadow-lg  shadow-blue-600 text-white cursor-pointer px-2 text-center py-1 rounded-lg h-8 w-8 hover:h-12 hover:w-12 flex items-center duration-300">
                                        <h4 class="text-sm hover:text-base">Ver</h4>
                                    </div>

                                    <a href="#"><img
                                            class="absolute right-0 h-8 w-8 hover:h-12 hover:w-12 flex items-center duration-300"
                                            src="{{ asset('assets/imgs/theme/icons/icon-whatsapp.svg') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </article>
            @endforeach
        </div>

        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </section>

    {{-- <section class="">
    <h1 class="text-center text-3xl text-gray-600 mt-4">Profesionales Carrusel</h1>
        <p class="text-center text-gray-500 text-sm mt-2 "></p>
    <div class="container mb-6 mySwiper">
        
        <div class="container mx-auto grid sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-6 gap-y-8 rounded-xl">
            @foreach ($courses as $course)
                <x-profile-card :course="$course" />
            @endforeach
        </div>

    </div>
</section> --}}
    @push('swipe')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <style>
            .swiper-slide:not(.swiper-slide-active) {
                filter: blur(1px);
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
                // Optional parameters

                direction: 'horizontal',
                loop: true,
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 6,

                coverflowEffect: {
                    rotate: 0,
                    stretch: 500,
                    depth: 200,
                    modifier: 1,
                    slideShadows: false,
                },

                speed: 400,
                spaceBetween: -50,
                autoplay: {
                    delay: 3000,
                },
           
                //   loop: true,

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // And if we need scrollbar
                scrollbar: {
                    el: '.swiper-scrollbar',
                },
            });
        </script>
    @endpush
</div>
