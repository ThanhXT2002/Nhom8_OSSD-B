<table class="table table-bordered">
    <thead>
    <tr>
        <th class="text-center">Mã Số Tour</th>
        <th>Tên Tuor</th>
        <th class="text-center">Ngày bắt đầu</th>
        <th class="text-center">Ngày kết thúc</th>
        <th class="text-center">Tình trạng chỗ</th>
        
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>
       @if(isset($tour_departures)&& is_object($tour_departures))
       @foreach($tour_departures as $tour)
    <tr>
        
        <td class="text-center">
           {{$tour->tour->idT}}
        </td>
        <td >
            {{$tour->tour->name}}
        </td>
        <td class="text-center">
            {{$tour->start_date}}
        </td class="text-center">
        <td class="text-center">
            {{$tour->end_date}}
        </td>
        <td class="text-center">
            @if($tour->status == 0)
                <span class="label label-primary">Hết</span>
                    
            @elseif($tour->status == 1)
                <span class="label label-danger">Còn</span>
            @else
                <span class="label label-warning">Liên hệ</span>
            @endif
        </td>
        
       
        <td class="text-center table-btn ">
            <a href="{{route('tourdeparture.edit', $tour->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
            <a href="{{route('tourdeparture.delete', $tour->id)}}"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td> 
       
    </tr>
    @endforeach
    @endif
    </tbody>
</table>
{{-- <div class="text-center">  
    {{$tours->links('pagination::bootstrap-4')}}
</div> --}}



