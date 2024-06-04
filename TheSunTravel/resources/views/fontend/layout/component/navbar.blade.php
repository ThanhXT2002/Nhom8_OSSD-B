<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="/" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fa fa-map-marker-alt me-3"></i>The Sun Travel</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{route('tour.index')}}" class="nav-item nav-link ">Tour</a>
                <a href="{{route('about')}}" class="nav-item nav-link ">Giới thiệu</a>
                <a href="{{route('services')}}" class="nav-item nav-link">Dịch vụ</a>
                <a href="{{route('blog')}}" class="nav-item nav-link">Blog</a>    
                <a href="{{route('contact')}}" class="nav-item nav-link">Liên hệ</a>
            </div>
        </div>
    </nav>
</div>