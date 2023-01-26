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
                                                <div class="row pl-2">
                                                    <ul class="list-group list-group-light">Detail Ruangan
                                                        <li class="list-group-item border-0">Kapasitas:
                                                            {{ $rooms->kapasitas }}</li>
                                                    </ul>
                                                </div>
                                                <hr class="dropdown-divider">
                                                <div class="row">
                                                    <p class="pl-2 text-primary" style="font-weight: 500">Agenda Today
                                                        ({{ $d }})
                                                    </p>
                                                    <div class="notification-list mx-h-350 customscroll">
                                                        <ul>
                                                            @forelse ($booked->where('room_id', $rooms->id) as $meeting)
                                                                <li class="text-left p-1 m-1" style="width: 260px;">
                                                                    <h4>{{ $meeting->activity }}
                                                                    </h4>
                                                                    <div class="mt-1"
                                                                        style="color: rgb(6, 177, 28); font-weight:400;">
                                                                        <p style="font-size: 14px;">Start
                                                                            Date: {{ $meeting->start_date }}</p>
                                                                        <p style="font-size: 14px">End Date:
                                                                            {{ $meeting->end_date }}</p>
                                                                    </div>
                                                                    <p class="text-primary ">
                                                                        Booked by : {{ $meeting->user->name }}
                                                                    </p>

                                                                </li>
                                                            @empty
                                                                <p class="text-left p-1">Data Meeting Belum Tersedia
                                                                </p>
                                                            @endforelse


                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-footer">
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
