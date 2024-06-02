@extends('backend.layout.layout')
@section('content')
    @include('backend.layout.component.breadcrumb')
    <div class="wrapper wrapper-content  fadeInRight">
        <form action="{{route('tour.create')}}" method="post" class="box" enctype="multipart/form-data">
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
                                    <div class="col-lg-12">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-right">Tên tour du lịch
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
                                    
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-right">Địa điểm
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input 
                                            type="text" 
                                            class="form-control"
                                            name="place"
                                            value="{{old('place')}}"
                                            autocomplete="off"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="" class="control-lable text-right">Loại tour
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <select name="category" id="" class="form-control">
                                            <option value="1">Trong nước</option>
                                            <option value="0">Quốc tế</option>
                                        </select>
                                       
                                    </div>
                                </div>
                                
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left">Giá ( 1 thành viên )
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input 
                                            type="text" 
                                            class="form-control"
                                            name="price"
                                            value="{{old('price')}}"
                                            autocomplete="off"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left">Số lượng người cho phép
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="text" 
                                            class="form-control" 
                                            value="{{old('quantity')}}" 
                                            name="quantity">
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left">Thời gian
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="text" 
                                            class="form-control" 
                                            name="time"
                                            value="{{old('time')}}" >
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

                                

                                <div class="row mb15">
                                    <div class="col-lg-12">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left">Hình ảnh
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="file" class="form-control " name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-12">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left"> Mô tả
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <textarea 
                                            class="inbox-textarea form-control" 
                                            name="description">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-12">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left"> Giới thiệu
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <textarea 
                                            class="summernote inbox-textarea form-control mb15" 
                                            name="intro"
                                            style="display: none;">{{old('intro')}}</textarea>
                                           
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
