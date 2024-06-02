<form action="{{route('booking.getBooking')}}" method="GET">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle">
            <select name="status" id="" class="form-control">
                <option value="">Chọn tình trạng</option>
                <option value="0">Chưa duyệt</option>
                <option value="1">Đã duyệt</option>
                <option value="2">Liên hệ lại</option>
            </select>
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
        </div>
    </div>
</form>
