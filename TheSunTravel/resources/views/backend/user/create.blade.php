@extends('backend.layout.layout')

@section('content')
    @include('backend.layout.component.breadcrumb')
    <div class="wrapper wrapper-content  fadeInRight">
        <form action="{{route('user.create')}}" method="post" class="box" enctype="multipart/form-data">
            @csrf
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="text-right mb15">
                    <button  type="submit" class="btn btn-info "><i class="fa fa-plus mr5"></i>Lưu lại</button>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel-title">Thông tin chung</div>
                        <div class="panel-desription"><p>Nhập thông tin của người sử dụng</p>
                            <p>Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
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
                                            value="{{old('name')}}"
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
                                            value="{{old('pname')}}"
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
                                            value="{{old('email')}}"
                                            autocomplete="off"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left">password
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="text" class="form-control" value="{{old('password')}}" name="password">
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left">Ngày sinh
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="date" class="form-control" name="birthday">
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-label text-left">Giới tính</label>
                                            <select name="gender" id="" class="form-control">
                                                <option value="male">Nam</option>
                                                <option value="female">Nữ</option>
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
                                            <input type="text" class="form-control " name="address">
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
                                                <option value="1">Quản trị viên</option>
                                                <option value="0">Người dùng</option>
                                            </select>
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-label text-left">Trạng thái</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1">Hoạt động</option>
                                                <option value="0">Ngưng hoạt động</option>
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
