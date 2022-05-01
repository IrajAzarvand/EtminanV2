<!-- jQuery 3 -->
<script src="{{ asset('DashboardCssJs/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('DashboardCssJs/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('DashboardCssJs/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{ asset('DashboardCssJs/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('DashboardCssJs/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('DashboardCssJs/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('DashboardCssJs/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('DashboardCssJs/bower_components/moment/min/moment.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('DashboardCssJs/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('DashboardCssJs/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('DashboardCssJs/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('DashboardCssJs/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('DashboardCssJs/dist/js/pages/dashboard.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('DashboardCssJs/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('DashboardCssJs/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('DashboardCssJs/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('DashboardCssJs/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('DashboardCssJs/dist/js/demo.js') }}"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.2.2/sweetalert2.all.min.js"></script>

@include('PageElements.dashboard.Shared.SweetAlertDialogs')

<script src="{{ asset('DashboardCssJs/dropzone.min.js') }}"></script>
<script src="{{ asset('DashboardCssJs/dropzoneRules.js') }}"></script>
<script>
    Dropzone.discover();
</script>


<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
@livewireScripts
