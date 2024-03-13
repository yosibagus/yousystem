@extends('layout.template')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>Perkuliahan Kelas Edit</h4>
                <div class="form-validation">
                    <form class="needs-validation" novalidate method="POST" action="{{ url('akun-edit/' . $detail->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-4 col-form-label required" for="name">Nama Lengkap
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder=""
                                        required value="{{ $detail->name }}">
                                    <div class="invalid-feedback">
                                        Masukkan Nama Lengkap Terlebih Dahulu.
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-12 col-form-label required" for="nim_mahasiswa">Nomor Induk
                                        Mahasiswa</label>
                                    <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa"
                                        placeholder="" value="{{ $detail->nim_mahasiswa }}" required>
                                    <div class="invalid-feedback">
                                        Masukkan NIM Terlebih Dahulu.
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-4 col-form-label" for="kelas_id">Pilih Kelas
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="kelas_id" name="kelas_id">
                                        <option value="">Please select</option>
                                        @foreach ($kelas as $get)
                                            <option {{ $get->id_kelas == $detail->kelas_id ? 'selected' : '' }}
                                                value="{{ $get->id_kelas }}">{{ $get->angkatan }} -
                                                {{ $get->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a one.
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-6">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-4 col-form-label required" for="email">Email Pribadi</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder=""
                                        required value="{{ $detail->email }}">
                                    <div class="invalid-feedback">
                                        Masukkan Email Terlebih Dahulu.
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-4 col-form-label" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-lg-8">
                                    <a href="{{ url('perkuliahan_kelas') }}" class="btn btn-danger btn-sm">Kembali</a>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-floppy"></i>
                                        Update Data</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#kelas_id').select2({
                placeholder: 'Pilih Kelas',
                allowClear: true
            });
        });
    </script>
@endsection
