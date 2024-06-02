@extends('fontend.layout.master')
@section('content')
    <div class="row acc" style="background: linear-gradient(120deg, #3ca7ee, #9b408f);">
        <div class="container col-lg-4 col-md-6 shadow p-3 mb-5 bg-body rounded" style="margin-top:100px">
            <h4 class="text-center text-white fw-normal  pb-2 pt-1 mt-3 bg-primary ">Đăng nhập</h4>
            <form class="mb-3" action="{{ route('account.login') }}" method="POST">
                <div class="mb-3">
                @csrf
                    <label for="email" class="form-label">Email
                        <span class="text-danger">(*)</span>
                    </label>
                    <input type="text" class="form-control .col-6" id="email" name="email"
                        placeholder="Nhập email của bạn" autofocus="" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password
                        <span class="text-danger">(*)</span>
                    </label>
                    <input type="text" id="password" class="form-control" name="password"
                        placeholder="Nhập mật khẩu của bạn" required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember"> Remember Me </label>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary rounded-3 d-grid w-100" type="submit">Đăng nhập</button>
                </div>
            </form>
            <p class="text-center"><a href="/Login/ForgotPassword">Quên mật khẩu?</a></p>
            <p class="text-center">
                <span>Bạn chưa có tài khoản?</span>
                <a href="{{route('account.registerForm')}}">
                    <span>Đăng ký</span>
                </a>
            </p>
        </div>
    </div>
@endsection
