<script src="{{ asset('Backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('Backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('Backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('Backend/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('Backend/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('Backend/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('Backend/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('Backend/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('Backend/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('Backend/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('Backend/dist/js/pages/dashboard2.js') }}"></script>

{{-- Toastr JS CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous"></script>


<script>
    @if(Session::has('message'))
        let type ="{{ Session::get('alert-type', 'info') }}";


        switch(type){
            case 'info': 
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success': 
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning': 
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error': 
                toastr.success("{{ Session::get('message') }}");
                break;

        }
    @endif
</script>