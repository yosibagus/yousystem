<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Yousystem - Login</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Yosi Bagus Sadar Rasuli">
    <meta name="robots" content="index, follow">
    <meta property="og:image" content="{{ asset('logo.png') }}">

    <meta name="format-detection" content="telephone=no">

    <meta name="twitter:image" content="{{ asset('logo.png') }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Mobile Specific -->
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">

    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" class="main-css" type="text/css" href="{{ asset('xhtml') }}/assets/css/style.css">

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

        <!-- Main Content Start  -->
        <main class="page-content">
            <div class="container py-0">
                <div class="dz-authentication-area">
                    <div class="main-logo">
                        <div class="logo text-center">
                            <img src="{{ asset('logo.png') }}" alt="logo" width="70">
                        </div>
                    </div>
                    <div class="section-head">
                        <h3 class="title">Login</h3>
                        <p>Masukkan username dan password yang sesuai untuk masuk ke dalam aplikasi. </p>
                    </div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="account-section">
                        <form class="m-b30" method="POST" action="">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label" for="useraname">NIM</label>
                                <div class="input-group input-mini input-lg">
                                    <input type="text" id="username" name="username"
                                        class="form-control @error('username') is-invalid @enderror" value="">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="m-b30">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-mini input-lg">
                                    <input type="password" name="password" id="password"
                                        class="form-control dz-password @error('password') is-invalid @enderror">
                                    <span class="input-group-text show-pass">
                                        <i class="icon feather icon-eye-off eye-close"></i>
                                        <i class="icon feather icon-eye eye-open"></i>
                                    </span>

                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-thin btn-lg w-100 btn-primary rounded-xl mb-3">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content End  -->
    </div>
    <!--**********************************
    Scripts
***********************************-->
    <script src="{{ asset('xhtml') }}/assets/js/jquery.js"></script>
    <script src="{{ asset('xhtml') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('xhtml') }}/assets/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
    <script src="{{ asset('xhtml') }}/assets/js/dz.carousel.js"></script><!-- Swiper -->
    <script src="{{ asset('xhtml') }}/assets/js/settings.js"></script>
    <script src="{{ asset('xhtml') }}/assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
    @if (Session::has('success'))
        <script>
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Your imaginary file is safe :)",
                        icon: "error"
                    });
                }
            });
        </script>
    @endif
</body>

</html>
