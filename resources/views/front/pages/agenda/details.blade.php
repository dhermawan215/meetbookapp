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
                                            <li class="breadcrumb-item"><i class="bi bi-house"></i>
                                                <a href="{{ route('app.dashboard') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('agenda.index') }}">Agenda</a>
                                            </li>
                                            <li class="breadcrumb-item active">
                                                Detail Agenda
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-10">
                <div class="col-lg-12 col-md-12 col-sm-12 mt-1">
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix mb-2">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Detail Meeting Agenda No: {{ $data->book_no }} </h4>
                            </div>
                        </div>
                        <form>
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Activity</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" id="activity" disabled
                                        value="{{ $data->activity }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Topic</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" disabled value="{{ $data->topic }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Room</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" disabled
                                        value="{{ $data->rooms->nama_ruang ?? 'data not found' }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">User</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" disabled
                                        value="{{ $data->user->name ?? 'data not found' }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Start Date</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" disabled value="{{ $data->start_date }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">End Date</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" disabled value="{{ $data->end_date }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Start Time</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" disabled value="{{ $data->start_time }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">End Time</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" disabled value="{{ $data->end_time }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Participants</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" disabled
                                        value="{{ $data->participants ?? 'no data available' }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Notes</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" disabled
                                        value="{{ $data->note ?? 'no data available' }}" />
                                </div>
                            </div>
                            <div class="">
                                <a href="{{ route('agenda.index') }}" class="btn btn-outline-danger"> <i
                                        class="bi bi-arrow-left-circle"></i>Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
