<div>
    <x-jet-dropdown align="right" width="48">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-cart color="black" size="30" />
                @if (Cart::instance('shopping')->count())
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ Cart::count() }}</span>
                @else
                    <span
                        class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
                @endif

            </span>
        </x-slot>

        <x-slot name="content">
            <ul class="text-gray-800">

                @forelse (Cart::content() as $item)
                    <li class="flex p-4 border-gray-200">
                        <img class="w-10 h-16 object-cover object-center mr-4"
                            src="{{ Storage::url($item->model->image->url) }}" alt="{{ $item->model->title }}">
                        <article class="flex-1">
                            <h3 class="font-bold text-xs">
                                <a href="{{ route('courses.show', $item->model) }}">{{ $item->model->title }}</a>
                            </h3>
                            <p class="text-sm">Bs. {{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">No tiene agregado ningun item</p>
                    </li>
                @endforelse
            </ul>


            @if (Cart::count())
                <div class="py-2 px-3">
                    <p class=" text-base text-gray-700 mt-2 mb-3"><span class="font-bold">Total:</span> Bs.
                        {{ Cart::subtotal() }}</p>
                    
                    {{-- <x-button-enlace href="{{ route('shopping-cart') }}" color="blue" class="w-full">
                        Eliminar Lista
                    </x-button-enlace> --}}
                </div>
            @endif

        </x-slot>
    </x-jet-dropdown>

</div>
