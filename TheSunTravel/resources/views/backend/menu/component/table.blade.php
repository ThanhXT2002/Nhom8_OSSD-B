<table class="table table-bordered">
    <thead>
    <tr>
        <th>Tên menu</th>
        <th>link</th>
        <th class="text-center">icon</th>
        <th class="text-center">Trạng thái</th>
        
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>
       @if(isset($menus)&& is_object($menus))
       @foreach($menus as $menu)
    <tr>
        <td>
           {{$menu->name}}
        </td>
        <td >
            {{$menu->link}}
        </td>
        <td class="text-center">
            {{$menu->icon}}
        </td >
        <td class="text-center">
            @if($menu->status == 0)
                <span class="label label-primary">tạm ngưng</span>      
            @elseif($menu->status == 1)
                <span class="label label-danger">Hoạt động</span>
            @else
                <span class="label label-warning">Sai thông tin</span>
            @endif
        </td>
        <td class="text-center table-btn ">
            <a href="{{route('menu.edit', $menu->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
            <a href="{{route('menu.delete', $menu->id)}}"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td> 
    </tr>
    @endforeach
    @endif
    </tbody>
</table>



