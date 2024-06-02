<form action="{{route('tourdeparture.getTourDeparture')}}" method="GET">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="input-group">
                <input 
                    type="text"
                    name = "keyword"
                    value="{{ request('keyword') ?: old('keyword') }}"
                    placeholder="Nhập từ khóa........"
                    class="form-control" >
                <span class="input-group-btn">
                     <button type="submit" name="search" value="search" class="btn btn-success mb0 btn-xl mr10">
                            Tìm kiếm
                    </button>
                </span>
            </div>
            
            <div class="action text-right">
                <div class="uk-flex uk-flex-middle">
                    <a href="{{route('tourdeparture.formCreate')}}" class="btn btn-danger"><i class="fa fa-plus mr5"></i>Thêm lịch trình</a>       
                </div>
            </div>
        </div>
    </div>
</form>
