<!DOCTYPE html>
<html>
<head>
    @include('backend.layout.component.head')
</head>
<body>
    <div id="wrapper">
        @include('backend.layout.component.sidebar')
        <div id="page-wrapper" class="gray-bg">
            @include('backend.layout.component.nav')
            @yield('content')
            @include('backend.layout.component.footer')
        </div>  
    </div>
  @include('backend.layout.component.scripts')
</body>
</html>


