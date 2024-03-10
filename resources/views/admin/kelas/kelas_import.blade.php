@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row task">
                        <div class="col-xl-3 col-sm-4 col-6">
                            <div class="task-summary">
                                <div class="d-flex align-items-baseline">
                                    <h2 class="text-primary count">{{ $kelas->nama_kelas }}</h2>
                                    <span>Class</span>
                                </div>
                                <p>Nama Kelas</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-4 col-6">
                            <div class="task-summary">
                                <div class="d-flex align-items-baseline">
                                    <h2 class="text-purple count">{{ $kelas->angkatan }}</h2>
                                    <span>Data</span>
                                </div>
                                <p>Angkatan</p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                            <div class="task-summary">
                                <div class="d-flex align-items-baseline">
                                    <h2 class="text-warning count">{{ $mhs }}</h2>
                                    <span>Mahasiswa</span>
                                </div>
                                <p>Dalam Kelas</p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                            <div class="task-summary">
                                <div class="d-flex align-items-baseline">
                                    <h2 class="text-danger count">{{ $nonaktif }}</h2>
                                    <span>Akun</span>
                                </div>
                                <p>Di Tangguhkan</p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                            <div class="task-summary">
                                <div class="d-flex align-items-baseline">
                                    <h2 class="text-success count">{{ $aktif }}</h2>
                                    <span>Akun</span>
                                </div>
                                <p>Aktif</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Import Data Mahasiswa</h4>

                    <div class="form-validation">
                        <form class="needs-validation" novalidate method="POST" action="{{ url('import_ac') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id_kelas" hidden value="{{ $_GET['id'] }}">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 form-group">
                                        <label class="col-lg-4 col-form-label required" for="file_import">File Excel
                                        </label>
                                        <input type="file" class="form-control" id="file_import" name="file_import"
                                            placeholder="" required>
                                        <div class="invalid-feedback">
                                            Masukkan File Terlebih Dahulu.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-3 form-group">
                                        <label class="col-lg-4 col-form-label required" for="name">Created At
                                        </label>
                                        <input type="text" class="form-control" value="{{ date('d-m-Y') }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-lg-8">
                                    <a href="{{ url('kelas') }}" class="btn btn-danger btn-sm">Kembali</a>
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="bi bi-cloud-arrow-up"></i> Import Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsiveTable" class="display responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Hint</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($mahasiswa as $get)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $get->nim_mahasiswa }}</td>
                                        <td>{{ $get->name }}</td>
                                        <td>{{ $get->email }}</td>
                                        <td>{{ $get->hint }}</td>
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
