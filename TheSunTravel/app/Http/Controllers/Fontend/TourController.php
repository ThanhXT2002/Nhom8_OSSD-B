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
        $domesticTours = TourModel::where('category', 1)->get(); // Sử dụng dấu phẩy thay vì '=='

        $InternationalTours = TourModel::where('category', 0)->get(); // Sử dụng dấu phẩy thay vì '=='

        return view('fontend.tour.index', compact('domesticTours','InternationalTours'));
    }

    public function detail($url)
    {
        // Tìm tour dựa trên url
        $tour = TourModel::where('url', $url)->with('tourDepartures')->firstOrFail();
        $domesticTours = TourModel::where('category', 1)->get();

        // Trả về view với dữ liệu tour và danh sách lịch khởi hành
        return view('fontend.tour.detail', compact('tour', 'domesticTours'));
    }

   
}
