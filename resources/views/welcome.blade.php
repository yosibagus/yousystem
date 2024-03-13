<!DOCTYPE html>
<html lang="en">

<head>
    <!--Title-->
    <title>Yousystem</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Yosi Bagus Sadar Rasuli">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="Yousystem">
    <meta name="description" content="Yousystem">

    <meta property="og:title"
        content="YashAdmin -Sales Management System Admin Dashboard Bootstrap HTML Template | DexignZone">
    <meta property="og:description"
        content="The Yash Admin Sales Management System is a robust and intuitive platform designed to streamline sales operations and enhance business productivity. This comprehensive admin dashboard offers a feature-rich environment tailored specifically for managing sales processes effectively.With its modern and responsive design, Yash Admin provides a seamless user experience across various devices and screen sizes. The user interface is highly customizable, allowing administrators to tailor the dashboard to their specific needs and branding requirements.">
    <meta property="og:image" content="https://yosibgsdr.site/img/fedalon_logo.png">

    <meta name="format-detection" content="telephone=no">

    <meta name="twitter:title" content="Yousystem">
    <meta name="twitter:description" content="Yousystem">
    <meta name="twitter:image" content="https://yosibgsdr.site/img/fedalon_logo.png">
    <meta name="twitter:card" content="summary_large_image">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="https://yosibgsdr.site/img/fedalon_logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('') }}vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link class="main-css" href="{{ asset('') }}css/style.css" rel="stylesheet">

</head>

<body>
    <div class="authincation fix-wrapper">
        <div class="container">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="error-page">
                        <div class="error-inner text-center">
                            <div class="dz-error" data-text="404">404</div>
                            <h2 class="error-head mb-0"><i class="fa fa-exclamation-triangle text-warning me-2"></i>The
                                page you were looking for is not found!</h2>
                            <P>You may have mistyped the address or the page may have moved.</P>
                            <a href="{{ url('logout') }}" class="btn btn-secondary">BACK TO HOMEPAGE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
 Scripts
***********************************-->
    <script src="{{ asset('') }}vendor/global/global.min.js"></script>
    <script src="{{ asset('') }}vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('') }}js/deznav-init.js"></script>
    <script src="{{ asset('') }}js/custom.min.js"></script>
    <script src="{{ asset('') }}js/demo.js"></script>
    <script src="{{ asset('') }}js/styleSwitcher.js"></script>
</body>

</html>
