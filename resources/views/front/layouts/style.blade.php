<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('/front/vendors/styles/core.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/front/vendors/styles/icon-font.min.css') }}" />
<link rel="stylesheet"
    type="text/css"href="{{ asset('/front/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('/front/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/front/vendors/styles/style.css') }}" />
{{-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('/front/src/plugins/fullcalendar/fullcalendar.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "G-GBZ3SGGX85");
</script>
<!-- Google Tag Manager -->
<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            "gtm.start": new Date().getTime(),
            event: "gtm.js"
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != "dataLayer" ? "&l=" + l : "";
        j.async = true;
        j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
</script>
<!-- End Google Tag Manager -->
