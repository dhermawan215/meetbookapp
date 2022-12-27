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
                                        <h4>Dashboard Agenda</h4>
                                    </div>
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html">Home</a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-10 ">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="min-height-200px">
                        <div class="pd-20 card-box mb-30">
                            <label for="startDate">Date</label>
                            <input type="date" name="start_date" id="startDate" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="min-height-200px">
                        <div class="pd-20 card-box rounded">
                            <div class="card-header" style="background: rgb(5, 130, 255)">
                                <a href="{{ route('agenda.create') }}" class="text-white float-right">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Create</a>
                                <p class="text-white font-weight-bold justify-content-center">Agenda</p>
                            </div>
                            <ol id="list2" class="list-group mt-2 list-group-light list-group-numbered"
                                data-spy="scroll" data-offset="0">

                            </ol>
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
            });

            function getdata() {
                $.ajax({
                    type: "GET",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    url: "{{ route('api.dashboard') }}",
                    dataType: "json",
                    success: function(result) {
                        const json = JSON.stringify(result);
                        let json2 = JSON.parse(json);
                        json2.data.forEach(element => {

                            $('#list2').append(
                                '<li id="listofdata" class="list-group-item d-flex justify-content-between align-items-center" ><div><div class="d-flex"><p class="font-12">Start: ' +
                                element['start_date'] + '</p><p class="ml-3 font-12">End: ' + element[
                                    'end_date'] + '</p></div><p class="font-weight-bold">' +
                                element['activity'] +
                                '</p><p  class="text-muted">Lokasi:' + element['rooms'][
                                    'nama_ruang'
                                ] + '</p><p class="text-primary">Booked by:' + element[
                                    'user']['name'] +
                                '</p></div> <span class="badge rounded-pill badge-success">Time: ' +
                                element['start_time'] + '-' + element['end_time'] +
                                '</span></li>'
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        $('#list2').prepend(
                            '<li class="list-group-item d-flex justify-content-between align-items-center" > Data Meeting Belum Tersedia</li>'
                        );
                    }
                });
            }

            function getValueDate() {
                $('#startDate').change(function(e) {
                    e.preventDefault();
                    const valdate = document.getElementById('startDate').value;

                    $('#list2').empty();

                    $.ajax({
                        type: "GET",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        url: "http://192.168.56.56/api/current/" + valdate,
                        dataType: "json",
                        success: function(result) {
                            const json = JSON.stringify(result);
                            let json2 = JSON.parse(json);
                            json2.data.forEach(element => {

                                $('#list2').prepend(
                                    '<li class="list-group-item d-flex justify-content-between align-items-center" ><div><div class="d-flex"><p class="font-12">Start: ' +
                                    element['start_date'] +
                                    '</p><p class="ml-3 font-12">End: ' + element[
                                        'end_date'] + '</p></div><p class="font-weight-bold">' +
                                    element['activity'] +
                                    '</p><p  class="text-muted">Lokasi:' + element['rooms'][
                                        'nama_ruang'
                                    ] + '</p><p class="text-primary">Booked by:' + element[
                                        'user']['name'] +
                                    '</p></div> <span class="badge rounded-pill badge-success">Time: ' +
                                    element['start_time'] + '-' + element['end_time'] +
                                    '</span></li>'
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
        </script>
    @endpush
@endsection
