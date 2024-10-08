@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card dz-card" id="accordion-six">
                <div class="card-header flex-wrap d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">Data Perkuliahan Kelas</h4>
                    </div>
                    <a href="{{ url('kuliah-kelas-tambah') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsiveTable" class="display responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th>Nama Kelas</th>
                                    <th>Matakuliah</th>
                                    <th>Keterangan</th>
                                    <th>Materi</th>
                                    <th>Tanggal Kuliah</th>
                                    <th>Keterlambatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($perkuliahan as $get)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            {{ $get->nama_kelas }} <br>
                                            <a target="_blank" href="{{ url('kehadiran?token=' . $get->token_perkuliahan) }}">Lihat
                                                Kehadiran <i class="bi bi-arrow-right"></i></a>
                                        </td>
                                        <td>
                                            {{ $get->nama_matakuliah }} <br>
                                            <small><i class="bi bi-person"></i> {{ $get->name }}</small>
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ url('detail-perkuliahan?token=' . $get->token_perkuliahan) }}"
                                                class="text-primary">{{ $get->keterangan_perkuliahan }} <i
                                                    class="bi bi-arrow-right"></i></a>
                                        </td>
                                        <td>{{ $get->materi_perkuliahan }}</td>
                                        <td>{{ $get->tgl_perkuliahan }}</td>
                                        <td>{{ $get->max_keterlambatan }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ url('kuliah-kelas-edit?token=' . $get->token_perkuliahan) }}"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <button class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal"
                                                    data-bs-target="#hapus_kelas{{ $get->id_perkuliahan }}"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="hapus_kelas{{ $get->id_perkuliahan }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel"><i
                                                            class="bi bi-exclamation-circle"></i> Pemberitahuan!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Data Perkuliahan Kelas <b>{{ $get->nama_kelas }} - </b>
                                                    <b>{{ $get->materi_perkuliahan }} </b> Akan Dihapus?
                                                    <br>
                                                    <span class="text-danger">*Menghapus data ini juga berpengaruh pada data
                                                        Absensi Mahasiswa dan Data
                                                        Izin Perkuliahan</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ url('hapus-perkuliahan/' . $get->token_perkuliahan) }}"
                                                        type="button" class="btn btn-sm btn-danger"><i
                                                            class="bi bi-trash"></i> Ya! Hapus </a>
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
