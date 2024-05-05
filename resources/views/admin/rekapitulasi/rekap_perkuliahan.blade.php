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
                                    <th>Materi</th>
                                    <th>Tanggal Kuliah</th>
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
                                            {{ $get->nama_kelas }}
                                        </td>
                                        <td>
                                            {{ $get->nama_matakuliah }} <br>
                                            <small><i class="bi bi-person"></i> {{ $get->name }}</small>
                                        </td>
                                        <td>
                                            {{ $get->keterangan_perkuliahan }} <br>
                                            <small>{{ $get->materi_perkuliahan }}</small>
                                        </td>
                                        <td>{{ $get->max_keterlambatan }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ url('review-perkuliahan?token=' . $get->token_perkuliahan) }}"
                                                    class="btn btn-info shadow btn-xs p-1">
                                                    <i class="bi bi-search"></i> Riview Perkuliahan</a>
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
