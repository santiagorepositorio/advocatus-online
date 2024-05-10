<x-profile-layout>
    <x-slot name="profile">
        {{ $profile->slug }}
    </x-slot>
    <h1 class="text-2xl font-bold">Estudios Realizados - </h1>
    <hr class="mt-2 mb-6">

    <div>
        @livewire('profile.education-profile', ['profile' => $profile], key('education-profile-'.$profile->id))
    </div>
</x-profile-layout>