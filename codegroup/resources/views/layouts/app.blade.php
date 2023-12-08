<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Futebol - @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/general.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/single_advisor_profile.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!--DataTables -->
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/autoFill.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colReorder.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fixedColumns.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fixedHeader.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/keyTable.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rowGroup.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rowReorder.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scroller.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select.dataTables.min.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    &nbsp;&nbsp;&nbsp;<a class="navbar-brand" href="{{ route('home') }}">Futebol</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user-index') }}">Usuários</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('player-index') }} ">Jogadores</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('game-index') }} ">Jogo</a>
                            </li>
                            <!--<li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
                </li>-->
                        </ul>

                        <a class="btn btn-outline-light" href="#"
                            onclick=" $('#logoutModal').modal('show');">Sair</a>

                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <!-- Bootstrap core JavaScript-->
                <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
                <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

                <!-- Core plugin JavaScript-->
                <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

                <!-- Custom scripts for all pages-->
                <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

                <!-- Page level plugins
    <script src="{{ asset('js/chart.min.js') }}"></script>-->

                <!-- Page level custom scripts -->
                <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.autoFill.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
                <script src="{{ asset('js/buttons.colVis.min.js') }}"></script>
                <script src="{{ asset('js/buttons.flash.min.js') }}"></script>
                <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
                <script src="{{ asset('js/buttons.print.min.js') }}"></script>
                <script src="{{ asset('js/jszip.min.js') }}"></script>
                <script src="{{ asset('js/pdfmake.min.js') }}"></script>
                <script src="{{ asset('js/vfs_fonts.js') }}"></script>
                <script src="{{ asset('js/dataTables.colReorder.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.fixedColumns.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.fixedHeader.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.keyTable.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
                <script src="{{ asset('js/responsive.bootstrap.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.rowGroup.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.rowReorder.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.scroller.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
                <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>


                <div class="container-fluid">
                    <br>
                    @include('includes.flash-message')

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {


            //new DataTable('.display');
            var table = $('.display').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                dom: "Bfrtip",
                extend: 'collection',
                colReorder: true,

                "buttons": [

                    {
                        extend: "colvis",
                        text: "Visualizar Colunas"
                    },
                    {
                        extend: 'excelHtml5',
                        text: "Exportar Excel"

                    },
                    {
                        extend: 'pdfHtml5',
                        text: "Exportar PDF"

                    }
                ],
                "language": {
                    "lengthMenu": "Exibindo _MENU_ registros por página",
                    "zeroRecords": "Não temos nada aqui...",
                    "info": "Exibindo página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "search": "Pesquisar:",
                    "paginate": {
                        "first": "Primeira",
                        "last": "Última",
                        "next": "Próxima",
                        "previous": "Anterior"
                    },
                    "infoFiltered": "(filtered from _MAX_ total records)"
                },
                responsive: true,

            });
        });
    </script>
</body>

</html>
