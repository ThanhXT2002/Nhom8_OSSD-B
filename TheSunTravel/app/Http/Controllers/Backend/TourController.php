<?php

namespace App\Http\Controllers\Backend;
use App\Models\TourModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function getTour(Request $request)
    {
        $search = $request->query('keyword');

        if ($search) {
            $tours = TourModel::where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('place', 'like', '%' . $search . '%')
            ->orWhere('price', 'like', '%' . $search . '%')
            ->orWhere('time', 'like', '%' . $search . '%')
            ->get();
        } else {
            $tours = TourModel::orderBy('id', 'desc')->get();
        }
        return view('backend.tour.getTour',['tours'=>$tours,'title'=>'Danh sách tour du lịch']);
    }
    
    public function formCreate()
    {
        return view('backend.tour.create',['title'=>'Thêm tour du  lịch']);
    }

    public function create(Request $request)
    {
        $tour = new TourModel;
        $tour->name = $request->name;
        $tour->description = $request->description;
        $tour->place = $request->place;
        $tour->price = $request->price;
        $tour->time = $request->time;
        $tour->quantity = $request->quantity;
        $tour->intro = $request->intro;
        $tour->category = $request->category;
        $tour->status = $request->status;
        // Tạo giá trị cho trường idT và url
        $tour->idT = 'T' . now()->format('YmdHis'); // Format ngày tháng năm hiện tại
        $tour->url = Str::slug($request->name); // Tạo URL từ tên tour
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = 'data:image/png;base64,' . base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            $tour->image = $image;
        }
        $tour->save();
        return redirect()->route('tour.getTour')->with('success', "Thêm thành công!");
    }
    public function edit($id)
    {
        $tour = TourModel::where('id',$id)->first();
        return view('backend.tour.edit',['tour'=>$tour,'title'=>'Chỉnh sửa tour du lịch']);
    }
    public function update(Request $request,$id)
    {
        $tour = TourModel::findOrFail($id);
        $tour->name = $request->name;
        $tour->description = $request->description;
        $tour->place = $request->place;
        $tour->price = $request->price;
        $tour->time = $request->time;
        $tour->quantity = $request->quantity;
        $tour->intro = $request->intro;
        $tour->status = $request->status;
        $tour->category = $request->category;
        $tour->url = Str::slug($request->name); // Tạo URL từ tên tou
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = 'data:image/png;base64,' . base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            $tour->image = $image;
        }
        $tour->save();
        return redirect()->route('tour.getTour')->with('success', "Chỉnh sửa thành công!");
    }
    public function delete($id)
    {
        $tour = TourModel::where('id', $id)->first();
        $tour->delete();
        return redirect()->route('tour.getTour')->with('success','Xóa thành công');
    }
}
