@extends('backend.layout.layout')

@section('content')
    @include('backend.layout.component.breadcrumb')
    <div class="wrapper wrapper-content  fadeInRight">
        
        <form action="{{route('tourdeparture.update', $tourdeparture->id)}}" method="post" class="box" enctype="multipart/form-data">
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
                                            <label for="" class="control-label text-right">Tên tour du lịch
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <select name="tour_id" id="" class="form-control select2_demo_3">
                                                <option value="">Chọn tour</option>
                                                @foreach($tours as $tour)
                                                    <option value="{{ $tour->id }}" {{ old('tour_id', $tourdeparture->tour_id) == $tour->id ? 'selected' : '' }}>{{ $tour->idT }} --- {{ $tour->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-label text-right">Ngày bắt đầu
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="date" class="form-control" name="start_date" 
                                           
                                            value="{{ old('start_date', isset($tourdeparture) && $tourdeparture->start_date ? $tourdeparture->start_date->format('Y-m-d') : '') }}"
                                            >
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="" class="control-label text-right">Ngày về
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="date" class="form-control" name="end_date" 
                                        value="{{ old('start_date', isset($tourdeparture) && $tourdeparture->end_date ? $tourdeparture->end_date->format('Y-m-d') : '') }}"
                                        >
                                    </div>
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-12">
                                        <div class="form-row">
                                            <label for="" class="control-label text-left">Tình trạng chỗ
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1" {{ old('status', $tourdeparture->status) == '1' ? 'selected' : '' }}>Còn</option>
                                                <option value="0" {{ old('status', $tourdeparture->status) == '0' ? 'selected' : '' }}>Hết</option>
                                                <option value="2" {{ old('status', $tourdeparture->status) == '2' ? 'selected' : '' }}>Liên hệ</option>
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
