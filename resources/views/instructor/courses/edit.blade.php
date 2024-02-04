<x-instructor-layout>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>

    <div class="flex justify-between">
        <h1 class="text-2xl font-bold">Informacion del Curso - </h1> @switch($course->status)
            @case(1)
                <form action="{{ route('instructor.courses.status', $course) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary"> SOLICITAR REVISION</button>
                </form>
            @break

            @case(2)
                <div class="flex justify-end"><span
                        class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                        <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>
                        En Revision
                    </span></div>
            @break

            @case(3)
                PUBLICADO
            @break

            @default
        @endswitch
    </div>
    <hr class="mt-2 mb-6">
    {!! Form::model($course, [
        'route' => ['instructor.courses.update', $course],
        'method' => 'put',
        'files' => true,
    ]) !!}
    @include('instructor.courses.partials.form')
    <div class="flex justify-end">
        @if ($course->status != 2)
            {!! Form::submit('Actualizar Informacion', ['class' => ' btn btn-primary']) !!}
        @endif

    </div>

    {!! Form::close() !!}
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/courses/form.js') }}"></script>
    </x-slot>
</x-instructor-layout>
