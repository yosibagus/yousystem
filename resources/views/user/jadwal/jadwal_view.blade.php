@extends('layout.layout')

@section('sidebar')
    <header class="header header-fixed shadow">
        <div class="header-content">
            <div class="left-content">
                <div class="dz-head-items">
                    <h5 class="title mb-0">Jadwal</h5>
                    <ul class="dz-meta">
                        <li class="dz-item">Lihat jadwal dan pastikan tepat waktu</li>
                    </ul>
                </div>
            </div>
            <div class="mid-content"></div>
            <div class="right-content">
                <a href="search.html" class="icon font-20">
                    <i class="icon feather icon-calendar"></i>
                </a>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <main class="page-content space-top p-b60">
        <div class="container">
            @if ($jadwal->count() > 0)
                @foreach ($jadwal->get() as $get)
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-sm-12">
                            <div class="dz-wishlist-bx">
                                <div class="dz-info p-0">
                                    <div class="dz-head">
                                        <h6 class="title"><a
                                                href="{{ url('scan/' . $get->token_perkuliahan) }}">{{ $get->keterangan_perkuliahan }}</a>
                                        </h6>
                                        <p>Materi : {{ $get->materi_perkuliahan }}</p>
                                    </div>
                                    <ul class="dz-meta">
                                        <li class="price flex-1">@tanggal($get->tgl_perkuliahan) @jam($get->tgl_perkuliahan) WIB</li>
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
                @endforeach
            @else
                <div class="text-center mt-3">
                    <img src="{{ asset('welcome.png') }}" alt="Tidak ada Jadwal"> <br>
                    Belum Ada Jadwal Perkuliahan
                </div>
            @endif
        </div>
    </main>
@endsection
