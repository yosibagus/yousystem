<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Yousystem</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Yosi Bagus Sadar Rasuli">
    <meta name="robots" content="index">
    <meta name="keywords" content="YouSystem">
    <meta name="description" content="Yousystem">
    <meta property="og:title" content="Yousystem">
    <meta property="og:description" content="YouSystem">
    <meta property="og:image" content="https://yosibgsdr.site/img/fedalon_logo.png">
    <meta name="format-detection" content="telephone=no">
    <meta name="twitter:title" content="Yousystem">
    <meta name="twitter:description"content="Yousystem">

    <meta name="twitter:image" content="https://yosibgsdr.site/img/fedalon_logo.png">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Mobile Specific -->
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">

    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo.png') }}">

    <!-- PWA Version -->
    {{-- <link rel="manifest" href="manifest.json"> --}}

    <!-- Global CSS -->
    <link href="{{ asset('xhtml') }}/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('xhtml') }}/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('xhtml') }}/assets/css/style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&amp;family=Raleway:wght@300;400;500&amp;display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div id="preloader">
            <div class="loader">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <!-- Preloader end-->

        @yield('sidebar')

        @yield('content')

        @include('layout.menu_bar')

    </div>

    @include('layout.script')

    @yield('script')

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Pemberitahuan",
                text: "{{ session('success') }}",
                icon: "success",
                footer: '<img src="{{ asset('logo.png') }}" width="25"> <span style="margin-left:5px;margin-top:3px;">YouSystem</span>'
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: "Gagal!",
                text: "{{ session('error') }}",
                icon: "error",
                footer: '<img src="{{ asset('logo.png') }}" width="25"> <span style="margin-left:5px;margin-top:3px;">YouSystem</span>'
            });
        </script>
    @endif
</body>

</html>
