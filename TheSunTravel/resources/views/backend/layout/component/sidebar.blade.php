<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle img-circle img-user" src="{{Auth::user()->image }}" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                     </span> <span class="block"><strong class="font-bold">{{Auth::user()->name }}</strong><b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('auth.logout')}}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    3T
                </div>
            </li>

            @php
                $menus = \App\Models\MenuModel::where('status', true)->get();
            @endphp
           @foreach($menus as $menu)
           <li class="{{ Request::routeIs($menu->link) ? 'active' : '' }}">
               @if (Route::has($menu->link))
                   <a href="{{ route($menu->link) }}">
                       <i class="{{ $menu->icon }}"></i> {{ $menu->name }}
                   </a>
               @else
                   <a href="#">
                       <i class="{{ $menu->icon }}"></i> {{ $menu->name }} (#)
                   </a>
               @endif
           </li>
            @endforeach

            {{-- <li class="active">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                
            </li>
            <li class="">
                <a href="{{route('user.index')}}"><i class="fa fa-database"></i> <span class="nav-label">QL Thành viên</span>  </a>
            </li>
            <li class="">
                <a href="{{route('tour.getTour')}}"><i class="fa fa-database"></i> <span class="nav-label">QL  Tour</span>  </a>
            </li>
            <li class="">
                <a href="{{route('tourdeparture.getTourDeparture')}}"><i class="fa fa-database"></i> <span class="nav-label">QL Lịch Khởi Hành </span>  </a>
            </li>
            <li class="">
                <a href="{{route('booking.getBooking')}}"><i class="fa fa-database"></i> <span class="nav-label">QL Booking</span>  </a>
            </li> --}}
           
        </ul>

    </div>
</nav>