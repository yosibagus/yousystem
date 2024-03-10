@extends('layout.layout')

@section('sidebar')
    @include('user.sidebar')
@endsection

@section('content')
    <div class="dz-nav-floting">
        <!-- Header -->
        <header class="header py-2 mx-auto">
            <div class="header-content">
                <div class="left-content">
                    <div class="info">
                        <p class="text m-b10 mb-0">Selamat Pagi</p>
                        <h4 class="title">{{ Auth::user()->name }}</h4>
                    </div>
                </div>
                <div class="mid-content"></div>
                <div class="right-content d-flex align-items-center gap-4">
                    <a href="https://yosibgsdr.site/" class="">
                        <img src="https://yosibgsdr.site/img/fedalon_logo.png" width="40" alt="">
                    </a>
                    <a href="javascript:void(0);" class="icon dz-floating-toggler">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="2" width="20" height="3" rx="1.5" fill="#5F5F5F" />
                            <rect y="18" width="20" height="3" rx="1.5" fill="#5F5F5F" />
                            <rect x="4" y="10" width="20" height="3" rx="1.5" fill="#5F5F5F" />
                        </svg>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header -->

        <!-- Main Content Start -->
        <main class="page-content bg-white p-b60" style="margin-top: -35px">
            <div class="container">
                <!-- Overlay Card -->
                <div class="swiper overlay-swiper1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="dz-card-overlay style-1">
                                <div class="dz-media" style="text-align: center;">
                                    <a href="product-detail.html">
                                        <img src="{{ url('xhtml') }}/assets/images/featured/laravel.png"
                                            style="width: 100px;" alt="image">
                                    </a>
                                </div>
                                <div class="dz-info">
                                    <h6 class="title"><a href="product-detail.html">Apa itu laravel?</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="dz-card-overlay style-1">
                                <div class="dz-media" style="text-align: center;">
                                    <a href="product-detail.html">
                                        <img src="{{ url('xhtml') }}/assets/images/featured/boot.png" style="width: 100px;"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="dz-info">
                                    <h6 class="title"><a href="product-detail.html">Framework CSS</a></h6>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="dz-card-overlay style-1">
                                <div class="dz-media" style="text-align: center;">
                                    <a href="product-detail.html">
                                        <img src="{{ url('xhtml') }}/assets/images/featured/html.png" style="width: 100px;"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="dz-info">
                                    <h6 class="title"><a href="product-detail.html">Kerangka Web</a></h6>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="dz-card-overlay style-1">
                                <div class="dz-media" style="text-align: center;">
                                    <a href="product-detail.html">
                                        <img src="{{ url('xhtml') }}/assets/images/featured/sql.png" style="width: 100px;"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="dz-info">
                                    <h6 class="title"><a href="product-detail.html">Apa itu SQL?</a></h6>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="dz-card-overlay style-1">
                                <div class="dz-media" style="text-align: center;">
                                    <a href="product-detail.html">
                                        <img src="{{ url('xhtml') }}/assets/images/featured/git.png" style="width: 100px;"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="dz-info">
                                    <h6 class="title"><a href="product-detail.html">Kenalilah Git</a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Overlay Card -->

                <!-- Categories Swiper -->
                <div class="title-bar mb-0">
                    <h5 class="title">Detail</h5>
                </div>
                <div class="swiper categories-swiper dz-swiper m-b20">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="dz-categories-bx">
                                <div class="icon-bx">
                                    <a href="products.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                                            <path
                                                d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z" />
                                            <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z" />
                                            <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z" />
                                            <path
                                                d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z" />
                                            <path d="M12 9h2V8h-2z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="dz-content">
                                    <h6 class="title"><a href="products.html">Kehadiran</a></h6>
                                    <span class="menus text-primary">2 Scan</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="dz-categories-bx">
                                <div class="icon-bx">
                                    <a href="products.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                            <path
                                                d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z" />
                                            <path
                                                d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="dz-content">
                                    <h6 class="title"><a href="products.html">Tidak Hadir</a></h6>
                                    <span class="menus text-primary">0 Scan</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="dz-categories-bx">
                                <div class="icon-bx">
                                    <a href="products.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-envelope-check" viewBox="0 0 16 16">
                                            <path
                                                d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z" />
                                            <path
                                                d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="dz-content">
                                    <h6 class="title"><a href="products.html">Izin</a></h6>
                                    <span class="menus text-primary">0 Di Izinkan</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="dz-categories-bx">
                                <div class="icon-bx">
                                    <a href="products.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-percent" viewBox="0 0 16 16">
                                            <path
                                                d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0M4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5m7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="dz-content">
                                    <h6 class="title"><a href="products.html">Prosentase</a></h6>
                                    <span class="menus text-primary">100%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Categories Swiper -->


                <!-- Featured Beverages -->
                <div class="title-bar">
                    <h5 class="title">Jadwal Hari Ini</h5>
                    <a href="products.html">Lihat Semua</a>
                </div>


                <div class="row g-3">
                    <div class="col-12 col-sm-12">
                        <div class="dz-wishlist-bx">
                            <div class="dz-info">
                                <div class="dz-head">
                                    <h6 class="title"><a href="product-detail.html">Pertemuan 1</a>
                                    </h6>
                                    <p>Materi : Dasar-dasar Laravel 10</p>
                                </div>
                                <ul class="dz-meta">
                                    <li class="price flex-1">09:00 WIB</li>
                                    <li>
                                        <a href="javascript:void(0);" class="item-bookmark active style-1">
                                            <i class="fi fi-rr-qrcode"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Featured Beverages -->
            </div>
        </main>
    </div>
    <!-- Main Content End -->
@endsection
