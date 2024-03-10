@extends('layout.template')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>Perkuliahan Kelas Tambah</h4>
                <div class="form-validation">
                    <form class="needs-validation" novalidate method="POST" action="">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-4 col-form-label" for="kelas_id">Pilih Kelas
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="default-select wide form-control" id="kelas_id" name="kelas_id">
                                        <option data-display="Select" value="">Please select</option>
                                        @foreach ($kelas as $get)
                                            <option value="{{ $get->id_kelas }}">{{ $get->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a one.
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-4 col-form-label" for="matkul_id">Pilih Matakuliah
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="default-select wide form-control" id="matkul_id" name="matkul_id">
                                        <option value="" data-display="Select">Please select</option>
                                        @foreach ($matakuliah as $get)
                                            <option value="{{ $get->id_matkul }}">{{ $get->nama_matakuliah }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a one.
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-4 col-form-label required" for="tgl_perkuliahan">Tanggal
                                        Perkuliahan
                                    </label>
                                    <input type="datetime-local" class="form-control" id="tgl_perkuliahan"
                                        name="tgl_perkuliahan" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Masukkan File Terlebih Dahulu.
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-4 col-form-label required" for="max_keterlambatan">Maksimal
                                        Keterlambatan
                                    </label>
                                    <input type="datetime-local" class="form-control" id="max_keterlambatan"
                                        name="max_keterlambatan" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Masukkan File Terlebih Dahulu.
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-4 col-form-label required" for="keterangan_perkuliahan">Keterangan
                                    </label>
                                    <textarea name="keterangan_perkuliahan" required id="keterangan_perkuliahan" class="form-control" cols="30"
                                        rows="3"></textarea>
                                    <div class="invalid-feedback">
                                        Masukkan File Terlebih Dahulu.
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-4 col-form-label required" for="materi_perkuliahan">Materi
                                    </label>
                                    <textarea name="materi_perkuliahan" required id="materi_perkuliahan" class="form-control" cols="30" rows="3"></textarea>
                                    <div class="invalid-feedback">
                                        Masukkan Materi Terlebih Dahulu.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-lg-8">
                                    <a href="{{ url('perkuliahan_kelas') }}" class="btn btn-danger btn-sm">Kembali</a>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-floppy"></i>
                                        Simpan Data</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
