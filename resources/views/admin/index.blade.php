@extends('adminlte::page')

@section('title', 'Advocatus Online')

@section('content_header')
    <h1>Penel Central</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $cantCourses }}</h3>
                            <p>Cursos Publicados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="{{ route('admin.courses.courses-users') }}" class="small-box-footer">Más Información <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $cantidadUsuariosNuevos }}</h3>
                            <p>Usuarios Nuevos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="{{ route('admin.customers.index') }}" class="small-box-footer">Más Información <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $cantidadUsuariosRegistrados }}</h3>
                            <p>Usuarios Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="{{ route('admin.customers.index') }}" class="small-box-footer">Más Información <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $cantidadUsuariosInactivos }}</h3>
                            <p>Usuarios Inactivos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-minus"></i>
                        </div>
                        <a href="{{ route('admin.customers.index') }}" class="small-box-footer">Más Información <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-8 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-area mr-1"></i>
                                Inscritos por Mes de la gestion: {{ $year }}
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <canvas id="revenue-chart-canvas" height="300"></canvas>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>
                <section class="col-lg-4 connectedSortable">


                    <!-- Donut Chart -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Porcentaje de Clientes
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <canvas id="sales-chart-canvas" height="300"></canvas>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>


            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                    <!-- /.mas requeridos -->

                    <div class="card">
                        <div class="card-header" style="background-color: #007018; color: white; font-weight: bold;">
                            <h3 class="card-title">Los 4 Cursos más Requeridos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 65%;">Título</th>
                                        <th style="width: 20%;">Estrellas</th>
                                        <th style="width: 10%;">Inscritos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($topSubscribedCourses as $course)
                                        <tr class="align-items-center reduced-height">
                                            <td>{{ $course->id }}</td>
                                            <td class="text-truncate"><a
                                                    href="{{ route('courses.show', $course) }}">{{ $course->title }}</a>
                                            </td>
                                            <td>
                                                <div class="d-flex text-truncate">
                                                    <ul class="d-flex list-unstyled text-sm">
                                                        <li class="mr-1"><i
                                                                class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}"></i>
                                                        </li>
                                                        <li class="mr-1"><i
                                                                class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}"></i>
                                                        </li>
                                                        <li class="mr-1"><i
                                                                class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}"></i>
                                                        </li>
                                                        <li class="mr-1"><i
                                                                class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}"></i>
                                                        </li>
                                                        <li class="mr-1"><i
                                                                class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow' : 'gray' }}"></i>
                                                        </li>
                                                        <li class="mr-1"><span
                                                                class="bg-primary text-white text-xs font-semibold mr-2 px-2 py-0.5 rounded"
                                                                style="width: 1.5rem; color: #999;">{{ $course->rating }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-muted text-truncate"><i
                                                        class="fas fa-users"></i>({{ $course->students_count }})</p>
                                            </td>
                                        </tr>


                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                No hay ningun Course Requerido
                                            </td>
                                        </tr>
                                    @endforelse
                                    {{-- <tr>
                                        <td>2.</td>
                                        <td>Clean database</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-warning" style="width: 70%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-warning">70%</span></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Cron job running</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">30%</span></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Fix and squish bugs</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-success" style="width: 90%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">90%</span></td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="background-color: #FF6666; color: white; font-weight: bold;">
                            <h3 class="card-title">Los 4 Cursos menos Requeridos</h3>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 65%;">Título</th>
                                        <th style="width: 20%;">Estrellas</th>
                                        <th style="width: 10%;">Inscritos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bottomSubscribedCourses as $course)
                                        <tr class="align-items-center reduced-height">
                                            <td>{{ $course->id }}</td>
                                            <td class="text-truncate"><a
                                                    href="{{ route('courses.show', $course) }}">{{ $course->title }}</a>
                                            </td>
                                            <td>
                                                <div class="d-flex text-truncate">
                                                    <ul class="d-flex list-unstyled text-sm">
                                                        <li class="mr-1"><i
                                                                class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}"></i>
                                                        </li>
                                                        <li class="mr-1"><i
                                                                class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}"></i>
                                                        </li>
                                                        <li class="mr-1"><i
                                                                class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}"></i>
                                                        </li>
                                                        <li class="mr-1"><i
                                                                class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}"></i>
                                                        </li>
                                                        <li class="mr-1"><i
                                                                class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow' : 'gray' }}"></i>
                                                        </li>
                                                        <li class="mr-1"><span
                                                                class="bg-primary text-white text-xs font-semibold mr-2 px-2 py-0.5 rounded"
                                                                style="width: 1.5rem; color: #999;">{{ $course->rating }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-muted text-truncate"><i
                                                        class="fas fa-users"></i>({{ $course->students_count }})</p>
                                            </td>
                                        </tr>


                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                No hay ningun Course Requerido
                                            </td>
                                        </tr>
                                    @endforelse
                                    {{-- <tr>
                                        <td>2.</td>
                                        <td>Clean database</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-warning" style="width: 70%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-warning">70%</span></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Cron job running</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">30%</span></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Fix and squish bugs</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-success" style="width: 90%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">90%</span></td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- <script src="{{ asset('assets/js/Chart.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            // Area Chart Example
            var userCounts = @json($userCounts);
            var userCountsPre = @json($userCountsPre);
            var userCountsCulminado = @json($userCountsCulminado);
            var porcentajes = @json($porcentajes);

            var añoActual = new Date().getFullYear();
            var ctx = document.getElementById("revenue-chart-canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto",
                        "Septiembre", "Octubre", "Noviembre", "Diciembre"
                    ],
                    datasets: [{
                        label: 'Pre Inscritos',
                        data: userCountsPre,
                        backgroundColor: 'rgba(255,99,132,0.9)',
                        borderColor: 'rgba(255,99,132,0.8)',
                        borderWidth: 1
                    }, {
                        label: 'Inscritos',
                        data: userCounts,
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        borderWidth: 2
                    }, {
                        label: 'Culminados',
                        data: userCountsCulminado,
                        backgroundColor: 'rgba(75, 192, 192, 0.9)',
                        borderColor: 'rgba(75, 192, 192, 0.8)',
                        borderWidth: 3
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: true
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: false
                            }
                        }]
                    }
                }
            });


            // Donut Chart Example
            var ctx = document.getElementById("sales-chart-canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Registrados", "Nuevos", "Inactivos", "Regulares"],
                    datasets: [{
                        data: porcentajes,
                        backgroundColor: ['#36a2eb', '#9966ff','#ff6384' , '#ffce56', ],
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false
                    },
                }
            });
        });
    </script>
@stop
