@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card dz-card" id="accordion-six">
                <div class="card-header flex-wrap d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">Data Perkuliahan Kelas</h4>
                    </div>
                    <a href="{{ url('kuliah_kelas_tambah') }}" class="btn btn-primary btn-sm">Tambah Data</a>
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
                                            <a href="{{ url('kehadiran?token=' . $get->token_perkuliahan) }}">Lihat
                                                Kehadiran <i class="bi bi-arrow-right"></i></a>
                                        </td>
                                        <td>{{ $get->nama_matakuliah }}</td>
                                        <td>
                                            <a href="{{ url('dperkuliahan?token=' . $get->token_perkuliahan) }}"
                                                class="text-primary">{{ $get->keterangan_perkuliahan }} <i
                                                    class="bi bi-arrow-right"></i></a>
                                        </td>
                                        <td>{{ $get->materi_perkuliahan }}</td>
                                        <td>{{ $get->tgl_perkuliahan }}</td>
                                        <td>{{ $get->max_keterlambatan }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
