<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/home/bannerrr.png') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-fold text-4xl">Modelos de Memoriales</h1>
            <p class="text-white text-lg mt-2">En sus distintas Materias del Derecho</p>
            @livewire('search-folder')         
          
            </div>            
        </div>
    </section>
    @livewire('folder.foldes-file')

</x-app-layout>