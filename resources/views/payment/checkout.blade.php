<x-app-layout>
{{-- <x-app-layout>
    <div class="container max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold">Detalle del pedido</h1>
        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img src="{{ Storage::url($course->image->url) }}" alt="" class="h-12 w-12 object-cover">
                    <h1 class="text-lg ml-2">{{ $course->title }}</h1>
                    <p class="text-xl font-bold ml-auto">US$ {{ $course->price->value }}</p>
                </article>
                <div class="flex justify-end mt-2 mb-4">
                    <a href="{{ route('payment.pay', $course) }}" class="btn btn-primary">Comprar este curso</a>
                    <div wire:ignore>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
                <hr>
                <p class="text-sm mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta, autem repudiandae. Pariatur facilis, praesentium soluta ducimus consectetur odit perferendis hic? Cum reprehenderit ullam repudiandae nulla quasi tempora repellat quibusdam aut. <a href="" class="text-red-500">terminos y Condiciones</a></p>
            </div>
        </div>
    </div>
    @push('scripts')
        <!-- Replace "test" with your own sandbox Business account app client ID -->

    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD"></script>
    <script>

        paypal.Buttons({
  
          // Order is created on the server and the order id is returned
  
          createOrder() {
  
            return fetch("/my-server/create-paypal-order", {
  
              method: "POST",
  
              headers: {
  
                "Content-Type": "application/json",
  
              },
  
              // use the "body" param to optionally pass additional order information
  
              // like product skus and quantities
  
              body: JSON.stringify({
  
                cart: [
  
                  {
  
                    sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
  
                    quantity: "YOUR_PRODUCT_QUANTITY",
  
                  },
  
                ],
  
              }),
  
            })
  
            .then((response) => response.json())
  
            .then((order) => order.id);
  
          },
  
          // Finalize the transaction on the server after payer approval
  
          onApprove(data) {
  
            return fetch("/my-server/capture-paypal-order", {
  
              method: "POST",
  
              headers: {
  
                "Content-Type": "application/json",
  
              },
  
              body: JSON.stringify({
  
                orderID: data.orderID
  
              })
  
            })
  
            .then((response) => response.json())
  
            .then((orderData) => {
  
              // Successful capture! For dev/demo purposes:
  
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
  
              const transaction = orderData.purchase_units[0].payments.captures[0];
  
              alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
  
              // When ready to go live, remove the alert and show a success message within this page. For example:
  
              // const element = document.getElementById('paypal-button-container');
  
              // element.innerHTML = '<h3>Thank you for your payment!</h3>';
  
              // Or go to another URL:  window.location.href = 'thank_you.html';
  
            });
  
          }
  
        }).render('#paypal-button-container');
  
      </script>
    @endpush
</x-app-layout> --}}
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <section class="mx-auto max-w-2xl text-center">

            <div>

                <iframe src="https://player.vimeo.com/video/738013219?h=5599adc612" width="640" height="564"
                    frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>

        </section>
        <h1 class="text-gray-500 text-3xl font-bold">Detalle del pedido</h1>

        <div class="card text-gray-600">
            <div class="card-body">
                <article
                    class="text-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8 ">
                    <img class="h-48 w-48 object-cover justify-center" src="{{ Storage::url($course->image->url) }}"
                        alt="">
                    <h1 class="text-lg ml-2">{{ $course->title }}</h1>

                    <p class="text-xl  font-bold ">MXN$ {{ $course->price->value }}</p>
                </article>
                <br>
                <h2 class="text-center">Datos Bancarios</h2>
                <p class="text-center"> <b>JUAN HERNANDEZ CRUZ</b></p>
                <br>
                <div
                    class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-8">

                    <div>

                        <p>BANCO SANTANDER:</p>

                        <p>N° CUENTA</p>
                        <p> <b> 56700378639</b></p>
                        <br>
                        <p>NUMERO DE TARJETA </p>
                        <p> <b>5579 1003 4379 1735</b></p>

                    </div>
                    <div>
                        <p> BANCO AZTECA: </p>

                        <p> N° CUENTA: </p>
                        <p><b> 3789 1315 2911 20 </b></p>
                        <br>
                        <p> NUMERO DE TARJETA: </p>
                        <p> <b> 5263 5401 0390 8451</b> </p>
                        <br>
                        <p> CLAVE INTERBANCARIA: </p>
                        <p> <b>1276 1401 3152 9112 06</b> </p>
                    </div>
                    <p> <b>Enviame un WhatsApp</b> </p>
                    <a href="https://web.whatsapp.com/send?phone=525574344337"
                        class="text-white hover:text-red-500 dark:hover:text-red">
                        <button
                            class="bg-green-600 text-white w-16 h-16 rounded-full outline-none focus:outline-none mr-2 mb-2"
                            type="button">
                            <i class="fab fa-whatsapp"></i>
                        </button>
                    </a>


                </div>
                <br>
                <div class="flex justify-center mt-2 mb-4 ">
                    <a class="hover:bg-blue-500 bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        href="https://web.whatsapp.com/send?phone=525574344337&text=%C2%A1Hola!%20Necesito%20informaci%C3%B3n%20del%20curso%20{{ $course->title }}%20Mi cuenta%20registrada%20es:%20{{ auth()->user()->email }}">Solicitar
                        Acceso</a>
                </div>

                <hr>
                <p> <a href="https://web.whatsapp.com/send?phone=525574344337&text=%C2%A1Hola!%20Necesito%20informaci%C3%B3n%20del%20curso%20{{ $course->title }}%20Mi cuenta%20registrada%20es:%20{{ auth()->user()->email }}"
                        class="text-sm mt-4 "> Mas información +52 1 557 434 4337</a> </p> <a
                    class="text-red-500 font-bold"
                    href="https://web.whatsapp.com/send?phone=525574344337&text=%C2%A1Hola!%20Necesito%20informaci%C3%B3n%20del%20curso%20{{ $course->title }}%20Mi cuenta%20registrada%20es:%20{{ auth()->user()->email }}">Terminos
                    y condiciones</a>
            </div>
        </div>
    </div>
</x-app-layout>
