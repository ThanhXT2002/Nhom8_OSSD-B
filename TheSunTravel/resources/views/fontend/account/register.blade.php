@extends('fontend.layout.master')
@section('content')
<div class="row acc" style="background: linear-gradient(120deg, #3ca7ee, #9b408f);">
    <div class="container col-lg-4 col-md-6 shadow p-3 mb-5 bg-body rounded" style="margin-top:100px">
        <h4 class="text-center rounded-3 bg-primary text-white fw-normal pb-2 pt-1 mt-3">Đăng ký tài khoản</h4>
        <form class="mb-3" id="registerForm" action="{{route('account.register')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Họ và tên
                    <span class="text-danger">(*)</span>
                </label>
                <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="Nhập họ tên của bạn" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email
                    <span class="text-danger">(*)</span>
                </label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Nhập email của bạn" required>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu
                    <span class="text-danger">(*)</span>
                </label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Nhập mật khẩu của bạn" required>
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nhập lại mật khẩu
                    <span class="text-danger">(*)</span>
                </label>
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu của bạn" required>
                @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                    <label class="form-check-label" for="terms">Tôi đồng ý với các </label> <a href="">điều khoản</a>
                </div>
                @error('terms')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Đăng ký</button>
            </div>
        </form>
        
        <p class="text-center">
            <span>Bạn đã có tài khoản?</span>
            <a href="{{ route('account.loginForm') }}">
                <span>Đăng nhập</span>
            </a>
        </p>
    </div>
</div>

<script>
    // document.getElementById('registerForm').addEventListener('submit', function(event) {
    //         var password = document.getElementById('password').value;
    //         var rePassword = document.getElementById('password_confirmation').value;
    //         var passwordError = document.getElementById('password-error');

    //     if (password !== rePassword) {
    //             event.preventDefault(); // Ngăn form submit
    //             passwordError.textContent = 'Mật khẩu nhập lại không khớp. Vui lòng kiểm tra lại.';
    //         } else {
    //             passwordError.textContent = ''; // Xóa thông báo lỗi nếu khớp
    //         }
    // });
</script>

@endsection