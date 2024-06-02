<div class="table-responsive">
<table class="table table-bordered footable table table-striped table-bordered table-hover dataTables-example toggle-arrow-tiny">
    <thead>
    <tr>
        <th class="text-center " data-toggle="true">Mã tour</th>
        <th>Tên khách hàng</th>
        <th class="text-center">Điện thoại</th>
        <th class="text-center">số lượng người</th>
        <th class="text-center">Tình trạng</th>


        <th data-hide="all">Tên tour</th>
        <th data-hide="all">Ngày khởi hành</th>
        <th data-hide="all">Ngày Kết thúc</th>
        <th data-hide="all">Email khách hàng</th>
        <th data-hide="all">Tổng tiền</th>
        <th data-hide="all">Ghi chú</th>
        
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>
       @if(isset($bookings)&& is_object($bookings))
       @foreach($bookings as $booking)
    <tr>
        
        <td class="text-center">
           {{$booking->tour->idT}}
        </td>
        <td >
            {{$booking->customer_name}}
        </td>
        <td class="text-center">
            {{$booking->customer_phone}}
        </td >
        <td class="text-center">
            {{$booking->people_count}}
        </td>
        <td class="text-center">
            @if($booking->status == 0)
                <span class="label label-danger">Chưa duyệt</span>
                    
            @elseif($booking->status == 1)
                <span class="label label-primary">Đã duyệt</span>
            @else
                <span class="label label-info">Liện hệ lại</span>
            @endif
        </td>

        <td> {{ $booking->tour->name}}</td>
        <td> {{ $booking->tourDeparture->start_date }}</td>
        <td> {{ $booking->tourDeparture->end_date }}</td>
        <td> {{ $booking->customer_email }}</td>
        <td> {{ $booking->total_price }}</td>
        <td> {{ $booking->note}}</td>


        
       
        <td class="text-center table-btn ">
            <a href="{{route('booking.edit', $booking->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
            <a href="{{route('booking.delete', $booking->id)}}"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td> 
       
    </tr>
    @endforeach
    @endif
    </tbody>
</table>
</div>




