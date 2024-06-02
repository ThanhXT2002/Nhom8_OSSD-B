<?php

namespace App\Http\Controllers\Backend;
use App\Models\TourDepartureModel;
use App\Models\TourModel;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TourDepartureController extends Controller
{
    public function getTourDeparture(Request $request)
        {
            $search = $request->query('keyword');

            if ($search) {
                $tour_departures = TourDepartureModel::whereHas('tour', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')->orWhere('idT', 'like', '%' . $search . '%');
                })->orWhere('tour_id', 'like', '%' . $search . '%')->get();
            } else {
                $tour_departures = TourDepartureModel::orderBy('id', 'desc')->get();
            }
            return view('backend.tourdeparture.getTourDeparture', ['tour_departures' => $tour_departures, 'title' => 'Danh sách lịch khởi hành']);
        }
    public function formCreate(Request $request)
    {
        $tours = TourModel::all(); // Lấy danh sách các tour
        return view('backend.tourdeparture.create', ['title' => 'Thêm lịch khởi hành', 'tours' => $tours]);
    }
    public function create(Request $request)
    {
        $tourdeparture = new TourDepartureModel();
        $tourdeparture->tour_id = $request->tour_id;
        $tourdeparture->start_date = $request->start_date;
        $tourdeparture->end_date = $request->end_date;
        $tourdeparture->status = $request->status;
        $tourdeparture->save();
        return redirect()->route('tourdeparture.getTourDeparture')->with('success', "Thêm thành công!");
    }

    public function edit($id)
    {
        $tourdeparture = TourDepartureModel::find($id); // Sử dụng find để tìm bản ghi với id
        $tours = TourModel::all(); // Lấy danh sách các tour
        if ($tourdeparture->start_date) {
            $tourdeparture->start_date = Carbon::parse($tourdeparture->start_date);
        }
        if ($tourdeparture->end_date) {
            $tourdeparture->end_date = Carbon::parse($tourdeparture->end_date);
        }
    return view('backend.tourdeparture.edit', ['tourdeparture' => $tourdeparture, 'tours' => $tours, 'title' => 'Chỉnh sửa lịch trình']);
    }
    public function update(Request $request, $id)
    {
        $tourdeparture = TourDepartureModel::findOrFail($id);
        $tourdeparture->tour_id = $request->tour_id;
        $tourdeparture->start_date = $request->start_date;
        $tourdeparture->end_date = $request->end_date;
        $tourdeparture->status = $request->status; 
        $tourdeparture->save();
        return redirect()->route('tourdeparture.getTourDeparture')->with('success', "Sửa thành công!");
    }

    public function delete($id)
    {
        $tour = TourDepartureModel::where('id', $id)->first();
        $tour->delete();
        return redirect()->route('tourdeparture.getTourDeparture')->with('success','Xóa thành công');
    }
}
