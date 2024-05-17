<section class=" mt-4 ">
    <h1 class="font-bold text-3xl text-gray-800 mb-2">Valoracion</h1>
    @auth
       <article class="my-4">
        @switch($model->category->status)
            @case('Curso')
                @can('enrolled', $model)
                    @can('valued', $model)
                        <textarea wire:model="comment" class="form-input w-full" rows="3" placeholder="Califique y marque la estrellas"></textarea>
                        <x-jet-input-error for="comment" class="mt-2 mb" />
                        <div class="flex justify-between">
                            <button class="btn btn-primary mr-4" wire:click="store">AGREGAR</button>

                            <ul class="flex items-center">
                                <li class="mr-1 cursor-pointer"wire:click="$set('rating', 1)"><i
                                        class="fas fa-star text-{{ $rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                                <li class="mr-1 cursor-pointer"wire:click="$set('rating', 2)"><i
                                        class="fas fa-star text-{{ $rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                                <li class="mr-1 cursor-pointer"wire:click="$set('rating', 3)"><i
                                        class="fas fa-star text-{{ $rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                                <li class="mr-1 cursor-pointer"wire:click="$set('rating', 4)"><i
                                        class="fas fa-star text-{{ $rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                                <li class="mr-1 cursor-pointer"wire:click="$set('rating', 5)"><i
                                        class="fas fa-star text-{{ $rating >= 5 ? 'yellow' : 'gray' }}-400"></i>
                                </li>
                            </ul>

                        </div>
                    @else
                        <div class="flex items-center rounded-xl bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                            </svg>
                            <p>Usted ya valoro el Curso.</p>
                        </div>
                    @endcan
                @endcan
            @break

            @case('Perfil')
                @can('valued', $model)
                    <textarea wire:model="comment" class="form-input w-full" rows="3" placeholder="Califique y marque la estrellas"></textarea>
                    <x-jet-input-error for="comment" class="mt-2 mb" />
                    <div class="flex justify-between">
                        <button class="btn btn-primary mr-4" wire:click="store">AGREGAR</button>

                        <ul class="flex items-center">
                            <li class="mr-1 cursor-pointer"wire:click="$set('rating', 1)"><i
                                    class="fas fa-star text-{{ $rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1 cursor-pointer"wire:click="$set('rating', 2)"><i
                                    class="fas fa-star text-{{ $rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1 cursor-pointer"wire:click="$set('rating', 3)"><i
                                    class="fas fa-star text-{{ $rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1 cursor-pointer"wire:click="$set('rating', 4)"><i
                                    class="fas fa-star text-{{ $rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1 cursor-pointer"wire:click="$set('rating', 5)"><i
                                    class="fas fa-star text-{{ $rating >= 5 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                        </ul>

                    </div>
                @else
                    <div class="flex items-center rounded-xl bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                        </svg>
                        <p>Usted ya valoro el Perfil.</p>
                    </div>
                @endcan
            @break

            @default
        @endswitch

    </article> 
    @endauth
    
    {{-- @elsecan(auth()->check())
    <article class="my-4">
        @can('valued2', $model)
        <textarea wire:model="comment" class="form-input w-full" rows="3" placeholder="Califique al Perfil Profesional y marque las estrellas"></textarea>  
        <x-jet-input-error for="comment" class="mt-2 mb" />  
        <div class="flex justify-between">
            <button class="btn btn-primary mr-4" wire:click="store">AGREGAR</button>

            <ul class="flex items-center">
                <li class="mr-1 cursor-pointer"wire:click="$set('rating', 1)"><i class="fas fa-star text-{{ $rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1 cursor-pointer"wire:click="$set('rating', 2)"><i class="fas fa-star text-{{ $rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1 cursor-pointer"wire:click="$set('rating', 3)"><i class="fas fa-star text-{{ $rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1 cursor-pointer"wire:click="$set('rating', 4)"><i class="fas fa-star text-{{ $rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1 cursor-pointer"wire:click="$set('rating', 5)"><i class="fas fa-star text-{{ $rating >= 5 ? 'yellow' : 'gray' }}-400"></i>
                </li>
            </ul>

        </div>
        @else
        <div class="flex items-center rounded-xl bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>Usted ya valoro el curso.</p>
          </div> 
        @endcan
    </article> --}}



    <p class=" text-gray-800 text-xl">Ultimas 5 de {{ $this->comments->count() }} Valoraciones</p>
    @foreach ($this->comments as $review)
        <article class="flex mb-4 text-gray-800 items-center">
            <figure class=" mr-4">
                <img src="{{ $review->user->profile_photo_url }}" alt=""
                    class=" h-10 w-10 object-cover object-center rounded-full shadow-lg">
            </figure>
            <div class="card flex-1 rounded-full">
                <div class="card-body bg-slate-100 ">
                    <p><b>{{ $review->user->name }}</b> <i
                            class="fas fa-star text-yellow-500"></i>({{ $review->rating }})</p>
                    {{ $review->comment }}
                </div>
            </div>
        </article>
    @endforeach


</section>
