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
                                Gráfico de Donut
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('assets/js/Chart.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Area Chart Example
            var userCounts = @json($userCounts);
            var userCountsPre = @json($userCountsPre);

            var añoActual = new Date().getFullYear();
            var ctx = document.getElementById("revenue-chart-canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto",
                        "Septiembre", "Octubre", "Noviembre", "Diciembre"
                    ],
                    datasets: [{
                        label: 'Inscritos',
                        data: userCounts,
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        borderWidth: 1
                    }, {
                        label: 'Pre Inscritos',
                        data: userCountsPre,
                        backgroundColor: 'rgba(255,99,132,0.9)',
                        borderColor: 'rgba(255,99,132,0.8)',
                        borderWidth: 1
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
                    labels: ["Chrome", "IE", "FireFox", "Safari", "Opera", "Navigator"],
                    datasets: [{
                        data: [700, 500, 400, 600, 300, 100],
                        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc',
                            '#d2d6de'
                        ],
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
