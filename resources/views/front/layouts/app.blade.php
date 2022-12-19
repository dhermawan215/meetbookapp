<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} - Zekindo</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    @include('front.layouts.style')
</head>

<body>
    {{-- loading --}}
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="vendors/images/deskapp-logo.svg" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div> --}}
    {{-- navbar start --}}
    @include('front.layouts.navbar')
    {{-- navbar end --}}
    @auth
        {{-- sidebar start --}}
        @include('front.layouts.sidebar')
        {{-- sidebar end --}}
    @endauth
    <div class="mobile-menu-overlay"></div>

    {{-- content --}}
    @yield('content')

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="footer-wrap pd-20 mb-20 card-box">
                Meeting Room Book App
            </div>
        </div>
    </div>
    {{-- js --}}
    @include('front.layouts.js')

    {{-- js custom --}}
    @stack('script')
</body>

</html>
