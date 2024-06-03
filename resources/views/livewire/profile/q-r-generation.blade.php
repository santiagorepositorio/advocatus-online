<div>
    <x-slot name="profile">
        {{ $profile->slug }}
    </x-slot>
    <h1 class="text-2xl font-bold">GENERAR QR PARA TARJETA VIRTUAL</h1>
    <hr class="mt-2 mb-6">

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap lg:justify-center gap-10">
        <div class="flex gap-4">
            <div class="space-y-4">
                {{-- <button class="btn btn-primary" wire:click="generateQrCode">Generar QR Code</button> --}}

                <div class="space-y-2">
                    <div class="space-y-2">
                        <label for="style" class="block font-medium text-gray-700">Estilo de QR</label>
                        <select wire:model="style" class="form-select mb-2 w-full">
                            <option value="square">Cuadrado</option>
                            <option value="dot">Puntos</option>
                            <option value="round" selected>Redondo</option>
                        </select>

                        <label for="background-color" class="block font-medium text-gray-700">Color de Fondo:</label>
                        <input type="color" id="background-color" wire:model="backgroundColor"
                            class="color w-full border rounded">
                    </div>

                    <div class="space-y-1">
                        <label for="foreground-color" class="block font-medium text-gray-700">Color de QR:</label>
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" wire:model="degradado" id="degradado" class="rounded">
                            <label for="degradado" class="text-gray-700">Degradado</label>
                        </div>

                        @if ($degradado)
                            <div class="flex gap-2">
                                <input type="color" wire:model="colorHex" id="foreground-color1"
                                    class="color w-full border rounded">
                                <input type="color" wire:model="colorHex1" id="foreground-color2"
                                    class="color w-full border rounded">
                            </div>
                        @else
                            <div>
                                <input type="color" wire:model="colorHex" id="foreground-color3"
                                    class="color w-full border rounded">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="margin" class="block font-medium text-gray-700">Ancho de Margen</label>
                    <select wire:model="margin" class="form-select mb-2 w-full">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>


            </div>
        </div>
        <div class="flex gap-4">
            <div class="space-y-4">
                <div class="space-y-2">
                    <div class="space-y-2">
                        <label for="eye" class="block font-medium text-gray-700">Estilo de Ojos</label>
                        <select wire:model="eye" class="form-select mb-2 w-full">
                            <option value="square" selected>Cuadrado</option>
                            <option value="circle">Circulo</option>
                        </select>

                        <label for="eyeColor" class="block font-medium text-gray-700">Color de ojos</label>
                        <div class="flex gap-2">
                            <input type="color" wire:model="eyeColorHex" id="eyeColorHex"
                                class="color w-full border rounded">
                            <input type="color" wire:model="eyeColorHexi" id="eyeColorHexi"
                                class="color w-full border rounded">
                        </div>
                        <div x-data="{ checkII: @entangle('checkII'), checkIS: @entangle('checkIS'), checkDS: @entangle('checkDS') }">
                            <ul class="space-y-3">
                                <li>
                                    <label class="flex items-center">
                                        <input type="checkbox" x-bind:checked="checkII" wire:click="toggleCheckII"
                                            class="rounded">
                                        <span class="ml-2 text-gray-700">Superior Izquierdo</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="flex items-center">
                                        <input type="checkbox" x-bind:checked="checkIS" wire:click="toggleCheckIS"
                                            class="rounded">
                                        <span class="ml-2 text-gray-700">Superior Derecho</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="flex items-center">
                                        <input type="checkbox" x-bind:checked="checkDS" wire:click="toggleCheckDS"
                                            class="rounded">
                                        <span class="ml-2 text-gray-700">Inferior Izquierdo</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <div class="space-y-2">
                        <label for="errorC" class="block font-medium text-gray-700">Calidad de Lectura</label>
                        <select wire:model="errorC" class="form-select mb-2 w-full">
                            <option value="L" selected>Bajo</option>
                            <option value="M">Medio</option>
                            <option value="Q">Moderado</option>
                            <option value="H">Alto</option>
                           
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            @if ($qrcode)
                <div class="flex flex-col items-center">
                    <img id="qrcode" src="data:image/svg+xml;base64,{{ $qrcode }}" alt="Código QR"
                        class="border-4 border-black rounded-lg mb-4">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-2 md:space-y-0 md:space-x-4">
                        <a href="data:image/svg+xml;base64,{{ $qrcode }}" download="qrcode.svg"
                            class="btn btn-secondary flex items-center bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">
                            <i class="fas fa-download mr-2"></i> Descargar SVG
                        </a>
                        <button onclick="downloadPNG()"
                            class="btn btn-primary flex items-center bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-lg">
                            <i class="fas fa-download mr-2"></i> Descargar PNG
                        </button>
                    </div>
                </div>
            @endif

        </div>

    </section>


</div>
