<div>
    <div class="mt-8 hidden sm:block">
        <h1 class="text-center text-3xl text-gray-600 mt-4">Profesionales Destacados</h1>
        <p class="text-center text-gray-500 text-sm mt-2 "></p>
        <section class="swiper">
            <div class="swiper-wrapper">
                @foreach ($profiles as $profile)
                    <div class="swiper-slide">
                        <article class="mt-4 mb-10">
                            <div>
                                @isset($profile->image)
                                    <img class="h-full w-full object-cover rounded-md"
                                        src="{{ Storage::url($profile->image->url) }}" alt="">
                                @else
                                    <img src="{{ asset('assets/imgs/shop/product-16-3.jpg') }}" alt="random image"
                                        class="w-48 object-cover object-center rounded-lg shadow-lg">
                                @endisset
                                <div class="relative p-2 -mt-12 w-full">
                                    <div class="bg-white p-4 rounded-lg shadow-lg">
                                        <h4
                                            class="sm:text-sm lg:text-lg text-blue-900 font-semibold uppercase leading-tight truncate justify-center">
                                            {{ $profile->name }}</h4>
                                        <div class="text-gray-600 text-xs font-semibold">
                                            {{ $profile->category->name }}
                                        </div>
                                        <div class="flex justify-between relative">
                                            <a href="{{ route('profiles.show', $profile) }}"><div
                                                class="absolute bg-blue-500 shadow-lg  shadow-blue-600 text-white cursor-pointer px-2 text-center py-2 rounded-lg h-8 w-10 flex items-center duration-300">
                                                <h4 class="text-sm text-center">Ver</h4>
                                            </div></a>
                                            <a href="https://api.whatsapp.com/send?phone=591{{ $profile->phone }}"><img
                                                    class="absolute right-0 h-8 w-8 hover:h-12 hover:w-12 flex items-center duration-300"
                                                    src="{{ asset('assets/imgs/theme/icons/icon-whatsapp.svg') }}"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </section>
    </div>

    @push('swipe')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

        <style>

        </style>
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        {{-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}
        <script>
            var swiper = new Swiper('.swiper', {
                loop: true, // Establece loop en true para el bucle infinito
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 6,
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 200,
                    modifier: 1,
                    slideShadows: false,
                },
                speed: 400,

                autoplay: {
                    delay: 2500,
                    disableOnInteraction: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

            });
        </script>
    @endpush

</div>
