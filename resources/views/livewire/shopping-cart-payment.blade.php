<div>

    <div id="processingPayment" class="fixed left-0 top-16 w-full bg-black bg-opacity-75 hidden" style="height: 100vh; z-index: 300">

        <div class="container pt-8 px-6">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg max-w-lg mx-auto">
                
                <div class="relative">
                    <img class="w-full" src="{{ asset('img/payments/procesando-pagos.png') }}" alt="Procesando pago">

                    <div class="absolute left-0 top-0 w-full h-full flex items-center justify-center">
                        <x-loading-points size="6" class="mt-8" />
                    </div>
                </div>
                
                <div class="px-6 py-4">
                    <p class="leading-5 text-gray-500 text-center font-semibold">El pago se está procesando, por favor no cierre ni actualice esta página. De haber un error en la compra, por favor escribenos a <a class="text-blue-500 hover:text-blue-700" href="juanhernandezcruzmx@gmail.com">juanhernandezcruzmx@gmail.com</a></p>
                </div>

            </div>

        </div>

    </div>

    <div class="container mt-12">

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">

            <div class="lg:col-span-3">

                <div class="card">
                    <div class="card-body">
                        <ul class="space-y-4">

                            @foreach (Cart::instance('shopping')->content() as $item)
                                <li class="flex flex-wrap lg:flex-nowrap">

                                    <div class="w-full lg:w-40 lg:flex-shrink-0">
                                        <div class="aspect-w-16 aspect-h-9">
                                            <img class="rounded w-full h-full object-cover object-center"
                                                src="{{ Storage::url($item->model->image->url) }}"
                                                alt="{{ $item->model->title }}" />
                                        </div>
                                    </div>

                                    <div class="flex-1 ml-4 overflow-hidden">

                                        <h2 class="font-semibold truncate">
                                            <a
                                                href="{{ route('courses.show', $item->model) }}">{{ $item->model->title }}</a>
                                        </h2>
                                        <p class="text-gray-500">{{ $item->model->teacher->name }}</p>

                                        <p class="font-semibold">

                                            US$ {{ $item->model->price->value }}

                                        </p>

                                        @if ($item->options->cuponCode)
                                            <p class="text-xs">
                                                CUPÓN: {{ $item->options->cuponCode }}
                                            </p>
                                        @endif

                                    </div>

                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                {{-- <a class="mt-1" href="">Volver a carrito de compras</a> --}}

            </div>

            <div class="lg:col-span-2">
                <div class="card">
                    <div class="card-body">

                        <h2 class="text-2xl font-semibold mb-2">Resumen</h2>
                        <p class="flex justify-between">Precio original: <span>US$ {{ Cart::subtotal() }}</span></p>
                        <p class="flex justify-between">Descuento: <span>US$ 0</span></p>
                        <hr class="my-1">
                        <p class="flex justify-between mb-1 font-semibold">Total: <span>US$ {{ Cart::subtotal() }}</span>
                        </p>

                        {{-- Botones de pago --}}
                        <div wire:ignore class="mt-4">                 
                            {{-- PayPal --}}
                            <div id="smart-button-container">
                                <div style="text-align: center;">
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        @push('payment-scripts')
            {{-- SDK PayPal --}}
            <script src="https://www.paypal.com/sdk/js?client-id={{config('services.paypal.client_id')}}&currency=USD&components=buttons,funding-eligibility" data-sdk-integration-source="button-factory"></script>

            <script>
                initPayPalButton();

                function initPayPalButton() {
                    paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                                "purchase_units": [{
                                    "amount": {
                                        "currency_code": "USD",
                                        "value": "{{ str_replace(',', '' , Cart::subtotal()) }}",
                                        "breakdown": {
                                            "item_total": {
                                                /* Required when including the items array */
                                                "currency_code": "USD",
                                                "value": "{{ str_replace(',', '' , Cart::subtotal()) }}"
                                            }
                                        }
                                    },
                                    "items": [
                                        @foreach (Cart::instance('shopping')->content() as $item)
                                            {
                                                "name": "{{ $item->model->title }}",
                                                "unit_amount": {
                                                    "currency_code": "USD",
                                                    "value": {{ $item->price }}
                                                },
                                                "quantity": "1",
                                                "sku": "{{$item->model->id}}",
                                            },
                                        @endforeach
                                    ]
                                }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                            
                                var processingPayment = document.getElementById("processingPayment");
                                processingPayment.classList.remove("hidden");

                                @this.payment();

                            });
                        }
                    }).render('#paypal-button-container');
                }
            </script>
        @endpush

    </div>

</div>