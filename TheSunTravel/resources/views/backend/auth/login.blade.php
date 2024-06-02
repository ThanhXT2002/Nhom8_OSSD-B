<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login-Admin</title>
    @include('backend.layout.component.head')
</head>
<body class="gray-bg p-b-xl">
    <div class="middle-box  loginscreen animated fadeInDown">
        <div>
            <div>
                <img width=300px, src="{{ asset('backend/img/logo/logo-TheSunTravel.png') }}" alt="">
            </div>
            <h3 class="m-t-md m-b-md text-center">Login Admin</h3>
            
            <form class="m-t" role="form" method="post" action="{{ route('auth.login')}}">
                @csrf
                <div class="form-group">
                    <input type="text"
                    class="form-control" 
                    name="email" 
                    value="{{old('email')}}"  
                    placeholder="Email">
                    @if ($errors->has('email'))
                    <i class ="text-danger text-left">* {{ $errors->first('email') }}</i>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" 
                    class="form-control" 
                    name="password" 
                    placeholder="Password" 
                    >
                    @if ($errors->has('password'))
                            <i class ="text-danger text-left">* {{ $errors->first('password') }}</i>
                          @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width">Đăng nhập</button>
                <div class="text-center">
                    <a href="#" ><small>Quên mật khẩu?</small></a>
                </div>
                
            </form>
            <p class="m-t text-center" > <small>Bản quyền thuộc TripleT &copy; 2024</small> </p>
        </div>
    </div>
    @include('backend.layout.component.scripts')
</body>

</html>



