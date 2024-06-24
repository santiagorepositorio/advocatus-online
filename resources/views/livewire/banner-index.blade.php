<section>
    @push('cs')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap');

            .main-banner7 {
                background: radial-gradient(79.43% 251.58% at 23.18% 73.07%, #0142a0 0, #0f133a 44.41%, #101034 56.43%, #141034 69.58%, #210262 100%, #1c1958 0);
                color: #fff;
                padding: 2rem 1rem 0;
            }

            @media screen and (min-width: 1024px) {
                .grid7-container7 {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    max-width: 1200px;
                    margin: auto;
                }
            }

            .title {
                font-family: Orbitron, sans-serif;
                font-size: 1.5rem;
            }
            .titlep {
                font-family: Orbitron, sans-serif;
                font-size: 1rem;
            }

            .description {
                font-size: 0.8rem;
                color: #fff;
            }

            .line-2 {
                color: #3dacfc;
            }

            .line-1 {
                color: #ffd932;
            }

            @media screen and (min-width: 1024px) {
                .title {
                    font-size: 2.5rem;
                }

                .description {
                    font-size: 1rem;
                }
            }

            .countdown7 {
                justify-content: center;
                align-items: center;
                font-size: 0.8rem;
                margin-bottom: 2rem;
            }

            @media screen and (min-width: 1024px) {
                .countdown7 {
                    justify-content: flex-start;
                }
            }

            .countdown7-item {
                padding: 0 .75rem;
                align-items: center;
                position: relative;
            }

            .countdown7-item:not(:last-of-type):before {
                position: absolute;
                right: 0;
                content: "";
                display: block;
                width: 1px;
                height: 60%;
                background: #fff;
                opacity: .5;
            }

            .countdown7-number {
                font-size: 1.75em;
                font-weight: bold;
                margin-right: .25rem;
                color: #ffffff;
            }

            .countdown7-number1 {
                font-size: 1em;
                font-weight: bold;
                margin-right: .25rem;
                color: #5fbcff;
            }

            .countdown7-letter {
                opacity: .5;
                color: #fff700;
            }

            .graphic {
                position: relative;
                display: grid;
                padding-top: 3rem;
                grid-template-columns: 1fr 75%;
            }

            .graphic-man {
                width: 100%;
                grid-column-start: 2;
            }

            .graphic-go {
                position: absolute;
                width: 27%;
                mix-blend-mode: screen;
                top: 34%;
                right: 0%;
                transform: rotate(10deg);
            }

            .graphic-circles {
                height: 100%;
                aspect-ratio: 1 / 1;
            }

            .graphic-circles img {
                width: 100%;
                height: 100%;
                mix-blend-mode: screen;
            }

            .graphic-energy {
                animation: turn1 10s linear infinite;
            }

            .graphic-circle-2 {
                animation: turn1 26s linear infinite;
            }

            .graphic-circle-1 {
                animation: turn2 20s linear infinite;
            }

            .whatsapp-container {
                display: flex;
                align-items: center;
                /* Alinea verticalmente los elementos */
            }

            .whatsapp-link {
                display: inline-block;
                padding: 10px 20px;
                background-color: #04b344;
                /* Color verde de WhatsApp */
                color: #fff;
                /* Texto blanco */
                text-decoration: none;
                /* Sin subrayado */
                border-radius: 5px;
                /* Bordes redondeados */
                height: 40px;
                /* Altura del botón */
                line-height: 20px;
                /* Alineación vertical del texto */
            }

            .whatsapp-link:hover {
                background-color: #128C7E;
                /* Cambia el color de fondo al pasar el mouse */
            }

            .whatsapp-link i {
                font-size: 20px;
                /* Tamaño del icono de WhatsApp */
                margin-right: 5px;
                /* Espacio entre el icono y el texto */
            }


            @keyframes turn1 {
                to {
                    transform: rotate(1turn);

                }

            }

            @keyframes turn2 {
                to {
                    transform: rotate(-1turn);

                }

            }
        </style>
        {{-- <script src="{{ asset('assets/js/custonsTimer.js') }}"></script> --}}
        <script src="{{ asset('assets/js/typed.min.js') }}"></script>
        <script type="text/javascript">
            var typed = new Typed('.type', {
                strings: [
                    'Talleres | LegalTech',
                    'Curso de | Robotica',
                    'Material | Memoriales',
                    'Libros | Jurídicos',
                    'Curso de | Laravel'
                ],
                loop: true,
                typeSpeed: 80,
                backSpeed: 80,

            });
        </script>
        <script>
             const days = document.getElementById("days");
    const hours = document.getElementById("hours");
    const mins = document.getElementById("mins");
    const seconds = document.getElementById("seconds");
    const foundationDate = '1 January 2024'; // Cambia esta fecha a la de fundación deseada

    function countTimer() {
        const foundationDateTime = new Date(foundationDate);
        const currentDate = new Date();
        const totalSeconds = (currentDate - foundationDateTime) / 1000;

        const daysCalc = Math.floor(totalSeconds / 3600 / 24);
        const hoursCalc = Math.floor((totalSeconds / 3600) % 24);
        const minsCalc = Math.floor((totalSeconds / 60) % 60);
        const secondsCalc = Math.floor(totalSeconds % 60);

        days.innerHTML = daysCalc;
        hours.innerHTML = hoursCalc;
        mins.innerHTML = minsCalc;
        seconds.innerHTML = secondsCalc;
    }

    countTimer();
    setInterval(countTimer, 1000);
        </script>
        {{-- <script>
            const days = document.getElementById("days");
            const hours = document.getElementById("hours");
            const mins = document.getElementById("mins");
            const seconds = document.getElementById("seconds");
            const newYear = '1 june 2024';

            function countTimer() {
                const newYearDate = new Date(newYear);
                const currentDate = new Date();
                const totalSeconds = (newYearDate - currentDate) / 1000;

                const daysCalc = Math.floor(totalSeconds / 3600 / 24);
                const hoursCalc = Math.floor(totalSeconds / 3600) % 24;
                const minsCalc = Math.floor(totalSeconds / 60) % 60;
                const secondsCalc = Math.floor(totalSeconds % 60);
                days.innerHTML = daysCalc;
                hours.innerHTML = hoursCalc;
                mins.innerHTML = minsCalc;
                seconds.innerHTML = secondsCalc;
            }

            countTimer();

            setInterval(countTimer, 1000);
        </script> --}}
    @endpush
    <section class="main-banner7">
        <div class="grid7-container7">
            <div class="content">
                <h1 class="title text-center">
                    <span class="line-1">Marketplace Jur&iacute;dico</span>
                    <br>
                    <span class="line-2 type"></span>
                </h1>
                <!-- DESCRIPCION-->
                <h2 class=" flex">Bienvenidos a la Nueva Plataforma enfocado en un Market Place Jur&iacute;co
                    donde podrás revisar los contenidos de los diferentes Cursos de Actualización.
                    Publica tus Art&iacute;culos Profesionales!</h2>

                    <br>
                {{-- <p><span class="countdown7-number1">Participa de la Capacitación en la Api WhatsApp con Laravel en la Modalidad Virtual</span></p> --}}
                <div class="countdown7 ">

                    <p><span class="countdown7-number1">Tiempo trabajando:</span></p>
                    <div class="flex">
                        <p class="countdown7-item flex">
                            <span class="countdown7-number" id="days">--</span>
                            <span class="countdown7-letter">D</span>
                        </p>
                        <p class="countdown7-item flex">
                            <span class="countdown7-number" id="hours">--</span>
                            <span class="countdown7-letter">H</span>
                        </p>

                        <p class="countdown7-item flex">
                            <span class="countdown7-number" id="mins">--</span>
                            <span class="countdown7-letter">M</span>
                        </p>

                        <p class="countdown7-item flex">
                            <span class="countdown7-number" id="seconds">--</span>
                            <span class="countdown7-letter">S</span>
                        </p>



                    </div>
                </div>

                <div class="whatsapp-container">
                    <h2 class="titlep text-center mr-4">Únete</h2>
                    <a href="https://chat.whatsapp.com/EGFfdX95LSWGKrsYpXBM3o" class="whatsapp-link">
                        <i class="fab fa-whatsapp fa-lg"></i>Comunidad a nivel Nacional
                    </a>
                </div>

            </div>
            <div class="graphic">
                <img class="graphic-man" src="{{ asset('assets/imgs/imgbanner/man.png') }}" alt="">
                <img class="graphic-go absolute" src="{{ asset('assets/imgs/imgbanner/go.png') }}" alt="">
                <div class="graphic-circles absolute">
                    <img class="graphic-logo absolute" src="{{ asset('assets/imgs/imgbanner/logo.png') }}"
                        alt="">
                    <img class="graphic-circle-1 absolute"
                        src="{{ asset('assets/imgs/imgbanner/circulo-internal.png') }}" alt="">
                    <img class="graphic-circle-2 absolute"
                        src="{{ asset('assets/imgs/imgbanner/circulo-external.png') }}" alt="">
                    <img class="graphic-energy absolute" src="{{ asset('assets/imgs/imgbanner/energia.png') }}"
                        alt="">
                </div>
            </div>
        </div>
    </section>

</section>
