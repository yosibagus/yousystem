@extends('layout.layout')

@section('sidebar')
    @include('user.sidebar')
@endsection

@section('content')
    <div class="dz-nav-floting">
        <header class="header header-fixed shadow">
            <div class="header-content">
                <div class="left-content">
                    <div class="dz-head-items">
                        <h5 class="title mb-0">Update Akun</h5>
                        <ul class="dz-meta">
                            <li class="dz-item">Masukkan Email untuk menautkan akun. </li>
                        </ul>
                    </div>
                </div>
                <div class="mid-content"></div>
                <div class="right-content">
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
        <main class="page-content space-top p-b60">
            <div class="container">
                @if (Auth::user()->email != '')
                    <form action="{{ url('profil/update-password') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label" for="password">Password Baru</label>
                            <div class="input-group input-mini input-sm">
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm mt-3 btn-thin btn-primary rounded-xl w-100">Update
                            Password</button>
                    </form>
                @else
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label" for="email">Email</label>
                            <div class="input-group input-mini input-sm">
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm mt-3 btn-thin btn-primary rounded-xl w-100">Tautkan
                            Akun</button>
                    </form>
                @endif
            </div>
        </main>
    </div>
@endsection
