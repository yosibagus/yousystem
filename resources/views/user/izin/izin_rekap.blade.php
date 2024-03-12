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
                        <h5 class="title mb-0">Rekapitulasi Izin</h5>
                        <ul class="dz-meta">
                            <li class="dz-item">Lihat Status Permohonan Izin. </li>
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
                @if ($izin->count() > 0)
                    @foreach ($izin->get() as $get)
                        <div class="row g-3 mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="dz-wishlist-bx">
                                    <div class="dz-info p-0">
                                        <div class="dz-head">
                                            <h6 class="title">
                                                {{ $get->keterangan_perkuliahan }}
                                            </h6>
                                            <p>Materi : {{ $get->keterangan_izin }}</p>
                                        </div>
                                        <ul class="dz-meta">
                                            <li class="price flex-1">
                                                <small>Tanggal Kirim: @tanggal($get->tgl_izin) @jam($get->tgl_izin) WIB</small>
                                            </li>
                                            <li>
                                                @if ($get->status_izin == '0')
                                                    <span class="badge badge-warning">Proses Validasi</span>
                                                @elseif ($get->status_izin == '200')
                                                    <span class="badge badge-success">Di Izinkan</span>
                                                @else
                                                    <span class="badge badge-danger">Ditolak</span>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center mt-3">
                        <img src="{{ asset('welcome.png') }}" alt="Tidak ada Jadwal"> <br>
                        Belum Ada Izin Perkuliahan
                    </div>
                @endif
            </div>
        </main>
    </div>
@endsection
