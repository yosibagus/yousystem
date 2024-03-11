@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card dz-card" id="accordion-six">
                <div class="card-header flex-wrap d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ $detail->nama_kelas }} - {{ $detail->materi_perkuliahan }}</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Tanggal Absensi</th>
                                    <th>Status Keterlambatan</th>
                                    <th>Radius</th>
                                    <th>Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody id="tmp-mhs"></tbody>
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
            selesai();
        });

        function selesai() {
            setTimeout(function() {
                update();
                selesai();
            }, 1000);
        }

        function update() {
            $.ajax({
                type: "GET",
                url: "{{ url('get_data_absen?token=' . $_GET['token']) }}",
                dataType: "html",
                success: function(data) {
                    $("#tmp-mhs").html(data);
                }
            })
        }
    </script>
@endsection
