@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row task">
                        <div class="col-xl-6 col-sm-4 col-6">
                            <div class="task-summary">
                                <div class="d-flex align-items-baseline">
                                    <h2 class="text-primary count">{{ $detail->nama_kelas }}</h2>
                                    <span>Class</span>
                                </div>
                                <p>{{ $detail->keterangan_perkuliahan . ' - ' . $detail->materi_perkuliahan }}</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-4 col-6">
                            <div class="task-summary">
                                <div class="d-flex align-items-baseline">
                                    <h2 class="text-success count">0</h2>
                                    <span>Mahasiswa</span>
                                </div>
                                <p>Scan Kehadiran</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-4 col-6">
                            <div class="task-summary">
                                <div class="d-flex align-items-baseline">
                                    <h2 class="text-warning count">35</h2>
                                    <span>Mahasiswa</span>
                                </div>
                                <p>Belum Scan Kehadiran</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <h5>Scan Me</h5>
                    {!! QrCode::size(370)->generate($detail->token_perkuliahan) !!} <br>
                    {{ $detail->materi_perkuliahan }}
                </div>
            </div>
        </div>
    </div>
@endsection
