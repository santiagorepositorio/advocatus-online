<x-instructor-layout >
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>

    <h1 class="text-2xl font-bold">Observaciones del Curso </h1>
        <hr class="mt-2 mb-6">
        @if ($course->observation)
        <div class="text-red-500">{!! $course->observation->body !!}</div>
        @else
        <p>No tiene observaciones</p>
        @endif

        <div class="my-8">
            @livewire('instructor.courses-certificate', ['course' => $course], key('courses-certificate-'.$course->id))
        </div>

</x-instructor-layout>