<div class=" pl-16">
    @auth
        <button class="text-blue-600" wire:click="$set('answer_created.open', true)">
            <i class="fas fa-reply"></i>
            Responder
        </button>
    @endauth
    @if ($answer_created['open'] == true)
        <div class="flex">
            @auth
                <figure class=" mr-6">
                    <img src="{{ auth()->user()->profile_photo_url }}" alt=""
                        class=" h-10 w-10 object-cover object-center rounded-full shadow-lg">
                </figure>
            @endauth
            <div class="flex-1">
                <form wire:submit.prevent="store">
                    {{-- <textarea wire:model.defer="answer_created.body" class="form-input w-full mb-2" rows="3"
                        placeholder="Escriba su Pregunta"></textarea> --}}
                    <x-balloon-editor wire:model="answer_created.body" :focus="true" />
                    <x-jet-input-error for="answer_created.body" class="mt-2" />
                    <div class=" justify-center gap-4 mt-2">
                        <x-jet-danger-button
                            wire:click="$set('answer_created.open', false)">Cancelar</x-jet-danger-button>
                        <x-jet-button>Responder</x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    @endif
    @if ($question->answers()->count() > 0)
        <div class="flex items-center mt-2">
            <button wire:click="show_more_answer" class="text-sm font-semibold text-green-700 mx-4 hover:text-sky-600">
                @if ($this->cant < $this->question->answers()->count())
                    Mostrar Respuestas
                @else
                    Ocultar respuestas
                @endif
            </button>

        </div>
    @endif
    <ul class="space-y-6">
        @forelse($this->answers as $answer)
            <li wire:key="question-{{ $answer->id }}">
                <div class="flex">
                    <figure class=" mr-6">
                        <img src="{{ $answer->user->profile_photo_url }}" alt=""
                            class=" h-10 w-10 object-cover rounded-full shadow-lg">
                    </figure>
                    <div class="flex-1">
                        <p class="font-semibold">{{ $answer->user->name }} <span
                                class="text-sm font-normal">{{ $answer->created_at->diffForHumans() }}</span></p>
                        @if ($answer->id == $answer_edit['id'])
                            <form wire:submit.prevent="update">
                                {{-- <textarea wire:model.defer="answer_edit.body" class="form-input w-full mb-2" rows="3"></textarea> --}}
                                <x-balloon-editor wire:model="answer_edit.body" :focus="true" />
                                <x-jet-input-error for="answer_edit.body" class="mt-2 mb" />
                                <div class="flex justify-end gap-4 mt-2">
                                    <x-jet-danger-button wire:click="cancel">Cancelar</x-jet-danger-button>
                                    <x-jet-button>Actualizar</x-jet-button>
                                </div>
                            </form>
                        @else
                            <p>{!! $answer->body !!}</p>
                            @auth
                                <button class="text-blue-800"
                                    wire:click="$set('answer_to_answer.id', {{ $answer->id }})">
                                    <i class="fas fa-reply"></i>
                                    Responder
                                </button>
                            @endauth
                        @endif
                    </div>
                    @auth
                        <div class="cursor-pointer ml-6">
                            <x-jet-dropdown class="">
                                <x-slot name="trigger">
                                    <i class="text-red-700 fas fa-ellipsis-v"></i>
                                </x-slot>
                                <x-slot name="content">
                                    <x-jet-dropdown-link class="cursor-pointer"
                                        wire:click="edit({{ $answer->id }})">Editar</x-jet-dropdown-link>
                                    <x-jet-dropdown-link class="cursor-pointer"
                                        wire:click="destroy({{ $answer->id }})">Eliminar</x-jet-dropdown-link>

                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    @endauth
                </div>

            </li>
            @if ($answer->id == $answer_to_answer['id'])
                <div class="flex mt-4 ml-14">
                    @auth
                        <figure class=" mr-6">
                            <img src="{{ auth()->user()->profile_photo_url }}" alt=""
                                class=" h-10 w-10 object-cover object-center rounded-full shadow-lg">
                        </figure>
                    @endauth
                    <div class="flex-1">
                        <form wire:submit.prevent="answer_to_answer_store">
                            {{-- <textarea wire:model="answer_to_answer.body" class="form-input w-full mb-2" placeholder="Escriba su respuesta"
                                rows="3"></textarea> --}}
                            <x-balloon-editor wire:model="answer_to_answer.body" :focus="true" />
                            <x-jet-input-error for="answer_to_answer.body" class="mt-2 mb" />
                            <div class="flex justify-end gap-4 mt-2">
                                <x-jet-danger-button
                                    wire:click="$set('answer_to_answer.id', null)">Cancelar</x-jet-danger-button>
                                <x-jet-button>Responder</x-jet-button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @empty
        @endforelse

    </ul>




</div>
