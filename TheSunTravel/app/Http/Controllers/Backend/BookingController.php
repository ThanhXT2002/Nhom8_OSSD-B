<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingModel;
class BookingController extends Controller
{
    public function getBooking(Request $request)
    {
    // Bắt đầu query để lấy tất cả booking
    $query = BookingModel::query();

    // Lấy giá trị status từ request và thêm điều kiện nếu có
    $status = $request->query('status');
    if ($status !== null && $status !== '') {
        $query->where('status', $status);
    }

    // Lấy giá trị keyword từ request và thêm điều kiện nếu có
    $search = $request->query('keyword');
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->whereHas('tour', function ($q2) use ($search) {
                $q2->where('name', 'like', '%' . $search . '%')
                   ->orWhere('idT', 'like', '%' . $search . '%');
            })->orWhere('customer_name', 'like', '%' . $search . '%')
              ->orWhere('customer_phone', 'like', '%' . $search . '%')
              ->orWhere('customer_email', 'like', '%' . $search . '%');
        });
    }

    // Lấy danh sách booking với các điều kiện đã xây dựng
    $bookings = $query->orderBy('id', 'desc')->get();

    return view('backend.booking.getBooking', ['bookings' => $bookings, 'title' => 'Danh sách đặt tour']);
    }

    public function create(Request $request)
    {
        $booking = new BookingModel;
        $booking->tour_id = $request->tour_id;
        $booking->tour_departure_id = $request->tour_departure_id;
        $booking->customer_name = $request->customer_name;
        $booking->customer_email = $request->customer_email;
        $booking->customer_phone = $request->customer_phone;
        $booking->people_count = $request->people_count;
        $booking->total_price = $request->total_price;
        $booking->note = $request->note;
        $booking->save();
        return redirect()->back()->with('success', ' Bạn đã đặt Tour thành công!');
    }

    public function delete($id)
    {
        $booking = BookingModel::where('id', $id)->first();
        $booking->delete();
        return redirect()->route('booking.getBooking')->with('success','Xóa thành công');
    }

    public function edit($id)
    {
        $booking = BookingModel::where('id',$id)->first();
        return view('backend.booking.edit',['booking'=>$booking,'title'=>'Chỉnh sửa trạng thái booking']);
    }

    public function update(Request $request, $id)
    {
        $booking = BookingModel::findOrFail($id);
        $booking->status = $request->status;
       
        $booking->save();
        return redirect('backend/booking/getBooking')->with('success', "Sửa thành công!");
    } 
}
