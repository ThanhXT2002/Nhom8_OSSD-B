@extends('backend.layout.layout')

@section('content')
    @include('backend.layout.component.breadcrumb')
    <div class="wrapper wrapper-content  fadeInRight">
        <form action="{{route('menu.create')}}" method="post" class="box" enctype="multipart/form-data">
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
                                            <label for="" class="control-lable text-right">Tên menu
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input 
                                            type="text" 
                                            class="form-control"
                                            name="name"
                                            value="{{old('name')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-right">Link
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input 
                                            type="text" 
                                            class="form-control"
                                            name="link"
                                            value="{{old('link')}}" required >
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row mb15">
                                    
                                    <div class="col-lg-6">
                                        <label for="" class="control-lable text-right">Icon
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control"
                                            name="icon"
                                            value="{{old('icon')}}" required >
                                       
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left">Trạng thái
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1">Hoạt động</option>
                                                <option value="0">Tạm ngừng</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb15">
                                    <div class="col-lg-12">
                                        <div class="form-row">
                                            <label for="" class="control-lable text-left">Ghi chú
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input 
                                            type="text" 
                                            class="form-control"
                                            name="note"
                                            value="{{old('note')}}">
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
