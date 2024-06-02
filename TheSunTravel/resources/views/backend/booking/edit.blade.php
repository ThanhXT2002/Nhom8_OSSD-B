@extends('backend.layout.layout')

@section('content')
    @include('backend.layout.component.breadcrumb')
    <div class="wrapper wrapper-content  fadeInRight">
        
        <form action="{{route('booking.update', $booking->id)}}" method="post" class="box" enctype="multipart/form-data">
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
                                            <label for="" class="control-label text-left">Tình trạng
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <select name="status" id="" class="form-control">
                                                <option value="0" {{ old('status', $booking->status) == '0' ? 'selected' : '' }}>Chưa duyệt</option>
                                                <option value="1" {{ old('status', $booking->status) == '1' ? 'selected' : '' }}>Đã duyệt</option>
                                                <option value="2" {{ old('status', $booking->status) == '2' ? 'selected' : '' }}>Liên hệ lại</option>
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
