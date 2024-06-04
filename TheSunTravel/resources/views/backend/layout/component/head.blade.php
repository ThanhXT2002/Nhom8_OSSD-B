    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 
        @if(isset($title) && !empty($title))
            admin - {{$title}}
        @else
            Admin The Sun Travel
        @endif
    </title>

    <!-- Mainly styles -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/plugins/morris/morris-0.4.3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    {{-- <link href="{{ asset('backend/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('backend/css/plugins/select2/select2.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('backend/css/plugins/footable/footable.core.css') }}" rel="stylesheet">

    {{-- <!-- Clockpicker style -->
    <link href="{{ asset('backend/css/plugins/clockpicker/clockpicker.css') }}" rel="stylesheet"> --}}

    <!-- Custom styles -->
   
    <link href="{{ asset('backend/css/customize.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/plugins/summernote/summernote-bs3.css') }}" rel="stylesheet">

    <!-- Datatable style -->
    {{-- <link href="{{ asset('backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet"> --}}

    <!-- jQuery script -->
    <script src="{{ asset('backend/js/jquery-3.1.1.min.js') }}"></script>

    <link href="{{ asset('backend/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">




