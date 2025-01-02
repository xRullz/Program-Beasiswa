<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Beasiswa &mdash; PKN</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/backend/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/backend/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/backend/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/backend/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/backend/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/backend/css/kaiadmin.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link rel="stylesheet" href="../assets/backend/css/demo.css" /> --}}
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="assets/backend/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                            height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>

            @if (Auth::user()->role == 'admin')
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <ul class="nav nav-secondary">
                            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                                <a href="/dashboard">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('users') ? 'active' : '' }}">
                                <a href="/users">
                                    <i class="fas fa-users"></i>
                                    <p>Data User</p>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('scholarships') ? 'active' : '' }}">
                                <a href="/scholarships">
                                    <i class="fas fa-graduation-cap"></i>
                                    <p>Data Beasiswa</p>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('applications') ? 'active' : '' }}">
                                <a href="/applications">
                                    <i class="fas fa-user"></i>
                                    <p>Data Pendaftar</p>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('contacts') ? 'active' : '' }}">
                                <a href="/contacts">
                                    <i class="fas fa-envelope"></i>
                                    <p>Contact</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <ul class="nav nav-secondary">
                            <li class="nav-item {{ request()->is('applications') ? 'active' : '' }}">
                                <a href="/applications">
                                    <i class="fas fa-graduation-cap"></i>
                                    <p>Beasiswa</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif

        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets/backend/img/kaiadmin/logo_light.svg" alt="navbar brand"
                                class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="assets/backend/img/profile.jpg" alt="..."
                                            class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">{{ Auth::user()->name }}</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="assets/backend/img/profile.jpg" alt="image profile"
                                                        class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4>{{ Auth::user()->name }}</h4>
                                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="/logout">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            @yield('content')

            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://pkncoal.com/">
                                    Beasiswa PKN
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | <a href="#"> Kelompok Jeruk</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="assets/backend/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/backend/js/core/popper.min.js"></script>
    <script src="assets/backend/js/core/bootstrap.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Datatables -->
    <script src="assets/backend/js/plugin/datatables/datatables.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="assets/backend/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Chart JS -->
    <script src="assets/backend/js/plugin/chart.js/chart.min.js"></script>
    <!-- jQuery Sparkline -->
    <script src="assets/backend/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
    <!-- Chart Circle -->
    <script src="assets/backend/js/plugin/chart-circle/circles.min.js"></script>
    <!-- Bootstrap Notify -->
    <script src="assets/backend/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <!-- jQuery Vector Maps -->
    <script src="assets/backend/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/backend/js/plugin/jsvectormap/world.js"></script>
    <!-- Sweet Alert -->
    <script src="assets/backend/js/plugin/sweetalert/sweetalert.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="assets/backend/js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    {{-- <script src="assets/backend/js/setting-demo.js"></script>
    <script src="assets/backend/js/demo.js"></script> --}}
    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});
        });
    </script>
    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>
    <script>
        //== Class definition
        var SweetAlert2Demo = (function() {
            //== Demos
            var initDemos = function() {
                //== Sweetalert Demo 1
                $("#alert_demo_1").click(function(e) {
                    swal("Good job!", {
                        buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    });
                });

                //== Sweetalert Demo 2
                $("#alert_demo_2").click(function(e) {
                    swal("Here's the title!", "...and here's the text!", {
                        buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    });
                });

                //== Sweetalert Demo 3
                $("#alert_demo_3_1").click(function(e) {
                    swal("Good job!", "You clicked the button!", {
                        icon: "warning",
                        buttons: {
                            confirm: {
                                className: "btn btn-warning",
                            },
                        },
                    });
                });

                $("#alert_demo_3_2").click(function(e) {
                    swal("Good job!", "You clicked the button!", {
                        icon: "error",
                        buttons: {
                            confirm: {
                                className: "btn btn-danger",
                            },
                        },
                    });
                });

                $("#alert_demo_3_3").click(function(e) {
                    swal("Good job!", "You clicked the button!", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    });
                });

                $("#alert_demo_3_4").click(function(e) {
                    swal("Good job!", "You clicked the button!", {
                        icon: "info",
                        buttons: {
                            confirm: {
                                className: "btn btn-info",
                            },
                        },
                    });
                });

                //== Sweetalert Demo 4
                $("#alert_demo_4").click(function(e) {
                    swal({
                        title: "Good job!",
                        text: "You clicked the button!",
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "Confirm Me",
                                value: true,
                                visible: true,
                                className: "btn btn-success",
                                closeModal: true,
                            },
                        },
                    });
                });

                $("#alert_demo_5").click(function(e) {
                    swal({
                        title: "Input Something",
                        html: '<br><input class="form-control" placeholder="Input Something" id="input-field">',
                        content: {
                            element: "input",
                            attributes: {
                                placeholder: "Input Something",
                                type: "text",
                                id: "input-field",
                                className: "form-control",
                            },
                        },
                        buttons: {
                            cancel: {
                                visible: true,
                                className: "btn btn-danger",
                            },
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    }).then(function() {
                        swal("", "You entered : " + $("#input-field").val(), "success");
                    });
                });

                $("#alert_demo_6").click(function(e) {
                    swal("This modal will disappear soon!", {
                        buttons: false,
                        timer: 3000,
                    });
                });

                $("#alert_demo_7").click(function(e) {
                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        type: "warning",
                        buttons: {
                            confirm: {
                                text: "Yes, delete it!",
                                className: "btn btn-success",
                            },
                            cancel: {
                                visible: true,
                                className: "btn btn-danger",
                            },
                        },
                    }).then((Delete) => {
                        if (Delete) {
                            swal({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                type: "success",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-success",
                                    },
                                },
                            });
                        } else {
                            swal.close();
                        }
                    });
                });

                $("#alert_demo_8").click(function(e) {
                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        type: "warning",
                        buttons: {
                            cancel: {
                                visible: true,
                                text: "No, cancel!",
                                className: "btn btn-danger",
                            },
                            confirm: {
                                text: "Yes, delete it!",
                                className: "btn btn-success",
                            },
                        },
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-success",
                                    },
                                },
                            });
                        } else {
                            swal("Your imaginary file is safe!", {
                                buttons: {
                                    confirm: {
                                        className: "btn btn-success",
                                    },
                                },
                            });
                        }
                    });
                });
            };

            return {
                //== Init
                init: function() {
                    initDemos();
                },
            };
        })();

        //== Class Initialization
        jQuery(document).ready(function() {
            SweetAlert2Demo.init();
        });
    </script>

</body>

</html>
