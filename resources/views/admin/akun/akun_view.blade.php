@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card dz-card" id="accordion-six">
                <div class="card-header flex-wrap d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">Data Mahasiswa</h4>
                    </div>
                    <a class="btn btn-primary btn-sm me-2" href="{{ url('akun-tambah') }}">+ Tambah Mahasiswa</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsiveTable" class="display responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Email</th>
                                    <th>Hint</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($akun as $get)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $get->nim_mahasiswa }}</td>
                                        <td>{{ $get->name }}</td>
                                        <td>{{ $get->nama_kelas }}</td>
                                        <td>{{ $get->email }}</td>
                                        <td>{{ $get->hint }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ url('akun-edit?id=' . $get->id) }}"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <button class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal"
                                                    data-bs-target="#hapus{{ $get->id }}"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="hapus{{ $get->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel"><i
                                                            class="bi bi-exclamation-circle"></i> Peringatan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Data Akun Mahasiswa <span
                                                        class="text-danger"><b>{{ $get->name }}</b></span> akan
                                                    dihapus secara permanen?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ url('akun-hapus/' . $get->id) }}"
                                                        class="btn btn-danger btn-sm">Ya! Hapus <i
                                                            class="bi bi-trash"></i></a>
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
