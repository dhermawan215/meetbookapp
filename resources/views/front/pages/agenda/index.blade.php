@extends('front.layouts.app')
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="row pb-10">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="min-heigth-200px">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="title">
                                        <h4>Agenda</h4>
                                    </div>
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html">Your Dashboard</a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box pb-10">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Activity</th>
                                    <th>Topic</th>
                                    <th>Room</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($data as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->activity }}</td>
                                        <td>{{ $row->topic }}</td>
                                        <td>{{ $row->room->nama_ruang }}</td>
                                        <td>{{ $row->start_date }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href=""><i class="dw dw-edit2"></i>
                                                        Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    @endpush
@endsection
