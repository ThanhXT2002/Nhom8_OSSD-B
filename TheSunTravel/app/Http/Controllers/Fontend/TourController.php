<?php

namespace App\Http\Controllers\Fontend;
use App\Models\TourModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domesticTours = TourModel::where('category', 1)->where('status',1)->get(); // Sử dụng dấu phẩy thay vì '=='

        $InternationalTours = TourModel::where('category', 0)->where('status',1)->get(); // Sử dụng dấu phẩy thay vì '=='

        return view('fontend.tour.index', compact('domesticTours','InternationalTours'));
    }

    public function detail($url)
    {
        // Tìm tour dựa trên url
        $tour = TourModel::where('url', $url)->with('tourDepartures')->firstOrFail();
        // Lấy category của tour hiện tại
        $category = $tour->category;
            // Truy vấn các tour có cùng category và có status = 1, loại trừ tour hiện tại
        $remindsTours = TourModel::where('category', $category)
        ->where('status', 1)
        ->where('id', '!=', $tour->id)
        ->get();

        // Trả về view với dữ liệu tour và danh sách lịch khởi hành
        return view('fontend.tour.detail', compact('tour', 'remindsTours'));
    }

   
}
