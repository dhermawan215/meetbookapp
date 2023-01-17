<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success Attendance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
</head>

<body>

    <main>
        <section class="h-100 h-custom" style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-8 col-xl-6">
                        <div id="presence" class="card border-top border-bottom border-3"
                            style="border-color: #060ada !important;">
                            <div class="card-body p-5">

                                <h3 class="lead fw-bold mb-5" style="color: #060ada;">Proof of Presence</h3>
                                <p>Gala Dinner - Zekindo 25th Anniversary</p>
                                <p>16 January 2023 at Damai
                                    Indah Golf, BSD</p>
                                <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <p class="small text-muted mb-1">Date & Time Attendance</p>
                                            <p>{{ $user->registered_at }}</p>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <p class="small text-muted mb-1">Name</p>
                                            <p>{{ $user->userRegistered->name }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button id="download" class="btn mt-2 text-white"
                                style="background-color: #060ada">Donwload To
                                Image</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.esm.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery("#download").click(function() {
                screenshot();
            });
        });

        function screenshot() {
            const name = "{{ $user->userRegistered->name }}";
            const file = 'ProofofPresence' + name + '.png';
            html2canvas(document.getElementById("presence")).then(function(canvas) {
                downloadImage(canvas.toDataURL(), file);
            });
        }

        function downloadImage(uri, filename) {
            var link = document.createElement('a');
            if (typeof link.download !== 'string') {
                window.open(uri);
            } else {
                link.href = uri;
                link.download = filename;
                accountForFirefox(clickLink, link);
            }
        }

        function clickLink(link) {
            link.click();
        }

        function accountForFirefox(click) {
            var link = arguments[1];
            document.body.appendChild(link);
            click(link);
            document.body.removeChild(link);
        }
    </script>
</body>

</html>
