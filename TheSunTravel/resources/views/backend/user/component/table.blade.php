<table class="table table-bordered">
    <thead>
    <tr>
       
       
        <th>Họ Tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th class="text-center">Tình trạng</th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>
       @if(isset($users)&& is_object($users))
       @foreach($users as $user)
    <tr>
        
        <td>
           {{$user->name}}
        </td>
        <td>
            {{$user->email}}
        </td>
        <td>
            {{$user->phone}}
        </td>
        <td>
            {{$user->address}}
        </td>
       
        <td class="text-center">
            @if($user->status == 1)
            <span class="label label-primary">Đang hoạt động</span>
                
            @else
            <span class="label label-danger">Ngưng hoạt động</span>
            @endif
        </td>
        <td class="text-center table-btn ">
            <a href="{{route('user.edit', $user->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
            <a href="{{route('user.delete', $user->id)}}"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
            {{-- {{route('user.detail', $user->id)}}
            
            {{route('user.delete', $user->id )}} --}}
        </td> 
       
    </tr>
    @endforeach
    @endif
    </tbody>
</table>
{{-- <div class="text-center">  
    {{$users->links('pagination::bootstrap-4')}}
</div> --}}



