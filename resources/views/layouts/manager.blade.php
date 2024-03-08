<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('assets/img/logomt.png') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['{{ asset('assets/css/fonts.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/azzara.min.css') }}">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">

    <title>HRD-MYTAX</title>

</head>

<body>
    <div class="wrapper">
        <div class="main-header" data-background-color="purple">
            <!-- Logo Header -->
            <div class="logo-header">
                <a href="{{ route('manager.home') }}" class="logo mt-3">
                    <h3 class="text-white mt-2 nowrap">PT My Tax Indonesia</h2>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg">

                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        @php
                            $userId = Auth::id();

                            $cuti = DB::table('cutis')
                                ->where('status', 'diproses')
                                ->where('user_id', $userId)
                                ->orderBy('id')
                                ->get();

                            $budget = DB::table('budgets')
                                ->where('status', 'diproses')
                                ->where('user_id', $userId)
                                ->orderBy('id')
                                ->get();

                            $pinjaman = DB::table('pinjamen')
                                ->where('status', 'diproses')
                                ->where('user_id', $userId)
                                ->orderBy('id')
                                ->get();

                            $lembur = DB::table('lemburs')
                                ->where('status', 'diproses')
                                ->where('user_id', $userId)
                                ->orderBy('id')
                                ->get();
                        @endphp

                        <li class="nav-item dropdown hidden-caret">
                            <a style="margin-right:30px;" class="nav-link dropdown-toggle" href="#"
                                id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                @if (count($cuti) + count($budget) + count($pinjaman) + count($lembur) == 0)
                                @else
                                    <span class="notification">
                                        {{ count($cuti) + count($budget) + count($pinjaman) + count($lembur) }}
                                    </span>
                                @endif
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">Kamu punya
                                        {{ count($cuti) + count($budget) + count($pinjaman) + count($lembur) }}
                                        Notifikasi yang masih diproses</div>
                                </li>
                                <li>
                                    <div class="notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            @if (count($cuti) > 0)
                                                <a href="{{ route('user.cuti.index') }}" class="block">
                                                    <div class="notif-icon notif-primary"> <i class="fas fa-bed"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">{{ count($cuti) }} - cuti</span>
                                                        <span
                                                            class="time">{{ \Carbon\Carbon::parse($cuti[0]->created_at)->diffForHumans() }}</span>
                                                    </div>
                                                </a>
                                            @endif
                                            @if (count($budget) > 0)
                                                <a href="{{ route('user.budget.index') }}" class="block">
                                                    <div class="notif-icon notif-primary"> <i
                                                            class="fas fa-dollar-sign"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">{{ count($budget) }} - budget</span>
                                                        <span
                                                            class="time">{{ \Carbon\Carbon::parse($budget[0]->created_at)->diffForHumans() }}</span>
                                                    </div>
                                                    <a>
                                            @endif
                                            @if (count($pinjaman) > 0)
                                                <a href="{{ route('user.pinjam.index') }}" class="block">
                                                    <div class="notif-icon notif-primary"> <i
                                                            class="fas fa-money-bill-wave"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">{{ count($pinjaman) }} - pinjaman</span>
                                                        <span
                                                            class="time">{{ \Carbon\Carbon::parse($pinjaman[0]->created_at)->diffForHumans() }}</span>
                                                    </div>
                                                    <a>
                                            @endif
                                            @if (count($lembur) > 0)
                                                <a href="{{ route('manager.lembur.index') }}" class="block">
                                                    <div class="notif-icon notif-primary"> <i class="fas fa-clock"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">{{ count($lembur) }} - lembur</span>
                                                        <span
                                                            class="time">{{ \Carbon\Carbon::parse($lembur[0]->created_at)->diffForHumans() }}</span>
                                                    </div>
                                                    <a>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset('assets/img/logomt.png') }}" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" id="logout"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            @php
                $userId = Auth::id();

                $userData = DB::table('users')->where('id', $userId)->first();
            @endphp
            <div class="sidebar-background"></div>
            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="{{ asset('foto_karyawan/' . $userData->foto_karyawan) }}" alt="..."
                                class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    <span class="user-level">
                                        <h3>{{ $userData->name }}</h3>
                                    </span>

                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>
                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    <li>
                                        <a href="{{ route('manager.profile') }}">
                                            <span class="link-collapse">My Profile</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav">
                        <li
                            class="nav-item {{ request()->routeIs('manager.home') || request()->routeIs('manager.edit') || request()->routeIs('manager.create') ? 'active' : '' }}">
                            <a href="{{ route('manager.home') }}">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('absen.index') ? 'active' : '' }}">
                            <a href="{{ route('absen.index') }}">
                                <i class="fas fa-clock"></i>
                                <p>Absen</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('manager.payroll') ? 'active' : '' }}">
                            <a href="{{ route('manager.payroll') }}">
                                <i class="fas fa-money-check-alt"></i>
                                <p>Slip Gaji</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('manager.index') ? 'active' : '' }}">
                            <a href="{{ route('manager.index') }}">
                                <i class="fas fa-chart-bar"></i>
                                <p>Evaluasi Karyawan</p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('dinas.index') || request()->routeIs('dinas.create') || request()->routeIs('dinas.edit') ? 'active' : '' }}">
                            <a href="{{ route('dinas.index') }}">
                                <i class="fas fa-briefcase"></i>
                                <p>Perjalanan Dinas</p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('budget.index') || request()->routeIs('budget.create') || request()->routeIs('budget.edit') ? 'active' : '' }}">
                            <a href="{{ route('budget.index') }}">
                                <i class="fas fa-shopping-cart"></i>
                                <p>Permintaan Barang / Jasa</p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('manager.pinjam.index') || request()->routeIs('manager.pinjam.create') || request()->routeIs('manager.pinjam.edit') ? 'active' : '' }}">
                            <a href="{{ route('manager.pinjam.index') }}">
                                <i class="fas fa-money-bill"></i>
                                <p>Pinjaman Karyawan</p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('cuti.index') || request()->routeIs('cuti.create') || request()->routeIs('cuti.edit') ? 'active' : '' }}">
                            <a href="{{ route('cuti.index') }}">
                                <i class="fas fa-calendar-times"></i>
                                <p>Pengajuan Cuti</p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('manager.lembur.index') || request()->routeIs('manager.lembur.create') || request()->routeIs('manager.lembur.edit') ? 'active' : '' }}">
                            <a href="{{ route('manager.lembur.index') }}">
                                <i class="fas fa-clock"></i>
                                <p>Lembur Karyawan</p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('reimbursements.index') || request()->routeIs('reimbursements.create') || request()->routeIs('reimbursements.edit') ? 'active' : '' }}">
                            <a href="{{ route('reimbursements.index') }}">
                                <i class="fas fa-receipt"></i>
                                <p>Reimbursement</p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('kpi.index') || request()->routeIs('kpi.edit') ? 'active' : '' }}">
                            <a href="{{ route('kpi.index') }}">
                                <i class="fas fa-chart-line"></i>
                                <p>KPI Karyawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('logout') }}" id="logout"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Custom template | don't include it in your project! -->
    <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
            <div class="switcher">
                <div class="switch-block">
                    <h4>Topbar</h4>
                    <div class="btnSwitch">
                        <button type="button" class="changeMainHeaderColor" data-color="blue"></button>
                        <button type="button" class="selected changeMainHeaderColor" data-color="purple"></button>
                        <button type="button" class="changeMainHeaderColor" data-color="light-blue"></button>
                        <button type="button" class="changeMainHeaderColor" data-color="green"></button>
                        <button type="button" class="changeMainHeaderColor" data-color="orange"></button>
                        <button type="button" class="changeMainHeaderColor" data-color="red"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Background</h4>
                    <div class="btnSwitch">
                        <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                        <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                        <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-toggle">
            <i class="flaticon-settings"></i>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    {{-- js bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="{{ asset('assets/js/plugin/moment/moment.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Toggle -->
    <script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

    <!-- Google Maps Plugin -->
    <script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Azzara JS -->
    <script src="{{ asset('assets/js/ready.min.js') }}"></script>

    <!-- Azzara DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets/js/setting-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});

            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-control"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });
                    });
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');

            });
        });
    </script>
    <script>
        //== Class definition
        var SweetAlert2Demo = function() {

            //== Demos
            var initDemos = function() {

                $('#alert_demo_3_3').click(function(e) {
                    swal("Good job!", "You clicked the button!", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                });
                $('#alert_demo_3_4').click(function(e) {
                    swal("DELETE Data Berhasil !", {
                        icon: "error",
                        buttons: {
                            confirm: {
                                className: 'btn btn-danger'
                            }
                        },
                    });
                });
                $('#logout').click(function(e) {
                    swal("Berhasil Logout !", {
                        icon: "error",
                        buttons: {
                            confirm: {
                                className: 'btn btn-danger'
                            }
                        },
                    });
                });
                $('#alert_demo_3_5').click(function(e) {
                    swal("Good job!", "Data Berhasil Diupdate", {
                        icon: "info",
                        buttons: {
                            confirm: {
                                className: 'btn btn-info'
                            }
                        },
                    });
                });
            };

            return {
                //== Init
                init: function() {
                    initDemos();
                },
            };
        }();

        //== Class Initialization
        jQuery(document).ready(function() {
            SweetAlert2Demo.init();
        });
    </script>

</body>

</html>
