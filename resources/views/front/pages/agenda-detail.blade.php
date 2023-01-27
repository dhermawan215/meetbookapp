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
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">
                                                    {{ $room->nama_ruang }}</li>
                                            </ol>
                                        </nav>
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
                            <div class="row p-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">

                                    <div class="row mt-3">
                                        <div class="col-lg-10">
                                            @auth
                                                <div class="card shadow-sm border-0 p-2">
                                                    <h5 class="card-title">Register your agenda</h5>
                                                    <div class="card-body">
                                                        <form method="POST" id="agdform">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label class="form-label">Activity</label>

                                                                <input class="form-control" type="text"
                                                                    placeholder="Activity of meeting" name="activity"
                                                                    id="activity" value="{{ old('activity') }}" />

                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="form-label">Topic</label>

                                                                <input class="form-control" placeholder="topic of meeting"
                                                                    type="text" name="topic" id="topic"
                                                                    value="{{ old('topic') }}" />

                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="form-label">Room</label>

                                                                <select name="room_id" id="room_id" class="form-control">
                                                                    <option value="{{ $room->id }}" selected>
                                                                        {{ $room->nama_ruang }}</option>
                                                                </select>

                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="form-label">User</label>

                                                                <input class="form-control" value="{{ Auth::user()->id }}"
                                                                    name="user_id" id="user_id" type="hidden" />
                                                                <input class="form-control" value="{{ Auth::user()->name }}"
                                                                    type="text" disabled />

                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="form-label">Start
                                                                    Date</label>

                                                                <input class="form-control" name="start_date" id="start_date"
                                                                    type="datetime-local" value="{{ old('start_date') }}" />

                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="form-label">End
                                                                    Date</label>

                                                                <input class="form-control" name="end_date" id="end_date"
                                                                    type="datetime-local" value="{{ old('end_date') }}" />

                                                            </div>


                                                            <div class="form-group row">
                                                                <label class="form-label">Participants</label>

                                                                <input class="form-control"
                                                                    placeholder="enter your participants" type="text"
                                                                    name="participants" id="participants"
                                                                    value="{{ old('participants') }}" />

                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="form-label">Notes</label>

                                                                <input class="form-control" placeholder="notes" id="note"
                                                                    type="text" name="note"
                                                                    value="{{ old('note') }}" />

                                                            </div>
                                                            <div class="flex">
                                                                <button id="agdsubmit" class="btn btn-primary">Save</button>

                                                                <a href="{{ route('search.agenda') }}"
                                                                    class="btn btn-outline-warning">Cancel</a>
                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            @endauth
                                            @guest
                                                <div class="card shadow-sm border-0 p-2">
                                                    <h5 class="card-title">Login to register agenda</h5>
                                                </div>
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="startDate">Search Available Meeting Agenda</label>
                                            <input type="date" name="start_date" id="startDate" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="card-body">
                                            <div class="rounded">
                                                <div class="card-header" style="background: rgb(5, 130, 255)">

                                                    <p class="text-white font-weight-bold justify-content-center">Agenda
                                                    </p>
                                                </div>
                                                <ol id="list2"
                                                    class="list-group mt-2 list-group-light list-group-numbered"
                                                    data-spy="scroll" data-offset="0">

                                                </ol>
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
    @push('script')
        <script>
            $(document).ready(function() {
                getdata();
                getValueDate();
                submitForm();
            });

            function getdata() {
                const id_room = "{{ $room->id }}";

                $.ajax({
                    type: 'POST',
                    // headers: {
                    //     "Content-Type": "application/json"
                    // },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "contentType": "application/jsonrequest; charset=utf-8",
                    },
                    url: "{{ route('api.dashboard') }}",
                    data: {
                        room_id: id_room,
                    },
                    cache: false,

                    dataType: "json",
                    success: function(result) {

                        const json = JSON.stringify(result);
                        let json2 = JSON.parse(json);

                        json2.data.forEach(element => {

                            $('#list2').append(
                                '<li id="listofdata" class="list-group-item d-flex justify-content-between align-items-center" ><div><div class="d-flex"><p class="font-12 text-danger" style="font-weight: bold;">Start: ' +
                                element['start_date'] +
                                '</p><p class="ml-3 font-12 text-danger" style="font-weight: bold;">End: ' +
                                element[
                                    'end_date'] + '</p></div><p class="font-weight-bold">' +
                                element['activity'] +
                                '</p><p  class="text-muted">Lokasi:' + element['rooms'][
                                    'nama_ruang'
                                ] + '</p><p class="text-primary">Booked by:' + element[
                                    'user']['name'] +
                                '</p></div> '
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        $('#list2').prepend(
                            '<li class="list-group-item d-flex justify-content-between align-items-center" > Data Meeting Hari Ini Belum Tersedia</li>'
                        );
                    }
                });
            }

            function getValueDate() {
                $('#startDate').change(function(e) {
                    e.preventDefault();
                    const valdate = $('#startDate').val();
                    // const valdate = document.getElementById('startDate').value;
                    const id_room = "{{ $room->id }}";

                    $('#list2').empty();

                    $.ajax({
                        type: 'POST',
                        // headers: {
                        //     "Content-Type": "application/json"
                        // },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            "contentType": "application/jsonrequest; charset=utf-8",
                        },
                        url: "{{ route('api.date') }}",
                        data: {
                            room_id: id_room,
                            date: valdate
                        },
                        cache: false,

                        dataType: "json",
                        success: function(result) {

                            const json = JSON.stringify(result);
                            let json2 = JSON.parse(json);
                            json2.data.forEach(element => {

                                $('#list2').prepend(
                                    '<li class="list-group-item d-flex justify-content-between align-items-center" ><div><div class="d-flex"><p class="font-12 text-danger" style="font-weight: bold;">Start: ' +
                                    element['start_date'] +
                                    '</p><p class="ml-3 font-12 text-danger" style="font-weight: bold;">End: ' +
                                    element[
                                        'end_date'] + '</p></div><p class="font-weight-bold">' +
                                    element['activity'] +
                                    '</p><p  class="text-muted">Lokasi:' + element['rooms'][
                                        'nama_ruang'
                                    ] + '</p><p class="text-primary">Booked by:' + element[
                                        'user']['name'] +
                                    '</p></div> '
                                );
                            });
                        },
                        error: function(xhr, status, error) {
                            $('#list2').prepend(
                                '<li class="list-group-item d-flex justify-content-between align-items-center" > Data Meeting Belum Tersedia</li>'
                            );
                        }
                    });
                });
            }

            function submitForm() {
                $("#agdsubmit").click(function(e) {
                    e.preventDefault();

                    let formdata = $("#agdform").serialize();
                    $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            "contentType": "application/jsonrequest; charset=utf-8",
                        },
                        url: "{{ route('api.store') }}",
                        data: formdata,
                        dataType: "json",
                        success: function(response) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Your agenda has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            location.reload();
                        },
                        error: function(response) {

                            const jsonRespone = JSON.stringify(response.responseJSON);
                            let jsonRespone2 = JSON.parse(jsonRespone);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: jsonRespone2["data"],
                            });

                        }
                    });


                });
            }
        </script>
    @endpush
@endsection
