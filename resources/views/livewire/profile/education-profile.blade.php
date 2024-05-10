<section>

    @foreach ($profile->educations as $item)
        <article class="card mb-4">
            <div class="card-body bg-gray-100">
                @if ($education->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="education.title" class="form-input w-full mb-2">
                        @error('education.title')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <input wire:model="education.institution" class="form-input w-full mb-2">
                        @error('education.institution')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <input wire:model="education.gestion" class="form-input w-full mb-2">
                        @error('education.gestion')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-end mt-2">
                            <button type="submit" class="btn btn-primary">GUARDAR</button>
                        </div>
                    </form>
                @else
                <header class="flex justify-between">
                    <p class="text-sm gap-4">{{ $item->title }}</p>
                    <p> <a href="#" class="text-blue-600 font-bold">{{ $item->institution }}</a></p>
                    <p class="text-xs text-gray-500">{{ $item->gestion }}</p>

                    <div>
                        <i wire:click="edit({{ $item }})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                        <i wire:click="destroy({{ $item }})" class="fas fa-trash text-red-500 cursor-pointer ml-2"></i>
                    </div>
                </header>
                @endif
            </div>
        </article>
    @endforeach
    <article class="card mb-4">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <input wire:model="title" class="form-input w-full mb-2" placeholder="Agregue Nombre del Curso/Taller">
                @error('title')
                    <span class="text-xs text-red-500">{{ $message }}</span>

                @enderror
                <input wire:model="institution" class="form-input w-full mb-2" placeholder="Agregue Nombre de Institucion">
                @error('institution')
                    <span class="text-xs text-red-500">{{ $message }}</span>

                @enderror
                <input wire:model="gestion" class="form-input w-full mb-2" placeholder="Agregue gestion">
                @error('gestion')
                    <span class="text-xs text-red-500">{{ $message }}</span>

                @enderror
                <div class="flex justify-end mt-2">
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                </div>
            </form>
        </div>

    </article>
</section>