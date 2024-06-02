 <!-- Topbar Start -->
 <div class="container-fluid bg-primary px-5 d-none d-lg-block">
     <div class="row gx-0">
         <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
             <div class="d-inline-flex align-items-center" style="height: 45px;">
                 <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                         class="fab fa-twitter fw-normal"></i></a>
                 <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                         class="fab fa-facebook-f fw-normal"></i></a>
                 <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                         class="fab fa-linkedin-in fw-normal"></i></a>
                 <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                         class="fab fa-instagram fw-normal"></i></a>
                 <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i
                         class="fab fa-youtube fw-normal"></i></a>
             </div>
         </div>
         <div class="col-lg-4 text-center text-lg-end">
             <div class="d-inline-flex align-items-center" style="height: 45px;">

                 <style>
                     .avatar {
                         width: 30px;
                         height: 30px;
                         border-radius: 50%;
                         object-fit: cover;
                     }
                 </style>
                 @if (Auth::check())
                     <a href="#" class=" text-light me-3">
                        <small>
                             <img src="{{ Auth::user()->image ? Auth::user()->image : asset('fontend/img/no-img.png') }}"
                                 alt="Avatar" class="avatar me-2"> {{ Auth::user()->name }}
                        </small>
                    </a>
                     <a href="{{ route('account.logout') }}"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Log Out</small></a>
                 @else
                     <a href="#"><small class="me-3 text-light"><i
                                 class="fa fa-user me-2"></i>Register</small></a>

                     <a href="{{ route('account.loginForm') }}"><small class="me-3 text-light"><i
                                 class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                 @endif


             </div>
         </div>
     </div>
 </div>
 </div>
 <!-- Topbar End -->
