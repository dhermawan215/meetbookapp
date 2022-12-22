<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Modern Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    @include('front.layouts.style')

    <style>
        .css-selector {
            background: linear-gradient(17deg, #57e2fe, #036bdc, #095ab3);
            background-size: 600% 600%;

            -webkit-animation: AnimationName 16s ease infinite;
            -moz-animation: AnimationName 16s ease infinite;
            animation: AnimationName 16s ease infinite;
        }

        @-webkit-keyframes AnimationName {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 51%
            }

            100% {
                background-position: 0% 50%
            }
        }

        @-moz-keyframes AnimationName {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 51%
            }

            100% {
                background-position: 0% 50%
            }
        }

        @keyframes AnimationName {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 51%
            }

            100% {
                background-position: 0% 50%
            }
        }
    </style>
    <!-- Bootstrap icons-->

</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->

        <!-- Header-->
        <header class="py-5 css-selector">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-left text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Welcome, to meeting room book app
                            </h1>
                            <p class="lead fw-normal text-white-50 mb-4">
                            </p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('login') }}">
                                    Mulai</a>
                                <a class="btn btn-outline-light btn-lg px-4 ml-3"
                                    href="{{ route('search.agenda') }}">Lihat Agenda</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                            src="{{ asset('img/4880440.png') }}" alt="..." /></div>
                </div>
            </div>
        </header>

    </main>
    <!-- Footer-->
    <footer class="py-4 mt-auto bg-secondary ">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">&copy; Meeting Book App 2022 - {{ date('Y') }}</div>
                </div>
                {{-- <div class="col-auto">
                    <p class="text-white mt-2">MIT License</p>
                </div> --}}

            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
