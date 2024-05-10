<x-profile-layout>
    <x-slot name="profile">
        {{ $profile->slug }}
    </x-slot>
    <h1 class="text-2xl font-bold">Experiensas Laborales - </h1>
    <hr class="mt-2 mb-6">

    <div>
        @livewire('profile.experience-profile', ['profile' => $profile], key('experience-profile-'.$profile->id))
    </div>
</x-profile-layout>