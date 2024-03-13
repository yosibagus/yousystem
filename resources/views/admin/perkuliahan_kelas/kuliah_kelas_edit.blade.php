@extends('layout.template')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Perkuliahan Kelas <b>{{ $detail->nama_kelas . ' - ' . $detail->materi_perkuliahan }}</b></h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" novalidate method="POST" action="{{ url('kuliah-kelas-edit-action/' . $detail->token_perkuliahan) }}">
                        @csrf
                        <div class="row">
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
                            <div class="col-xl-4">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-4 col-form-label" for="matkul_id">Pilih Matakuliah
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="matkul_id" name="matkul_id">
                                        <option value="">Please select</option>
                                        @foreach ($matakuliah as $get)
                                            <option {{ $get->id_matkul == $detail->matakuliah_id ? 'selected' : '' }}
                                                value="{{ $get->id_matkul }}">{{ $get->nama_matakuliah }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a one.
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-12 col-form-label" for="asprak_id">Pilih Asisten Praktikum
                                        <span class="text-danger">*</span>
                                    </label>
                                    @if (Auth::user()->asprak == 2)
                                        <select class="" id="asprak" name="asprak_id">
                                            <option value="">Please select</option>
                                            @foreach ($asprak as $get)
                                                <option {{ $get->id == $detail->asprak_id ? 'selected' : '' }}
                                                    value="{{ $get->id }}">{{ $get->name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select name="" id="asprak" disabled>
                                            <option value="a" selected>{{ Auth::user()->name }}</option>
                                        </select>
                                    @endif
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
                                        name="tgl_perkuliahan" placeholder="" value="{{ $detail->tgl_perkuliahan }}"
                                        required>
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
                                        name="max_keterlambatan" placeholder="" value="{{ $detail->max_keterlambatan }}"
                                        required>
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
                                        rows="3">{{ $detail->keterangan_perkuliahan }}</textarea>
                                    <div class="invalid-feedback">
                                        Masukkan Keterangan Terlebih Dahulu.
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mb-3 form-group">
                                    <label class="col-lg-4 col-form-label required" for="materi_perkuliahan">Materi
                                    </label>
                                    <textarea name="materi_perkuliahan" required id="materi_perkuliahan" class="form-control" cols="30" rows="3">{{ $detail->materi_perkuliahan }}</textarea>
                                    <div class="invalid-feedback">
                                        Masukkan Materi Terlebih Dahulu.
                                    </div>
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
            $('#asprak').select2({
                placeholder: 'Pilih Asisten Praktikum',
                allowClear: true
            });
            $('#matkul_id').select2({
                placeholder: 'Pilih Matakuliah',
                allowClear: true
            });
            $('#kelas_id').select2({
                placeholder: 'Pilih Kelas',
                allowClear: true
            });
        });
    </script>
@endsection
