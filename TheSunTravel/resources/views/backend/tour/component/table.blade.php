<table class="table table-bordered">
    <thead>
    <tr>    
        <th>Mã Số Tour</th>
        <th>Tên</th>
        <th>Địa điểm</th>
        <th>Giá</th>
        <th class="text-center">Thời gian</th>
        <th class="text-center">Trạng thái</th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>
       @if(isset($tours)&& is_object($tours))
       @foreach($tours as $tour)
    <tr>  
        <td> {{$tour->idT}}</td>
        <td> {{$tour->name}} </td>
        <td> {{$tour->place}}</td>
        <td>  {{$tour->price}}</td>
        <td> {{$tour->time}}</td>
        <td class="text-center">
            @if($tour->status == 1)
             <span class="label label-primary">Đang hoạt động</span>         
            @else
            <span class="label label-danger">Ngưng hoạt động</span>
            @endif
        </td>
        <td class="text-center table-btn ">
            <a href="{{route('tour.edit', $tour->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
            <a href="{{route('tour.delete', $tour->id)}}"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td> 
    </tr>
    @endforeach
    @endif
    </tbody>
</table>
{{-- <div class="text-center">  
    {{$tours->links('pagination::bootstrap-4')}}
</div> --}}



