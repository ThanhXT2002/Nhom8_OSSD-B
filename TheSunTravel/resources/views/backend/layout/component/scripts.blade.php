    <!-- Mainly scripts -->
    <script src="{{ asset('backend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('backend/js/inspinia.js') }}"></script>
    

    <script src="{{ asset('backend/js/plugins/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/footable/footable.all.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/plugins/pace/pace.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('backend/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('backend/js/demo/peity-demo.js') }}"></script>
     --}}
    
    {{-- <script src="{{ asset('backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('backend/js/demo/sparkline-demo.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/chartasset/js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/easypiechart/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/clockpicker/clockpicker.js') }}"></script> --}}
{{-- 
    @if (isset($custom_js))
        @foreach ($custom_js as $js_file)
            <script src="{{ asset('backend/js/' . $js_file) }}"></script>
        @endforeach
    @endif --}}

    {{-- <script src="{{ asset('backend/js/plugins/dataTables/datatables.min.js') }}"></script> --}}
    <!-- Select2 -->
    <script src="{{ asset('backend/js/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/js/jscustom.js') }}"></script>





<script>
        $(document).ready(function(){

            $('.summernote').summernote();
            $('.footable').footable();
            $('.footable2').footable();

            $(".select2_demo_1").select2();
            $(".select2_demo_2").select2();
            $(".select2_demo_3").select2({
                placeholder: "Select a state",
                allowClear: true
            });


        });
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>


