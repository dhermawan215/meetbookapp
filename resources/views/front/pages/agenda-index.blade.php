@extends('front.layouts.app')
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="row pb-10">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="min-heigth-200px">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="title">
                                        <h5>Welcome</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-10 ">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="min-height-200px">
                        <div class="pd-20 card-box mb-30">
                            <h5 class="h5 mb-2">Daftar Ruang Meeting</h5>
                            <div class="row p-3">
                                @foreach ($room as $rooms)
                                    <div class="col-lg-4 mt-3">
                                        <div class="card shadow-sm rounded" style="width: 18rem;">
                                            <div class="card-header text-white" style="background-color: rgb(54, 147, 235)">
                                                <i class="bi bi-door-open"></i>
                                                <h5 class="card-title text-white">{{ $rooms->nama_ruang }}</h5>
                                            </div>
                                            <div class="card-body text-left">
                                                <ul class="list-group list-group-light">Detail Ruangan
                                                    <li class="list-group-item border-0">Kapasitas:
                                                        {{ $rooms->kapasitas }}</li>
                                                    <li class="list-group-item border-0">Fasilitas:
                                                        {{ $rooms->fasilitas }}</li>
                                                    <li class="list-group-item border-0">Lokasi:{{ $rooms->lokasi }}</li>
                                                </ul>
                                                <a href="{{ route('search.agenda.detail', $rooms->id) }}"
                                                    class="card-link font-weight-bold text-success">See Agenda</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('script')
    @endpush
@endsection
