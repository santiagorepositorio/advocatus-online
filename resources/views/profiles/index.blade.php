<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/home/4884273.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-fold text-4xl">CURSOS DE SOBOTRED SYSTEMS PARA ESTUDIANTES</h1>
            <p class="text-white text-lg mt-2">Nuevos disenos de paginas web</p>
          
            @livewire('search')
            </div>
            
        </div>
    </section>
    @livewire('profiles-index')
</x-app-layout>