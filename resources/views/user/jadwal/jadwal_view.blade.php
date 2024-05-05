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
                        <h5 class="title mb-0">Jadwal</h5>
                        <ul class="dz-meta">
                            <li class="dz-item">Lihat <a href="{{ url('rekap-kehadiran') }}" class="text-success">Rekapitulasi
                                    Absensi <i class="bi bi-arrow-right"></i></a> </li>
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
                @if ($jadwal->count() > 0)
                    @foreach ($jadwal->get() as $get)
                        <div class="row g-3 mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="dz-wishlist-bx">
                                    <div class="dz-info p-0">
                                        <div class="dz-head">
                                            <h6 class="title">
                                                @if (date('Y-m-d') == date('Y-m-d', strtotime($get->tgl_perkuliahan)))
                                                    <a href="{{ url('scan/' . $get->token_perkuliahan) }}">
                                                        <span class="text-success">{{ $get->nama_matakuliah }}:
                                                        </span>{{ $get->keterangan_perkuliahan }}
                                                    </a>
                                                @else
                                                <span class="text-success">{{ $get->nama_matakuliah }}:
                                                </span> {{ $get->keterangan_perkuliahan }}
                                                @endif
                                            </h6>
                                            <p>Materi : {{ $get->materi_perkuliahan }}</p>
                                        </div>
                                        <ul class="dz-meta">
                                            <li class="price flex-1">@tanggal($get->tgl_perkuliahan) @jam($get->tgl_perkuliahan) WIB</li>
                                            <li>
                                                @if (date('Y-m-d') == date('Y-m-d', strtotime($get->tgl_perkuliahan)))
                                                    <a href="{{ url('scan/' . $get->token_perkuliahan) }}"
                                                        class="item-bookmark {{ date('Y-m-d') == date('Y-m-d', strtotime($get->tgl_perkuliahan)) ? 'active' : '' }} style-1">
                                                        <i class="fi fi-rr-qrcode"></i>
                                                    </a>
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
                        Belum Ada Jadwal Perkuliahan
                    </div>
                @endif
            </div>
        </main>
    </div>
@endsection
