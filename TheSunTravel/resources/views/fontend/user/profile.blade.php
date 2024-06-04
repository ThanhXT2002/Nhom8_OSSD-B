<!--begin::Content wrapper-->

<!--end::Content wrapper-->
@extends('fontend.layout.master')
@section('content')

        <div class="" style="background: linear-gradient(120deg, #3ca7ee, #9b408f);">
            <div class="container pt-5">
                <div class="row pt-5 ">
                  <div class="col-lg-3 col-sm-12 text-center text-">
                    <img class="img-fluid rounded-circle" style="height:250px; width:250px; object-fit:cover;" 
                        src="{{ auth()->check() && auth()->user()->image ? auth()->user()->image : asset('fontend/img/no-img.png') }}" 
                        alt="ảnh profile">
                    <p class="mt-2 text-white"><i class="fas fa-user"></i></i><strong class="ms-2">{{ auth()->check() ? auth()->user()->name : 'N/A' }}</strong></p>
                    <div class="text-white text-start">
                        
                        <p class="">
                            <i class="fas fa-mail-bulk"></i>
                            <strong class="ms-2">{{ auth()->check() ? auth()->user()->email : 'N/A' }}</strong>
                        </p>
                        <p class="">
                            <i class="fas fa-phone-square"></i>
                            <strong class="ms-2">{{ auth()->check() ? auth()->user()->phone : 'N/A' }}</strong>
                        </p>
                        <p class="">
                            <i class="fas fa-birthday-cake"></i>
                            <strong class="ms-2">{{ auth()->check() ? auth()->user()->birthday : 'N/A' }}</strong>
                        </p>
                        <p class="">
                            <i class="fas fa-venus-mars"></i>
                            <strong class="ms-2">{{ auth()->check() ? auth()->user()->gender : 'N/A' }}</strong>
                        </p>
                        <p class="">
                            <i class="fas fa-map-marker-alt"></i>
                            <strong class="ms-2">{{ auth()->check() ? auth()->user()->address : 'N/A' }}</strong>
                        </p>
                    </div>
                    <button type="button" class=" btn-sm btn btn-success rounded-0 shadow rounded mb-4" data-bs-toggle="modal"  data-bs-target="#update-infor-user">Cập nhật thông tin</button>
                  </div>
                  <div class="col-lg-9 col-sm-12 text-center text-">
                    <div class="text-start border" style="height:500px">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="#">Hoạt động gần dây</a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Tour yêu thích</a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Tour đã xem</a></li>
                                <li><a class="dropdown-item" href="#">Tour đã book</a></li>
                              </ul>
                            </li>
                          </ul>
                          <div class="text-dark ">
                            <pre class="ms-5 mt-3 fs-5"><strong>Ý tưởng update hệ thống: 
        Liên kết bảng booking với bảng user để có thể hiển thị các 
        tour đã book thông qua một trường user_id trong 
        bảng booking liên kết với id của user. Nếu người 
        dùng đăng nhập vào thì sẽ lấy thông Auth::user()->id</strong></pre> 
        <div class="text-center">
            <img class="text-center" width=300px, src="{{ asset('backend/img/logo/logo-TheSunTravel.png') }}" alt="">
        </div>
                           
                          </div>
                          
                    </div>
                  </div>
                </div>
                <div class="modal" id="update-infor-user"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    @auth
                    <form action="{{route('user.update2', Auth::user()->id)}}" method="post" class="box" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="role" value="{{ old('role', auth()->check() ? auth()->user()->role : '') }}">
                        <input type="hidden" name="status" value="{{ old('status', auth()->check() ? auth()->user()->status : '') }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body text-start px-4">                          
                                    <div class="pb-3">
                                        <p><strong>Họ và Tên <span class="text-danger">*</span></strong></p>
                                        <input type="text" name="name" class="form-control form-control-sm rounded-0 shadow bg-body rounded"
                                        value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}" placeholder="Nhập">
                                    </div>
                                    <div class="pb-3">
                                        <p><strong>Email <span class="text-danger">*</span></strong></p>
                                        <input type="email" name="email" class="form-control form-control-sm rounded-0 shadow bg-body rounded" 
                                        value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}"
                                        placeholder="Nhập">
                                    </div>
                                    <div class="pb-3">
                                        <p><strong>Ngày sinh <span class="text-danger">*</span></strong></p>
                                        <input type="date" 
                                         name="birthday" 
                                         class="form-control form-control-sm rounded-0 shadow bg-body rounded" 
                                         value="{{ old('birthday', auth()->check() && auth()->user()->birthday ? auth()->user()->birthday : '') }}" placeholder="Nhập">
                                    </div>
                                   
                                    <div class="pb-3">
                                        <p class="mb-7"><strong>Giới tính <span class="text-danger">*</span></strong></p>
                                        <select name="gender" class="form-control form-control-sm rounded-0 shadow bg-body rounded" id="">
                                            <option value="female" {{ old('gender', Auth::user()->gender) == 'femail' ? 'selected' : '' }}>nữ</option>
                                            <option value="male" {{ old('gender', Auth::user()->gender) == 'male' ? 'selected' : '' }}>nam</option>
                                            <option value="other" {{ old('gender', Auth::user()->gender) == 'other' ? 'selected' : '' }}>khác</option>
                                        </select>
                                    </div>                                    
                                    <div class="pb-3">
                                        <p><strong>Điện thoại di động<span class="text-danger">*</span></strong></p>
                                        <input type="text"
                                        name="phone" 
                                        class="form-control form-control-sm rounded-0 shadow bg-body rounded"
                                        value="{{ old('phone', auth()->check() ? auth()->user()->phone : '') }}" 
                                        placeholder="Nhập">
                                    </div>
                                    <div class="pb-3">
                                        <p><strong>Địa chỉ<span class="text-danger">*</span></strong></p>
                                        <input type="text"
                                        name="address" 
                                        class="form-control form-control-sm rounded-0 shadow bg-body rounded" 
                                        value="{{ old('address', auth()->check() ? auth()->user()->address : '') }}" 
                                        placeholder="Nhập">
                                    </div>                                
                                    <div >
                                        <p><strong>Ảnh đại diện<span class="text-danger">*</span></strong></p>
                                        <input type="file" name="image" class="form-control form-control-sm rounded-0 shadow bg-body rounded" placeholder="Nhập">
                                    </div>                                
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger btn-sm rounded-0 " data-bs-dismiss ="modal" >Thoát</button>
                          <button type="submi" class="btn btn-success btn-sm rounded-0">Lưu lại</button>
                        </div>
                      </div>
                    </div>
                    </form>
                    @else
                        <p>Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để thực hiện chức năng này.</p>
                    @endauth
                  </div>
            </div>
        </div>
    
@endsection
