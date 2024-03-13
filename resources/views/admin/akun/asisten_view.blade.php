@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pilih Mahasiswa</label>
                                    <select id="mySelect" name="id_mahasiswa">
                                        <option value=""></option>
                                        @foreach ($akun as $get)
                                            <option value="{{ $get->id }}">
                                                {{ $get->nim_mahasiswa . ' - ' . $get->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Jadikan Role Asisten</button>
                    </form>
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
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Hint</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($asprak as $get)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $get->nim_mahasiswa }}</td>
                                    <td>{{ $get->name }}</td>
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
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('#mySelect').select2({
                placeholder: 'Select an option',
                allowClear: true // Adds a clear button
            });
        });
    </script>
@endsection
