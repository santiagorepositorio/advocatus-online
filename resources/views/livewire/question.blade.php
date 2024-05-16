<section class=" mt-4 ">
    <h1 class="font-bold text-3xl text-gray-800 mb-2">Sector de Comentarios</h1>
    {{-- @can('enrolled', $course) --}}
    @auth
        <div class="flex">
            <figure class=" mr-8">
                <img src="{{ auth()->user()->profile_photo_url }}" alt=""
                    class=" h-12 w-12 object-cover object-center rounded-full shadow-lg">
            </figure>
            <div class="flex-1">
                <form wire:submit.prevent="store">
                    {{-- <textarea wire:model.defer="message" class="form-input w-full mb-2" rows="3" placeholder="Escriba su Pregunta"></textarea> --}}
                    <x-balloon-editor wire:model="message" />

                    <x-jet-input-error for="message" class="mt-1" />
                    <div class="flex justify-end mt-4">
                        <x-jet-button>
                            Comentar
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>
    @endauth

    <div class=" mt-2">
        <div class="">
            <ul class="space-y-6">
                <p class=" text-gray-800 text-xl">{{ $model->questions()->count() }} Comentarios</p>
                @forelse ($this->questions as $question)
                    <li wire:key="question-{{ $question->id }}">
                        <div class="flex">
                            <figure class=" mr-6">
                                <img src="{{ $question->user->profile_photo_url }}" alt=""
                                    class=" h-10 w-10 object-cover rounded-full shadow-lg">
                            </figure>
                            <div class="flex-1">
                                <p class="font-semibold">{{ $question->user->name }} <span
                                        class="text-sm font-normal">{{ $question->created_at->diffForHumans() }}</span>
                                </p>
                                @if ($question->id == $question_edit['id'])
                                    <form wire:submit.prevent="update">
                                        {{-- <textarea wire:model.defer="question_edit.body" class="form-input w-full mb-2" rows="3"></textarea> --}}
                                        <x-balloon-editor wire:model="question_edit.body" :focus="true" />
                                        <x-jet-input-error for="question_edit.body" class="mt-2 mb" />
                                        <div class="flex justify-end gap-4 mt-2">
                                            <x-jet-danger-button wire:click="cancel">Cancelar</x-jet-danger-button>
                                            <x-jet-button>Modificar</x-jet-button>
                                        </div>
                                    </form>
                                @else
                                    <p>{!! $question->body !!}</p>
                                @endif
                            </div>
                            @auth
                                @can('update', $question)
                                    {{-- @if ($question->user_id == auth()->id()) --}}
                                    <div class="cursor-pointer ml-6">
                                        <x-jet-dropdown class="">
                                            <x-slot name="trigger">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </x-slot>
                                            <x-slot name="content">
                                                @can('update', $question)                                                    
                                                <x-jet-dropdown-link class="cursor-pointer" wire:click="edit({{ $question->id }})">Editar</x-jet-dropdown-link>
                                                @endcan
                                                @can('delete', $question) 
                                                <x-jet-dropdown-link class="cursor-pointer" wire:click="destroy({{ $question->id }})">Eliminar</x-jet-dropdown-link>
                                                @endcan
                                            </x-slot>
                                        </x-jet-dropdown>
                                    </div>
                                    {{-- @endif --}}
                                @endcan
                            @endauth
                        </div>
                        @livewire('answer', compact('question'), key('answer-' . $question->id))
                    </li>
                @empty
                @endforelse

            </ul>
            @if ($model->questions()->count() - $cant > 0)
                <div class="flex items-center">
                    <hr class="flex-1">
                    <button wire:click="show_more_question"
                        class="text-sm font-semibold text-slate-500 mx-4 hover:text-sky-600">
                        Ver los {{ $model->questions()->count() - $cant }} comentarios resntes
                    </button>
                    <hr class="flex-1">
                </div>
            @endif

        </div>
    </div>
    @push('jseditor')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/balloon/ckeditor.js"></script>
        <script>
            BalloonEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
</section>
