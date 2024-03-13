@extends('layout.template')
@section('content')
    <div class="row">
        <div class="col-xl-7">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="any-card">
                        <div class="c-con">
                            <h4 class="heading mb-0">Selamat Datang <strong>{{ Auth::user()->name }}</strong><img
                                    src="images/crm/party-popper.png" alt=""></h4>
                            <span>Anda Login sebagai
                                {{ Auth::user()->asprak == 1 ? 'Asisten Praktikum' : 'Administrator' }}</span>
                            <p class="mt-3">Kelola data master dan data perkuliahan di ruang ini.</p>

                            <a href="app-profile-1.html" class="btn btn-primary btn-sm">View Profile</a>
                        </div>
                        <img src="images/analytics/developer_male.png" class="harry-img" alt="">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card bg-primary">
                <div class="card-header border-0">
                    <h4 class="heading mb-0 text-white">Data Master</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="sales-bx">
                            <h3 class="bi bi-floppy text-white">
                                </h4>
                                <h4>{{ $kelas }}</h4>
                                <span>Total Kelas</span>
                        </div>
                        <div class="sales-bx">
                            <h3 class="bi bi-star-half text-white"></h3>
                            <h4>{{ $matkul }}</h4>
                            <span>Total Matkul</span>
                        </div>
                        <div class="sales-bx">
                            <h3 class="bi bi-people text-white"></h3>
                            <h4>{{ $akun }}</h4>
                            <span>Total Akun</span>
                        </div>
                        <div class="sales-bx">
                            <h3 class="text-white bi bi-person-lines-fill"></h3>
                            <h4>{{ $asprak }}</h4>
                            <span>Total ASPRAK</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card bg-primary-light analytics-card">
                <div class="card-body mt-xl-4 mt-0 pb-1">
                    <div class="row align-items-center">
                        <div class="col-xl-2">
                            <h3 class="mb-3">Analytics</h3>
                            <p class="mb-0 text-primary pb-4">Yout statistics for<br> 1 month period.</p>
                        </div>
                        <div class="col-xl-10">
                            <div class="row">
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="bi bi-pie-chart-fill text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Kelas Kuliah</h5>
                                                    <span>Total</span>
                                                    <h3>{{ $kelas_kuliah }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="bi bi-file-earmark-text text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Izin Kuliah</h5>
                                                    <span>Total</span>
                                                    <h3>{{ $izin }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="bi bi-qr-code-scan text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Scan</h5>
                                                    <span>Total</span>
                                                    <h3>{{ $kelas_mhs }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="bi bi-check-circle-fill text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Kehadiran</h5>
                                                    <span>Total</span>
                                                    <h3>{{ $hadir }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="bi bi-x-circle-fill text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Ketidakhadiran</h5>
                                                    <span>Total</span>
                                                    <h3>{{ $tidakhadir }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="bi bi-person-check-fill text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Admin</h5>
                                                    <span>Total</span>
                                                    <h3>1</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
