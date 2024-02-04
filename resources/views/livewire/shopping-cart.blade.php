<div class="container py-8">

    <h2 class="text-xl font-semibold mb-2">Carro de compras</h2>

    <div class="{{ Cart::instance('shopping')->count() ? 'grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12' : '' }}">

        <div class="{{ Cart::count() ? 'lg:col-span-3 order-2 lg:order-1' : '' }}">

            {{-- Carro de compras --}}
            <div class="mb-8">

                @if (Cart::count())
                    <div class="card mb-2">
                        <div class="card-body">
                            <ul class="space-y-4">

                                @foreach (Cart::content() as $item)
                                    <li class="flex" wire:key="shopping-{{ $item->id }}">

                                        <figure class="flex-shrink-0">

                                            <img class="w-40 aspect-[16/9] rounded object-cover object-center"
                                                src="{{ Storage::url($item->model->image->url) }}"
                                                alt="{{ $item->model->title }}">

                                        </figure>

                                        <div class="flex-1 ml-4 overflow-hidden">
                                            <h2 class="font-semibold truncate">
                                                <a
                                                    href="{{ route('courses.show', $item->model) }}">{{ $item->model->title }}</a>
                                            </h2>

                                            <p class="text-gray-500">{{ $item->model->teacher->name }}</p>

                                            <p class="font-semibold">
                                                MXN$ {{ number_format($item->price, 2) }}
                                            </p>

                                        </div>

                                        <div class="ml-6 text-sm">

                                            <button class="block w-full text-right font-bold text-red-600"
                                                wire:click="remove_shopping_cart_item('{{ $item->rowId }}')"
                                                wire:loading.class="text-red-300"
                                                wire:target="remove_shopping_cart_item('{{ $item->rowId }}')">
                                                Eliminar
                                            </button>

                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    <button class="text-sm ml-2 font-semibold hover:text-red-600" onclick="destroy_shopping_cart()">
                        <i class="far fa-trash-alt mr-1"></i>

                        Eliminar carrito de compras
                    </button>
                @else
                    <div class="card mb-8">
                        <div class="card-body">
                            <figure>
                                <img class="w-64 mx-auto"
                                    src="https://cdn.pixabay.com/photo/2015/11/03/09/03/question-mark-1019993_960_720.jpg"
                                    alt="">
                            </figure>

                            <p class="mt-2 mb-3 text-center">Parece que no tienes cursos en el carrito de compras</p>

                            <div class="flex justify-center pb-4">
                                <x-button-enlace href="{{ route('courses.index') }}">
                                    Ver lista de cursos
                                </x-button-enlace>
                            </div>

                        </div>
                    </div>
                @endif

            </div>

        </div>


        @if (Cart::instance('shopping')->count())
            <div class="lg:col-span-2 order-1 lg:order-2">
                <div class="card">
                    <div class="card-body">
                        <div class="flex justify-between items-center font-semibold">
                            <h1 class="text-2xl">Total:</h1>
                            <p class="text-lg">
                                US$ {{ Cart::subtotal() }}
                            </p>
                        </div>

                        <hr class="mt-1 mb-3">

                        <p class="text-xs mb-2 text-justify">Comprueba que hayas agregado todos los cursos que quieres
                            adquirir a tu carrito de compras, y luego procede con el pago</p>

                        {{-- <a href="" class="btn btn-primary mb-2">Proceder con el pago</a> --}}
                        <x-button-enlace href="{{ route('shopping-cart.checkout') }}" class="w-full">
                            Proceder con el pago
                        </x-button-enlace>

                        <div class="flex justify-center items-center mt-5">
                            <img class="h-8" src="{{ asset('img/payments/credit-cards2.png') }}" alt="">
                        </div>

                    </div>
                </div>
            </div>
        @endif

    </div>


    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function destroy_shopping_cart() {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.destroy_shopping_cart();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            }
        </script>
    @endpush

</div>


