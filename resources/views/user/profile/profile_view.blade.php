@extends('layout.layout')

@section('sidebar')
    @include('user.sidebar')
@endsection

@section('content')
    <div class="dz-nav-floting">
        <header class="header header-fixed">
            <div class="header-content">
                <div class="left-content">
                    <a href="javascript:void(0);" class="icon dz-floating-toggler">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="2" width="20" height="3" rx="1.5" fill="#5F5F5F" />
                            <rect y="18" width="20" height="3" rx="1.5" fill="#5F5F5F" />
                            <rect x="4" y="10" width="20" height="3" rx="1.5" fill="#5F5F5F" />
                        </svg>
                    </a>
                </div>
                <div class="mid-content">
                    <h4 class="title">Profil</h4>
                </div>
                <div class="right-content d-flex align-items-center gap-4">
                    <a href="edit-profile.html">
                        <svg enable-background="new 0 0 461.75 461.75" height="24" viewBox="0 0 461.75 461.75"
                            width="24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m23.099 461.612c2.479-.004 4.941-.401 7.296-1.177l113.358-37.771c3.391-1.146 6.472-3.058 9.004-5.587l226.67-226.693 75.564-75.541c9.013-9.016 9.013-23.63 0-32.645l-75.565-75.565c-9.159-8.661-23.487-8.661-32.645 0l-75.541 75.565-226.693 226.67c-2.527 2.53-4.432 5.612-5.564 9.004l-37.794 113.358c-4.029 12.097 2.511 25.171 14.609 29.2 2.354.784 4.82 1.183 7.301 1.182zm340.005-406.011 42.919 42.919-42.919 42.896-42.896-42.896zm-282.056 282.056 206.515-206.492 42.896 42.896-206.492 206.515-64.367 21.448z"
                                fill="#4A3749"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </header>
        <main class="page-content space-top p-b40">
            <div class="container pt-0">
                <div class="profile-area">
                    <div class="author-bx">
                        <div class="dz-media">
                            <img src="https://static.vecteezy.com/system/resources/previews/024/983/914/non_2x/simple-user-default-icon-free-png.png"
                                alt="">
                        </div>
                        <div class="dz-content">
                            <h3 class="">{{ Auth::user()->name }}</h3>
                            <p class="text-primary">{{ $detail->nama_kelas }}</p>
                        </div>
                    </div>
                    <div class="widget_getintuch pb-15">
                        <ul>
                            <li>
                                <div class="icon-bx">
                                    <svg class="svg-primary" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                        <path
                                            d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                                        <path
                                            d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                                    </svg>
                                </div>
                                <div class="dz-content">
                                    <p class="sub-title">Nomor Pokok Mahasiswa</p>
                                    <h6 class="title">{{ Auth::user()->nim_mahasiswa }}</h6>
                                </div>
                            </li>
                            <li>
                                <div class="icon-bx">
                                    <svg class="svg-primary" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 3H2C1.73478 3 1.48043 3.10536 1.29289 3.29289C1.10536 3.48043 1 3.73478 1 4V20C1 20.2652 1.10536 20.5196 1.29289 20.7071C1.48043 20.8946 1.73478 21 2 21H22C22.2652 21 22.5196 20.8946 22.7071 20.7071C22.8946 20.5196 23 20.2652 23 20V4C23 3.73478 22.8946 3.48043 22.7071 3.29289C22.5196 3.10536 22.2652 3 22 3ZM21 19H3V9.477L11.628 12.929C11.867 13.0237 12.133 13.0237 12.372 12.929L21 9.477V19ZM21 7.323L12 10.923L3 7.323V5H21V7.323Z"
                                            fill="#4A3749"></path>
                                    </svg>
                                </div>
                                <div class="dz-content">
                                    <p class="sub-title">Email</p>
                                    <h6 class="title">{{ Auth::user()->email == '' ? '-' : Auth::user()->email }}</h6>
                                </div>
                            </li>
                            <li>
                                <div class="icon-bx">
                                    <svg class="svg-primary" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                        <path
                                            d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                    </svg>
                                </div>
                                <div class="dz-content">
                                    <p class="sub-title">Angkatan</p>
                                    <h6 class="title">{{ $detail->angkatan }}</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
