@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card dz-card" id="accordion-six">
                <div class="card-header flex-wrap d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">Data Matakuliah</h4>
                    </div>
                    <ul class="nav nav-tabs dzm-tabs" id="myTab-six" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active " id="home-tab-six" data-bs-toggle="tab"
                                data-bs-target="#responsive" type="button" role="tab"
                                aria-selected="true">List</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="profile-tab-six" data-bs-toggle="tab"
                                data-bs-target="#responsive-html" type="button" role="tab" aria-selected="false">Tambah
                                Data</button>
                        </li>
                    </ul>
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
                                            <th>Nama Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($matkul as $get)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $get->nama_matakuliah }}</td>
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
                    <div class="tab-pane fade show active" id="responsive-html" role="tabpanel"
                        aria-labelledby="home-tab-six">
                        <div class="card-body">
                            Tambah
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
