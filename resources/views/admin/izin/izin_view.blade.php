@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card dz-card" id="accordion-six">
                <div class="card-header flex-wrap d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">Data Permohonan Izin</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsiveTable" class="display responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th>Nama </th>
                                    <th>Matakuliah (materi)</th>
                                    <th>Keterangan</th>
                                    <th>Lampiran</th>
                                    <th>Tanggal Izin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($izin as $get)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            {{ $get->name }} <br>
                                            NIM. {{ $get->nim_mahasiswa }}
                                        </td>
                                        <td>
                                            {{ $get->nama_matakuliah }} <br>
                                            <small>{{ $get->keterangan_perkuliahan }} / @tanggal($get->tgl_perkuliahan) @jam($get->tgl_perkuliahan)
                                                WIB</small>
                                        </td>
                                        <td>{{ $get->keterangan_izin }}</td>
                                        <td>{{ $get->file_izin }}</td>
                                        <td>@tanggal($get->tgl_izin) @jam($get->tgl_izin) WIB</td>
                                        <td>
                                            @if ($get->status_izin == 0)
                                                <button data-bs-toggle="modal" data-bs-target="#terima{{ $get->id_izin }}"
                                                    class="badge badge-sm badge-success"><i class="bi bi-check2"></i>
                                                    Terima</button>
                                                <button data-bs-toggle="modal" data-bs-target="#tolak{{ $get->id_izin }}"
                                                    class="badge badge-sm badge-danger"><i class="bi bi-x-lg"></i>
                                                    Tolak</button>
                                            @else
                                                @if ($get->status_izin == 200)
                                                    <span class="text-success"><i class="bi bi-check2"></i> Diterima</span>
                                                @else
                                                    <span class="text-danger"><i class="bi bi-x-lg"></i> Ditolak</span>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>

                                    {{-- diterima --}}
                                    <div class="modal fade" id="terima{{ $get->id_izin }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Terima Permohonan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menerima Permohonan Izin yang di ajukan oleh
                                                    <b>{{ $get->name }} ?</b>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ url('verifikasi/200') }}" method="post">
                                                        @csrf
                                                        <div hidden>
                                                            <input type="text" name="id_izin"
                                                                value="{{ $get->id_izin }}">
                                                            <input type="text" name="mahasiswa_id"
                                                                value="{{ $get->mahasiswa_id }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-sm btn-success">Terima
                                                            Permohonan
                                                            Izin</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ditolak --}}
                                    <div class="modal fade" id="tolak{{ $get->id_izin }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Terima Permohonan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menolak Permohonan Izin yang di ajukan oleh
                                                    <b>{{ $get->name }} ?</b>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ url('verifikasi/404') }}" method="post">
                                                        @csrf
                                                        <div hidden>
                                                            <input type="text" name="id_izin"
                                                                value="{{ $get->id_izin }}">
                                                            <input type="text" name="mahasiswa_id"
                                                                value="{{ $get->mahasiswa_id }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-sm btn-danger">Tolak
                                                            Permohonan
                                                            Izin</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
