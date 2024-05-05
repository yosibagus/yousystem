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
            </div>
        </div>
    </div>
@endsection
