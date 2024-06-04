@extends('fontend.layout.master')
@section('content')
    @include('fontend.layout.component.carousel')

    <!-- Destination Start -->

    <div class="container">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('tour.index') }}">Tour</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $tour->name }}</li>
            </ol>
        </nav>
        <h2>{{ $tour->name }}</h2>
        <div class="row">
            <div class="col-xl-8 mt-4">
                <h5 class="text-start mb-4">
                    Mã tour: <small class="text-success">{{ $tour->idT }}</small>
                </h5>
                <div class=" text-center">
                    <img class="rounded w-100" src="{{ $tour->image }}" alt="">
                </div>
                <div class="mt-3 text-justify bg-light p-3">
                    <h4>{{ $tour->name }}</h4>
                    <p>
                        {{ $tour->description }}
                    </p>
                </div>
                <div class=" bg-light ps-3 mt-2">
                    <div class="w-100 ps-5">
                        {!! $tour->intro !!}
                    </div>

                </div>
                <div class="mt-3">
                    <H5>Lịch Khởi Hành</H5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Ngày khởi hành</th>
                                <th scope="col">Ngày kết thúc</th>
                                <th scope="col">Tình trạng chỗ</th>
                                <th scope="col">Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tour->tourDepartures as $departure)
                                <tr>
                                    <td>{{ $departure->start_date }}</td>
                                    <td>{{ $departure->end_date }}</td>
                                    <td>{{ $departure->status == 1 ? 'Còn' : ($departure->status == 0 ? 'Hết' : 'Liên hệ') }}
                                    </td>
                                    <td>{{ number_format($tour->price) }} VNĐ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xl-4 desktop-booking-form bg-primary p-4 rounded" style="margin-top: 70px">
                <div class="sticky-top sticky-custom " id="booking_form">
                    <form action="{{ route('tour.booking') }}" method="post" id="booking_form">
                        @csrf
                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                        <div class="title">Lịch Trình và Giá Tour</div>
                        <div class="text-white">Đặt ngay, chỉ 2 phút. Hoặc gọi <a class="text-white" href="tel:02839338002">(028) 3933 8002</a></div>
                        <div class="text-white my-2">Chọn Lịch Trình và Xem Giá:</div>
                        <div class="">
                            <div class="left text-center my-2">
                                <select name="tour_departure_id" id="" class="form-control">
                                    @foreach ($tour->tourDepartures as $departure)
                                    <option value="{{ $departure->id }}">{{ $departure->start_date }} ---đến--- {{ $departure->end_date }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="box-white text-center rounded">
                            <span class="text-detail">
                                <span class="width-70 hadsub">Số lượng người: </span>
                            </span>
                            <span class="SpecialRateAdultAvg price-color hide-class"></span>
                            <span class="RateAdultAvg text-danger"> x {{ number_format($tour->price) }}</span>
                            <div class="btn-group">
                                <button type="button" class="btn number-button minus-adult btn-general">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <input type="number" class="mt-1 number-detail number-adult" name="people_count" value="1" id="people_count" min="1" readonly>
                                <button type="button" class="btn number-button plus-adult btn-general">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="showMsgPrice text-white my-3">
                            <span>Liên hệ để xác nhận chỗ</span>
                        </div>
                        <div class="priceDiv text-white">
                            <span class="lblPrice">Tổng Giá Tour: </span>
                            <strong class="price totalPrice" id="total_price">0</strong> <strong>VNĐ</strong>
                            <input type="text" class="price totalPrice" name="total_price" id="total_price2" value="{{$tour->price}}" hidden>
                            
                        </div>
                        <div class="my-3 text-white">
                            <label for="">Tên của bạn:</label>
                            <input type="text" class="form-controll w-100" name="customer_name" value="">
                        </div>
                        <div class="my-3 text-white">
                            <label for="">Số điện thoại:</label>
                            <input type="text" class="form-controll w-100" name="customer_phone" value="">
                        </div>
                        <div class="my-3 text-white">
                            <label for="">Email:</label>
                            <input type="text" class="form-controll w-100" name="customer_email" value="">
                        </div>
                        <div class="my-3 text-white">
                            <label for="">Ghi chú:</label>
                            <input type="text" class="form-controll w-100" name="note" value="">
                        </div>
                        <div class="d-flex justify-content-around mt-3">
                            <a href="tel:02839338002" class="btn btn-warning">Liên hệ ngay</a>
                            <button type="submit" class="btn btn-success">Đặt chỗ ngay</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tourPrice = {{ $tour->price }};
    
            // Function to update total price
            function updateTotalPrice() {
                var adultCount = parseInt(document.getElementById('people_count').value);
                var totalPrice = adultCount * tourPrice;
                var formattedTotalPrice = totalPrice.toLocaleString();
    
                // Update <strong> element
                document.getElementById('total_price').textContent = formattedTotalPrice;
                
                // Update <input> element
                document.getElementById('total_price2').value = totalPrice;
            }
    
            // Event listener for minus button
            document.querySelector('.minus-adult').addEventListener('click', function() {
                var countInput = document.getElementById('people_count');
                var count = parseInt(countInput.value);
                if (count > 1) {
                    count--;
                    countInput.value = count;
                    updateTotalPrice();
                }
            });
    
            // Event listener for plus button
            document.querySelector('.plus-adult').addEventListener('click', function() {
                var countInput = document.getElementById('people_count');
                var count = parseInt(countInput.value);
                count++;
                countInput.value = count;
                updateTotalPrice();
            });
    
            // Initial update of total price
            updateTotalPrice();
        });
    </script>
    
    


       

    <!-- Packages Start -->
    <div class="container-fluid packages py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h1 class="mb-0">---Gợi Ý Cho Bạn---</h1>
            </div>
            <div class="packages-carousel owl-carousel">
                @foreach ($remindsTours as $tour)
                <div class="packages-item">
                    <div class="packages-img">
                        {{-- 415*580 --}}
                        <img src="{{ $tour->image }}" class="img-fluid w-100 rounded-top" alt="Image">
                        <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute"
                            style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                            
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>{{$tour->time}}</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>{{$tour->quantity}}</small>
                        </div>
                    </div>
                    <div class="packages-content bg-light">
                        <div class="p-4 pb-0">
                            <h5 class="mb-0">{{$tour->name}}</h5>
                            <small class="text-uppercase font-weight">
                                <i class="fa fa-map-marker-alt me-2"></i>Điểm đến:</small>
                            <div class="mb-3">
                               {{$tour->place}}
                            </div>
                            <div class="mb-3">
                                <strong> Giá: {{ number_format($tour->price, 0, ',', '.') }} VNĐ</strong>
                            </div>
                            <p class="mb-4">{{$tour->description}}</p>
                        </div>
                        <div class="row bg-primary rounded-bottom mx-0">
                            <div class="col-6 text-start px-0">
                                <a href="{{route('tour.detail', $tour->url)}}" class="btn-hover btn text-white py-2 px-4">Chi tiết</a>
                            </div>
                            <div class="col-6 text-end px-0">
                                <a href="https://zalo.me/0936867190" class="btn-hover btn text-white py-2 px-4">Liên hệ ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection
