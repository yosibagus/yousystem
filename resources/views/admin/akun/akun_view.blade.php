@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card dz-card" id="accordion-six">
                <div class="card-header flex-wrap d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">Data Mahasiswa</h4>
                    </div>
                </div>

                <!-- tab-content -->
                <div class="tab-content" id="myTabContent-six">
                    <div class="tab-pane fade show active" id="responsive" role="tabpanel" aria-labelledby="home-tab-six">
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
                                                        <a href="#"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
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
        </div>
    </div>
@endsection
