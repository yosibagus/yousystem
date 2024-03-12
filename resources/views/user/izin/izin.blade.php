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
                        <h5 class="title mb-0">Izin Perkuliahan</h5>
                        <ul class="dz-meta">
                            <li class="dz-item">Silahkan input izin berdasarkan pertemuan. </li>
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
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label" for="token_perkuliahan">Pilih Pertemuan</label>
                        <div class="input-group input-mini input-sm">
                            <select name="token_perkuliahan" class="form-control" id="token_perkuliahan">
                                <option value="">Pilih Pertemuan</option>
                                @foreach ($perkuliahan as $get)
                                    <option value="{{ $get->token_perkuliahan }}">@tanggal($get->tgl_perkuliahan) -
                                        {{ $get->materi_perkuliahan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="keterangan_izin">Alasan Izin</label>
                        <div class="input-group input-mini input-sm">
                            <textarea name="keterangan_izin" id="keterangan_izin" class="form-control" placeholder="" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="file_izin">Lampiran</label>
                        <div class="input-group input-mini input-sm">
                            <input type="file" id="file_izin" name="file_izin" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm mt-3 btn-thin btn-primary rounded-xl w-100">Kirim Permohonan
                        Izin</button>
                </form>
            </div>
        </main>
    </div>
@endsection
