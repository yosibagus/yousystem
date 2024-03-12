@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card dz-card" id="accordion-six">
                <div class="card-header flex-wrap d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">Data Kelas</h4>
                    </div>
                    <a class="btn btn-primary btn-sm me-2" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        aria-controls="offcanvasExample">+ Tambah Kelas</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsiveTable" class="display responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th>Nama Kelas</th>
                                    <th>Angkatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($kelas as $get)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            {{ $get->nama_kelas }} <br>
                                            <a class="text-primary"
                                                href="{{ url('import?id=' . $get->id_kelas) }}"><small>Import
                                                    Data
                                                    Mahasiswa <i class="bi bi-arrow-right"></i></small></a>
                                        </td>
                                        <td>{{ $get->angkatan }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal"
                                                    data-bs-target="#hapus{{ $get->id_kelas }}"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="hapus{{ $get->id_kelas }}" data-bs-backdrop="static"
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
                                                    Data Kelas <span
                                                        class="text-danger"><b>{{ $get->nama_kelas }}</b></span> akan
                                                    dihapus secara permanen?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ url('kelas/hapus/' . $get->id_kelas) }}" class="btn btn-danger btn-sm">Ya! Hapus <i
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

    <div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="offcanvasExample">
        <div class="offcanvas-header">
            <h5 class="modal-title" id="#gridSystemModal">Tamah Data Kelas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <div class="form-validation">
                    <form class="needs-validation" novalidate method="POST" action="">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6 mb-3">
                                <label for="nama_kelas" class="form-label">Nama Kelas <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required
                                    placeholder="">
                                <div class="invalid-feedback">
                                    Nama Kelas tidak boleh di kosongi.
                                </div>
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label for="angkatan" class="form-label">Angkatan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="angkatan" name="angkatan" required
                                    placeholder="">
                                <div class="invalid-feedback">
                                    Angkatan tidak boleh di kosongi.
                                </div>
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="keterangan" class="form-label">Keterangan<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required
                                    placeholder="">
                                <div class="invalid-feedback">
                                    Keterangan tidak boleh di kosongi.
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary me-1">Simpan Data</button>
                            <button class="btn btn-danger light ms-1" type="button" data-bs-dismiss="offcanvas"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
