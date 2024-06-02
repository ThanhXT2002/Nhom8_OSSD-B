<?php

namespace App\Http\Controllers\Backend;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(Request $request){
        $search = $request->query('keyword');
        if ($search) {
            $users = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->get();
        } else {
            $users = User::orderBy('id', 'desc')->get();
        }
          return view('backend.user.index',['users'=>$users,'title'=>'Danh sách thành viên']);
    }
    public function formCreate(){
        return view('backend.user.create',['title'=>'Thêm mới thành viên']);
    }
    function create(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->status = $request->status;
        // Mã hóa mật khẩu trước khi lưu
        $user->password = Hash::make($request->password);
    
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = 'data:image/png;base64,' . base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            $user->image = $image;
        }
        $user->save();
        return redirect()->route('user.index')->with('success', "Thêm thành công!");
    }

    public function edit($id){
        $user = User::where('id',$id)->first();
        // Chuyển đổi 'birthday' thành đối tượng Carbon nếu không phải là null
        if ($user->birthday) {
            $user->birthday = Carbon::parse($user->birthday);
        }
        return view('backend.user.edit',['user'=>$user,'title'=>'Chỉnh sửa thông thành viên']);
    }

    function update(Request $request,$id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->status = $request->status;
        // Mã hóa mật khẩu trước khi lưu
        $user->password = Hash::make($request->password);
    
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = 'data:image/png;base64,' . base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            $user->image = $image;
        }
        $user->save();
        return redirect()->route('user.index')->with('success', "Chỉnh sửa thành công!");
    }
    function delete($id){
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('user.index')->with('success','Xóa thành công');
    }
}
