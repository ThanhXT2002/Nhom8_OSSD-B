@extends('backend.layout.layout')

@section('content')
    @include('backend.layout.component.breadcrumb')
    <div class="wrapper wrapper-content  fadeInRight">
        
        <form action="{{route('user.update', $user->id)}}" method="post" class="box" enctype="multipart/form-data">
            @csrf
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="text-right mb15">
                    <button  type="submit" class="btn btn-info "><i class="fa fa-plus mr5"></i>Lưu lại</button>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel-title">Thông tin chung</div>
                        <div class="m-b-xs">Lưu ý: Những ô có <strong class="text-danger">(*)</strong> không được bỏ trống.</div>
                            <div class="panel-desription text-center">
                                <img src="{{$user->image}}" alt="ảnh đại diện">
                            </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-right">Tên thành viên
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input 
                                            type="text" 
                                            class="form-control"
                                            name="name"
                                            value="{{ old('name', isset($user) ? $user->name : '') }}"
                                            autocomplete="off"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-right">Số điện thoại
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input 
                                            type="text" 
                                            class="form-control"
                                            name="phone"
                                            value="{{ old('phone', isset($user) ? $user->phone : '') }}"
                                            autocomplete="off"
                                            >
                                        </div>
                                    </div>
                                </div>
        
                                
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left">Email
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input 
                                            type="text" 
                                            class="form-control"
                                            name="email"
                                            value="{{ old('email', isset($user) ? $user->email : '') }}"
                                            autocomplete="off"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left">password
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="text" 
                                            class="form-control" 
                                            value="{{old('password')}}" 
                                            name="password">
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left">Ngày sinh
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input 
                                            type="date" 
                                            class="form-control"
                                            {{-- value="{{ old('birthday', isset($user) ? $user->birthday->format('mm-dd-yyyy') : '') }}" --}}
                                            value="{{ old('birthday', isset($user) && $user->birthday ? $user->birthday->format('Y-m-d') : '') }}"
                                            name="birthday">
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-label text-left">Giới tính</label>
                                            <select name="gender" id="" class="form-control">
                                                <option value="male" {{ old('gender', isset($user) ? $user->gender : '') == 'male' ? 'selected' : '' }}>Nam</option>
                                                <option value="female" {{ old('gender', isset($user) ? $user->gender : '') == 'female' ? 'selected' : '' }}>Nữ</option>
                                                <option value="other" {{ old('gender', isset($user) ? $user->gender : '') == 'other' ? 'selected' : '' }}>Khác</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left">Địa chỉ
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input 
                                            type="text" 
                                            class="form-control " 
                                            name="address"
                                            value="{{ old('address', isset($user) ? $user->address : '') }}">
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-label text-left">Ảnh đại diện</label>
                                            <input type="file" class="form-control upload-image" name="image">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left"> Quyền tài khoản
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <select name="role" id="" class="form-control">
                                                <option value="1" {{ old('role', isset($user) ? $user->role : '') == '1' ? 'selected' : '' }}>Quản trị viên</option>
                                                <option value="0" {{ old('role', isset($user) ? $user->role : '') == '0' ? 'selected' : '' }}>Người dùng</option>
                                            </select>
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-label text-left">Trạng thái</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1" {{ old('status', isset($user) ? $user->status : '') == '1' ? 'selected' : '' }}>Hoạt động</option>
                                                <option value="0" {{ old('status', isset($user) ? $user->status : '') == '0' ? 'selected' : '' }}>Ngưng hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </form>
    </div>
@endsection
