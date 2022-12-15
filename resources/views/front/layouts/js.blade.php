<!-- js -->
<script src="{{ asset('/front/js/jquery-3-6-0.min.js') }}"></script>
<script src="{{ asset('/front/vendors/scripts/core.js') }}"></script>
<script src="{{ asset('/front/vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('/front/vendors/scripts/process.js') }}"></script>
<script src="{{ asset('/front/vendors/scripts/layout-settings.js') }}"></script>
<script src="{{ asset('/front/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('/front/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/front/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/front/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/front/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/front/vendors/scripts/dashboard3.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('/front/src/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('/front/vendors/scripts/calendar-setting.js') }}"></script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
        style="display: none; visibility: hidden"></iframe></noscript>

<script>
    $(document).ready(function() {
        $('.logout').click(function(e) {
            const form = $(this).closest("form");
            const name = $(this).data("name");
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure you want to exit?',
                text: "last chance to back out",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Good bye'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })

        });
    });
</script>
<!-- End Google Tag Manager (noscript) -->
