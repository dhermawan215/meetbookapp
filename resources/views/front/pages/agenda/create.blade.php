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
                                                <a href="{{ route('search.agenda') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('agenda.index') }}">Agenda</a>
                                            </li>
                                            <li class="breadcrumb-item active">
                                                Create Agenda
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="row pb-10">
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row pb-10">
                <div class="col-lg-12 col-md-12 col-sm-12 mt-1">
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix mb-2">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Create Your Meeting Agenda</h4>

                            </div>
                        </div>
                        <form action="{{ route('agenda.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Activity</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" placeholder="Activity of meeting"
                                        name="activity" id="activity" value="{{ old('activity') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Topic</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" placeholder="topic of meeting" type="text" name="topic"
                                        value="{{ old('topic') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Room</label>
                                <div class="col-sm-12 col-md-10">
                                    <select name="room_id" id="room" class="form-control">
                                        <option selected>-Select Room-</option>
                                        @foreach ($room as $rowdata)
                                            <option value="{{ $rowdata->id }}">{{ $rowdata->nama_ruang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">User</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" value="{{ Auth::user()->id }}" name="user_id"
                                        type="hidden" />
                                    <input class="form-control" value="{{ Auth::user()->name }}" type="text" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Start Date</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="start_date" type="datetime-local"
                                        value="{{ old('start_date') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">End Date</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="end_date" type="datetime-local"
                                        value="{{ old('end_date') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Participants</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" placeholder="enter your participants" type="text"
                                        name="participants" value="{{ old('participants') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Notes</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" placeholder="notes" type="text" name="note"
                                        value="{{ old('note') }}" />
                                </div>
                            </div>
                            <div class="flex">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <a href="{{ route('agenda.index') }}" class="btn btn-outline-warning">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $("#room").select2({
                responsive: true,
                width: '100%'
            });

            const danger = '{{ Session::get('danger') }}';
            const msgDanger = '{{ Session::get('danger') }}';

            if (danger) {
                Swal.fire({
                    icon: 'error',
                    title: 'Opops, please select another date',
                    text: msgDanger,
                })
            }
        </script>
    @endpush
@endsection
