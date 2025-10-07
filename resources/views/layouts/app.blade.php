<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ecommerce</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/koperasi.png') }}">
    <link rel="stylesheet" href="{{ asset('master_template/dist/css/adminlte.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('master_template/plugins/sweetalert2/sweetalert2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('master_template/plugins/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('master_template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" />
    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-info navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Ecommerce Perusahaan XYZ</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user mr-2"></i>{{ auth()->user()->nama }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('profile') }}">
                            <i class="fas fa-user mr-1"></i>Profile
                        </a>
                        <a class="dropdown-item" href="#signout" data-toggle="modal">
                            <i class="fas fa-power-off mr-1"></i>Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
            <a href="/" class="brand-link bg-white">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-bold">Perusahaan XYZ</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-2 pb-1 mb-3 d-flex">
                    <div class="image mt-2">
                        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/user.png') }}" width="200" height="200"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <span class="text-info text-bold d-block">{{ Auth::user()->nama }}</span>
                        <span class="text-info text-sm">{{ auth()->user()->getUser(auth()->user()->id)->role }}</span>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        @include('layouts.sidebar')
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    @yield('content-app')
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <strong>Copyright 2025</strong> by MI
            <div class="float-right">
                <b>Perusahaan XYZ</b>
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <div class="modal fade" id="signout" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd bg-danger">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        Keluar</span>
                        <span class="fw-light">
                            Aplikasi
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>Apakah yakin ingin keluar dari aplikasi ?</p>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <a type="button" class="btn btn-danger" href="{{ route('auth.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Ya
                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('master_template/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('master_template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('master_template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('master_template/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('master_template/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('master_template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    @stack('js')
    <script>
        function numberWithCommas(angka) {
            var rupiah = '';
            angka = angka.replace(/[^0-9]/g, '');
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return rupiah.split('',rupiah.length-1).reverse().join('');
        }
        function convertToRupiah(angka)
        {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }
        $(document).ready(function() {
            $('input.number').keyup(function(event) {
                // skip for arrow keys
                if(event.which >= 37 && event.which <= 40){
                    event.preventDefault();
                }

                $(this).val(function(index, value) {
                    value = value.replace(/,/g,''); // remove commas from existing input
                    return numberWithCommas(value); // add commas back in
                });
            });
        });
    </script>
</body>
</html>
