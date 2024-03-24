@extends('layout.template')

@section('content')
    <div class="row">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row task">
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="task-summary">
                                <div class="d-flex align-items-baseline">
                                    <h2 class="text-primary count">{{ $detail->nama_kelas }}</h2>
                                    <span>Class</span>
                                </div>
                                <p>{{ $detail->keterangan_perkuliahan . ' - ' . $detail->materi_perkuliahan }}</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-6">
                            <div class="task-summary">
                                <div class="d-flex align-items-baseline">
                                    <h2 class="text-success count" id="kehadiran">0</h2>
                                    <span>Mahasiswa</span>
                                </div>
                                <p>Scan Kehadiran</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-6">
                            <div class="task-summary">
                                <div class="d-flex align-items-baseline">
                                    <h2 class="text-warning count" id="mhs">35</h2>
                                    <span>Mahasiswa</span>
                                </div>
                                <p>Belum Scan Kehadiran</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card dz-card" id="accordion-six">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>Nama Mahasiswa</th>
                                    <th>Tanggal Absensi</th>
                                    <th>Status Keterlambatan</th>
                                    <th>Radius</th>
                                    <th>Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody id="tmp-mhs">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;

        var pusher = new Pusher('90a97b6509c74eadbb47', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('data');
        channel.bind('kehadiran', function(data) {
            var data = data.kehadiran;
            const tableBody = document.getElementById('tmp-mhs');
            const newRow = `
                    <tr>
                        <td>${data.mhs}</td>
                        <td>${data.tgl_absensi}</td>
                        <td>${data.status_terlambat}</td>
                        <td>${data.radius}</td>
                        <td>${data.status_kehadiran}</td>
                    </tr>
                `;
            tableBody.innerHTML += newRow;
        });
    </script>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "{{ url('get_data_detail?token=' . $_GET['token']) }}",
                dataType: 'json',
                success: function(data) {
                    $("#kehadiran").html(data.absensi);
                    $("#mhs").html(data.mhs);
                }
            });

            $.ajax({
                type: "GET",
                url: "{{ url('get_data_absen?token=' . $_GET['token']) }}",
                dataType: "html",
                success: function(data) {
                    $("#tmp-mhs").html(data);
                }
            })
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            selesai();
        });

        function selesai() {
            setTimeout(function() {
                update();
                detail();
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

        function detail() {
            $.ajax({
                type: "GET",
                url: "{{ url('get_data_detail?token=' . $_GET['token']) }}",
                dataType: 'json',
                success: function(data) {
                    $("#kehadiran").html(data.absensi);
                    $("#mhs").html(data.mhs);
                }
            })
        }
    </script> --}}
@endsection
