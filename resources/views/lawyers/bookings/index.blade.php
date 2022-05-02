@extends('lawyers.layout')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">حجز المواعيد</h1>
</div>
@endpush

@section('page')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="row">
            <div class="col-lg-12">
                <div class="card detial-table">
                    <div class="card-header">
                        <h3 class="card-title"> حجز المواعيد</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="data-table-example dashboard table table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الصورة</th>
                                        <th>الاسم</th>
                                        <th>الموبايل</th>
                                        <th>حالة الحجز</th>
                                        <th>ميعاد الحجز</th>
                                        <th>إعدادات</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $b)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                                @if ($b->user->image != null)
                                                    <img src="{{asset('assets/images/data/users/'.$b->user->id.'/'.$b->user->image)}}" alt="img" class="w-7 h-7 br-7 me-3">
                                                @else
                                                    @if($b->user->gender == 'ذكر')
                                                    <img src="{{asset('assets/images/data/users/male.jpg')}}" alt="img" class="w-7 h-7 br-7 me-3">
                                                    @else
                                                    <img src="{{asset('assets/images/data/users/female.jpg')}}" alt="img" class="w-7 h-7 br-7 me-3">
                                                    @endif
                                                @endif

                                        </td>
                                        <td>
                                            {{$b->user->name}}
                                        </td>
                                        <td>{{$b->user->phone}}</td>
                                        <td>
                                            @if($b->status == 'wait')
                                                إنتظار
                                            @elseif($b->status == 'accept')
                                                تم الحجز
                                            @else
                                                رفض الحجز
                                            @endif
                                        </td>
                                        <td dir="ltr">
                                            @if($b->status == 'accept')
                                                {{ $b->book_at }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($b->status == 'wait')
                                                <a class="btn btn-outline-light btn-sm waves-effect waves-light"  href="{{ route('lawyer.bookings.accept',['id'=>$b->id]) }}">قبول</a>
                                                <a class="btn btn-outline-light btn-sm waves-effect waves-light" href="{{ route('lawyer.bookings.reject',['id'=>$b->id]) }}">رفض</a>
                                            @endif
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
