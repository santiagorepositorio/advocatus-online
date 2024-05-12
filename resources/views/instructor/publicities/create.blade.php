<x-app-layout>
    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">CREAR NUEVA PUBLICIDAD</h1>
                <hr class="mt-2 mb-6">
                {!! Form::open([
                    'route' => 'instructor.publicities.store',
                    'autocomplete' => 'off',
                    'files' => true,
                    'id' => 'publicitie-form',
                ]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}
                @include('instructor.publicities.partials.form')
                <div class="flex justify-end">
                    {!! Form::submit('Registrar Informacion', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
    <x-slot name="js">       

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('course-form').addEventListener('submit', function(event) {
                    event.preventDefault(); // Evita el envío automático del formulario

                    Swal.fire({
                        title: "Desea crear el Curso?",
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: "Crear",
                        denyButtonText: "Descartar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Si el usuario confirma, envía el formulario
                            this.submit();
                        } else if (result.isDenied) {
                            // Si el usuario niega, no hace nada
                            Swal.fire("No se pudo Crear el Curso", "", "info");
                        }
                    });
                });
            });
        </script>

    </x-slot>
</x-app-layout>
