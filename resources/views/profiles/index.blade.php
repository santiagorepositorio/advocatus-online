<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/home/4884273.jpg') }})">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-4  py-4">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-fold text-4xl">Guía de Contactos de Profesionales en Derecho y otras Profesiones</h1>
            <p class="text-white text-lg mt-2">Busca por el Nombre (Profesional, Empresa o Institución)</p>
          
            @livewire('search-profile')
            </div>
            
        </div>
    </section>
    @livewire('profiles-index')
</x-app-layout>