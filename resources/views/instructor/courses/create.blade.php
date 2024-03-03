<x-app-layout>
    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">CREAR NUEVO CURSO</h1>
                <hr class="mt-2 mb-6">
                {!! Form::open([
                    'route' => 'instructor.courses.store',
                    'autocomplete' => 'off',
                    'files' => true,
                    'id' => 'course-form',
                ]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}
                @include('instructor.courses.partials.form')
                <div class="flex justify-end">
                    {!! Form::submit('Registrar Informacion', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/courses/form.js') }}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('course-form').addEventListener('submit', function(event) {
                    event.preventDefault(); // Evita el envío automático del formulario

                    Swal.fire({
                        title: "Do you want to save the changes?",
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: "Save",
                        denyButtonText: "Don't save"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Si el usuario confirma, envía el formulario
                            this.submit();
                        } else if (result.isDenied) {
                            // Si el usuario niega, no hace nada
                            Swal.fire("Changes are not saved", "", "info");
                        }
                    });
                });
            });
        </script>

    </x-slot>
</x-app-layout>
