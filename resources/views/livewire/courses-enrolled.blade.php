<section class="card">
    <div class="card-body">
        <div class="flex items-center">
            <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}"
                alt="{{ $course->teacher->name }}">
            <div class="ml-4">
                <h1 class="font-bold text-gray-500 text-lg">
                    Prof. {{ $course->teacher->name }}
                </h1>
                <a class="text-blue-400 text-sm font-bold"
                    href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
            </div>
        </div>

        @can('enrolled', $course)
            <div class="mt-4 flex items-center justify-between gap-1">
                <a class="btn btn-danger btn-block w-80 mb-2" href="{{ route('courses.status', $course) }}">Continuar con el
                    curso</a>
                <button
                    class="btn btn-{{ Cart::instance('shopping')->content()->where('id', $this->course->id)->first()? 'danger': 'primary' }} w-30 mb-2"
                    wire:click="add_to_cart" wire:loading.attr="disabled" wire:target="add_to_cart">
                    @if (Cart::instance('shopping')->content()->where('id', $this->course->id)->first())
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="fill:0;"
                            xml:space="preserve">
                            <g id="_x34_4_x2C__Bag_x2C__Shopping_Bag_x2C__Heart_x2C__Love_and_Romance_x2C__Valentine">
                                <g>
                                    <path
                                        d="M485.462,191.053c0-22.052-17.941-39.993-39.993-39.993h-59.99v-39.993c0-74.608-73.304-128.003-144.476-104.435    C169.904-16.912,96.527,36.393,96.527,111.067v39.993H66.532c-22.052,0-39.993,17.941-39.993,39.993v279.953    C26.538,493.059,44.48,511,66.532,511c49.307,0,336.667,0,378.937,0c22.037,0,39.993-17.961,39.993-39.993V191.053z     M465.465,191.053v272.561l-40.996-75.149c0.319-13.618-0.265-58.211-0.014-217.409h21.013    C456.495,171.057,465.465,180.027,465.465,191.053z M404.475,171.057v217.451l-38.993,72.7V171.057    C375.032,171.057,394.986,171.057,404.475,171.057z M365.482,111.067v39.993c-4.919,0-43.591,0-48.992,0v-39.993    c0-37.045-18.412-69.869-46.564-89.808C321.978,18.068,365.482,59.553,365.482,111.067z M296.493,151.06H185.512v-39.993    c0-37.404,22.942-69.546,55.491-83.106c32.549,13.56,55.491,45.703,55.491,83.106V151.06z M116.523,111.067    c0-51.532,43.523-92.998,95.556-89.808c-28.152,19.938-46.564,52.762-46.564,89.808v39.993h-48.992V111.067z M46.535,471.007    V191.053c0-11.026,8.97-19.997,19.997-19.997c86.63,0,192.623,0,278.953,0v319.947H66.532    C55.505,491.003,46.535,482.033,46.535,471.007z M372.192,491.003l42.356-78.969l41.434,75.951    c-3.059,1.901-6.654,3.019-10.513,3.019H372.192z" />
                                    <path
                                        d="M196.515,237.327c-28.283-21.902-69.912-20.629-96.765,6.227c-28.617,28.628-28.617,75.209,0.001,103.839l89.69,89.691    c3.905,3.903,12.265,1.875,14.14,0c74.262-74.263,89.615-89.603,89.715-89.716c28.682-28.731,28.637-75.128-0.024-103.816    C266.898,217.18,225.285,215.1,196.515,237.327z" />
                                </g>
                            </g>
                            <g id="Layer_1" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="fill:0;"
                            xml:space="preserve">
                            <g id="_x34_4_x2C__Bag_x2C__Shopping_Bag_x2C__Heart_x2C__Love_and_Romance_x2C__Valentine">
                                <g>
                                    <path
                                        d="M485.462,191.053c0-22.052-17.941-39.993-39.993-39.993h-59.99v-39.993c0-74.608-73.304-128.003-144.476-104.435    C169.904-16.912,96.527,36.393,96.527,111.067v39.993H66.532c-22.052,0-39.993,17.941-39.993,39.993v279.953    C26.538,493.059,44.48,511,66.532,511c49.307,0,336.667,0,378.937,0c22.037,0,39.993-17.961,39.993-39.993V191.053z     M465.465,191.053v272.561l-40.996-75.149c0.319-13.618-0.265-58.211-0.014-217.409h21.013    C456.495,171.057,465.465,180.027,465.465,191.053z M404.475,171.057v217.451l-38.993,72.7V171.057    C375.032,171.057,394.986,171.057,404.475,171.057z M365.482,111.067v39.993c-4.919,0-43.591,0-48.992,0v-39.993    c0-37.045-18.412-69.869-46.564-89.808C321.978,18.068,365.482,59.553,365.482,111.067z M296.493,151.06H185.512v-39.993    c0-37.404,22.942-69.546,55.491-83.106c32.549,13.56,55.491,45.703,55.491,83.106V151.06z M116.523,111.067    c0-51.532,43.523-92.998,95.556-89.808c-28.152,19.938-46.564,52.762-46.564,89.808v39.993h-48.992V111.067z M46.535,471.007    V191.053c0-11.026,8.97-19.997,19.997-19.997c86.63,0,192.623,0,278.953,0v319.947H66.532    C55.505,491.003,46.535,482.033,46.535,471.007z M372.192,491.003l42.356-78.969l41.434,75.951    c-3.059,1.901-6.654,3.019-10.513,3.019H372.192z" />
                                    <path
                                        d="M196.515,237.327c-28.283-21.902-69.912-20.629-96.765,6.227c-28.617,28.628-28.617,75.209,0.001,103.839l89.69,89.691    c3.905,3.903,12.265,1.875,14.14,0c74.262-74.263,89.615-89.603,89.715-89.716c28.682-28.731,28.637-75.128-0.024-103.816    C266.898,217.18,225.285,215.1,196.515,237.327z" />
                                </g>
                            </g>
                            <g id="Layer_1" />
                        </svg>
                    @endif
                </button>
            </div>
        @else
            @if ($course->price->value == 0)
                <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">GRATIS</p>
            @else
                <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">Bs. {{ $course->price->value }}</p>
            @endif

            <div class="mt-2 flex items-center justify-between gap-1">
                <form action="{{ route('courses.enrolled', $course) }}" method="post">
                    @csrf
                    <button class="btn btn-danger btn-block w-70 mb-2" type="submit">Pre Inscribirse</button>
                </form>
                <button
                    class="btn btn-{{ Cart::instance('shopping')->content()->where('id', $this->course->id)->first()? 'danger': 'primary' }} w-30 mb-2"
                    wire:click="add_to_cart" wire:loading.attr="disabled" wire:target="add_to_cart">
                    @if (Cart::instance('shopping')->content()->where('id', $this->course->id)->first())
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="fill:0;"
                            xml:space="preserve">
                            <g id="_x34_4_x2C__Bag_x2C__Shopping_Bag_x2C__Heart_x2C__Love_and_Romance_x2C__Valentine">
                                <g>
                                    <path
                                        d="M485.462,191.053c0-22.052-17.941-39.993-39.993-39.993h-59.99v-39.993c0-74.608-73.304-128.003-144.476-104.435    C169.904-16.912,96.527,36.393,96.527,111.067v39.993H66.532c-22.052,0-39.993,17.941-39.993,39.993v279.953    C26.538,493.059,44.48,511,66.532,511c49.307,0,336.667,0,378.937,0c22.037,0,39.993-17.961,39.993-39.993V191.053z     M465.465,191.053v272.561l-40.996-75.149c0.319-13.618-0.265-58.211-0.014-217.409h21.013    C456.495,171.057,465.465,180.027,465.465,191.053z M404.475,171.057v217.451l-38.993,72.7V171.057    C375.032,171.057,394.986,171.057,404.475,171.057z M365.482,111.067v39.993c-4.919,0-43.591,0-48.992,0v-39.993    c0-37.045-18.412-69.869-46.564-89.808C321.978,18.068,365.482,59.553,365.482,111.067z M296.493,151.06H185.512v-39.993    c0-37.404,22.942-69.546,55.491-83.106c32.549,13.56,55.491,45.703,55.491,83.106V151.06z M116.523,111.067    c0-51.532,43.523-92.998,95.556-89.808c-28.152,19.938-46.564,52.762-46.564,89.808v39.993h-48.992V111.067z M46.535,471.007    V191.053c0-11.026,8.97-19.997,19.997-19.997c86.63,0,192.623,0,278.953,0v319.947H66.532    C55.505,491.003,46.535,482.033,46.535,471.007z M372.192,491.003l42.356-78.969l41.434,75.951    c-3.059,1.901-6.654,3.019-10.513,3.019H372.192z" />
                                    <path
                                        d="M196.515,237.327c-28.283-21.902-69.912-20.629-96.765,6.227c-28.617,28.628-28.617,75.209,0.001,103.839l89.69,89.691    c3.905,3.903,12.265,1.875,14.14,0c74.262-74.263,89.615-89.603,89.715-89.716c28.682-28.731,28.637-75.128-0.024-103.816    C266.898,217.18,225.285,215.1,196.515,237.327z" />
                                </g>
                            </g>
                            <g id="Layer_1" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" style="fill:0;"
                            xml:space="preserve">
                            <g id="_x34_4_x2C__Bag_x2C__Shopping_Bag_x2C__Heart_x2C__Love_and_Romance_x2C__Valentine">
                                <g>
                                    <path
                                        d="M485.462,191.053c0-22.052-17.941-39.993-39.993-39.993h-59.99v-39.993c0-74.608-73.304-128.003-144.476-104.435    C169.904-16.912,96.527,36.393,96.527,111.067v39.993H66.532c-22.052,0-39.993,17.941-39.993,39.993v279.953    C26.538,493.059,44.48,511,66.532,511c49.307,0,336.667,0,378.937,0c22.037,0,39.993-17.961,39.993-39.993V191.053z     M465.465,191.053v272.561l-40.996-75.149c0.319-13.618-0.265-58.211-0.014-217.409h21.013    C456.495,171.057,465.465,180.027,465.465,191.053z M404.475,171.057v217.451l-38.993,72.7V171.057    C375.032,171.057,394.986,171.057,404.475,171.057z M365.482,111.067v39.993c-4.919,0-43.591,0-48.992,0v-39.993    c0-37.045-18.412-69.869-46.564-89.808C321.978,18.068,365.482,59.553,365.482,111.067z M296.493,151.06H185.512v-39.993    c0-37.404,22.942-69.546,55.491-83.106c32.549,13.56,55.491,45.703,55.491,83.106V151.06z M116.523,111.067    c0-51.532,43.523-92.998,95.556-89.808c-28.152,19.938-46.564,52.762-46.564,89.808v39.993h-48.992V111.067z M46.535,471.007    V191.053c0-11.026,8.97-19.997,19.997-19.997c86.63,0,192.623,0,278.953,0v319.947H66.532    C55.505,491.003,46.535,482.033,46.535,471.007z M372.192,491.003l42.356-78.969l41.434,75.951    c-3.059,1.901-6.654,3.019-10.513,3.019H372.192z" />
                                    <path
                                        d="M196.515,237.327c-28.283-21.902-69.912-20.629-96.765,6.227c-28.617,28.628-28.617,75.209,0.001,103.839l89.69,89.691    c3.905,3.903,12.265,1.875,14.14,0c74.262-74.263,89.615-89.603,89.715-89.716c28.682-28.731,28.637-75.128-0.024-103.816    C266.898,217.18,225.285,215.1,196.515,237.327z" />
                                </g>
                            </g>
                            <g id="Layer_1" />
                        </svg>
                    @endif
                </button>
            </div>
            {{-- @else
                <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">Bs. {{ $course->price->value }}</p>
                <button class="btn btn-primary w-full mb-2"
                    wire:click="add_to_cart"
                    wire:loading.attr="disabled"
                    wire:target="add_to_cart">
                    @if (Cart::instance('shopping')->content()->where('id', $this->course->id)->first())
                        Eliminar de Preferencias
                    @else
                        Añadir a Preferencias 
                    @endif
                </button>

                <button class="btn btn-danger btn-block"
                    wire:click="buy_now"
                    wire:loading.attr="disabled"
                    wire:target="buy_now">
                    INSCRIBIRSE
                </button> --}}
            {{-- @endif --}}

        @endcan


    </div>
</section>
