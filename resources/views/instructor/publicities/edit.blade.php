<x-app-layout>

    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-bold">EDITAR BANNER </h1>

                </div>
                <hr class="mt-2 mb-6">
                {!! Form::model($publicity, [
                    'route' => ['instructor.publicities.update', $publicity],
                    'method' => 'put',
                    'files' => true,
                ]) !!}
                @include('instructor.publicities.partials.form')
                <div class="flex justify-end">
                    @if ($publicity->status != 3)
                        {!! Form::submit('Actualizar Informacion', ['class' => ' btn btn-primary']) !!}
                    @endif

                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div>
</x-app-layout>
