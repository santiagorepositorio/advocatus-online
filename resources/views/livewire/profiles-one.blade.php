<div>
    <div class="mt-4">
        <h1 class="text-center text-3xl text-gray-600">Profesionales Destacados</h1>
        <p class="text-center text-gray-500 text-sm mt-2 "></p>  
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($profiles as $profile)
                    <div class="swiper-slide">
                        <x-profile-card :profile="$profile" />
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- If we need scrollbar -->
        </div>
    </div>

    @push('swipe')
        <script>
            // var swiper = new Swiper('.mySwiper', {                
            //     loop: true, // Establece loop en true para el bucle infinito
            //     effect: "coverflow",
            //     grabCursor: true,
            //     centeredSlides: true,
            //     slidesPerView: "auto",                
            //     coverflowEffect: {
            //         rotate: 0,
            //         stretch: 0,
            //         depth: 200,
            //         modifier: 1,
            //         slideShadows: false,
            //     },
            //     speed: 400,

            //     autoplay: {
            //         delay: 2500,
            //         disableOnInteraction: true,
            //     },
            //     pagination: {
            //         el: '.swiper-pagination',
            //         clickable: true,
            //     },
            //     navigation: {
            //         nextEl: '.swiper-button-next',
            //         prevEl: '.swiper-button-prev',
            //     },


            // });
            /*=============== SWIPER JS ===============*/
            var swiper = new Swiper(".mySwiper", {
                loop: true,
                centeredSlides: false,                
                grabCursor: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true,
                },

                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: true,
                },

                breakpoints: {
                    600: {
                        slidesPerView: 2,
                    },
                    968: {
                        slidesPerView: 3,
                    },
                },
            });
        </script>
        {{-- <script>
            var swiper = new Swiper(".mySwiper", {
              effect: "coverflow",
              grabCursor: true,
              centeredSlides: true,
              slidesPerView: "auto",
              coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 50,
                modifier: 1,
                slideShadows: true,
              },
              pagination: {
                el: ".swiper-pagination",
              },
              autoplay: {
        delay: 2500, // Tiempo en milisegundos entre cada cambio de diapositiva
        disableOnInteraction: false, // Desactivar autoplay cuando el usuario interactúa con el carrusel
    },
            });
          </script> --}}
    @endpush

</div>
