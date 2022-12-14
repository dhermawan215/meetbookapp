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
                            <div class="d-flex">
                                <input type="date" name="start_date" id="startDate" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="min-height-200px">
                        <div class="mt-2 card-box rounded">
                            <div class="card-header text-center" style="background: rgb(5, 130, 255)">
                                <p class="text-white font-weight-bold">Agenda</p>
                            </div>


                            <ol class="list-group list-group-light list-group-numbered">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fw-bold">Judul Meeting</div>
                                        <div class="text-muted">Lokasi: Ruang Meeting Jababeka</div>
                                        <div class="text-primary">Booked by: Admin</div>
                                    </div>
                                    <span class="badge rounded-pill badge-success">Time: 12.00-13.00</span>
                                </li>

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
                getValueDate();
            });

            function getValueDate() {
                $('#startDate').change(function(e) {
                    e.preventDefault();
                    const valdate = document.getElementById('startDate').value;
                    console.info(valdate);

                });
            }
        </script>
    @endpush
@endsection
