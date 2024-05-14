<x-jet-action-section>
    <x-slot name="title">
        {{ __('Perfil Profesional') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Administre su perfil para cualquier Edicion o Eliminacion') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Gestione su Cuenta Profesional') }}
        </div>



        <div class="mt-5">
            <x-button-primary wire:click="confirmUserProfessional" wire:loading.attr="disabled" color="blue">
                Gestionar Perfil Profesional
            </x-button-primary>

            
            {{-- <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-jet-danger-button> --}}

        </div>

        <!-- Create Professional Profile Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserProfessional">
            <x-slot name="title">
                {{ __('Create Perfil Profesional') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Si estas seguro de crear tu perfil profesional debes confirmar con tu password') }}

                <div class="mt-4" x-data="{}"
                    x-on:confirming-create-user.window="setTimeout(() => $refs.password.focus(), 250)">
                   
                   
                    <x-jet-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}"
                        x-ref="password" wire:model.defer="password" wire:keydown.enter="createProfessional" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserProfessional')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>                
                <x-button-primary class="ml-3" wire:click="createProfessional" wire:loading.attr="disabled" >
                    Crear Perfil Profesional
                </x-button-primary>
            </x-slot>
        </x-jet-dialog-modal>
        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Delete Account') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

                <div class="mt-4" x-data="{}"
                    x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                   
                   
                    <x-jet-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}"
                        x-ref="password" wire:model.defer="password" wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Delete Account') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
