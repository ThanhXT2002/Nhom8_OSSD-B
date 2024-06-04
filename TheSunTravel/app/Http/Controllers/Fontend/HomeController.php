<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourModel;
class HomeController extends Controller
{
    public function index(){
        $tours = TourModel::where('status',1)->get();

        return view('fontend.home.index', compact('tours'));
    }

    public function search(Request $request)
    {
        $search = $request->query('keyword');
        

        if ($search) {
            $tours = TourModel::where('status', 1)
                ->where(function($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('place', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%')
                        ->orWhere('time', 'like', '%' . $search . '%');
                })
                ->get();

            return view('fontend.home.resultSearch', ['tours' => $tours, 'title' => 'Kết quả tìm kiếm']);
        }

        return redirect()->back()->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
    }
}
