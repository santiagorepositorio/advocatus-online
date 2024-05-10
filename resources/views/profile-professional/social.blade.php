<x-profile-layout>
    <x-slot name="profile">
        {{ $profile->slug }}
    </x-slot>
    <h1 class="text-2xl font-bold">Redes Sociales - </h1>
    <hr class="mt-2 mb-6">

    <div>
        @livewire('profile.social-profile', ['profile' => $profile], key('social-profile-'.$profile->id))
    </div>
</x-profile-layout>