@extends('admins.layout')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم التخصصات</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">التخصصات</h3>
    </div>
    <div class="card-body">
        <div class="ads-tabs">
            <div class="tabs-menus">
                <ul class="nav panel-tabs">
                    <li class="me-3"><a href="#tab1" class="active" data-bs-toggle="tab">جميع التخصصات</a></li>
                    <li><a href="#tab2" data-bs-toggle="tab">إضافة تخصص جديد</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active table-responsive userprof-tab" id="tab1">
                    <table class="data-table-example table table-bordered table-hover mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th>التخصص</th>
                                <th>إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($specs as $spec)
                            <tr id="tr_{{$spec->id}}">
                                <td>
                                    <div class="media mt-0 mb-0">
                                        <div class="card-aside-img">
                                            <a href="javascript:void(0)"></a>
                                            <img src="{{asset('assets/images/media/color/sm-2/4.jpg')}}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="card-item-desc ms-2 p-0 mt-0">
                                                <a href="javascript:void(0)" class="text-dark">
                                                    <h4 class="font-weight-bold">{{$spec->title}}</h4>
                                                </a>
                                                <a href="javascript:void(0)" class="text-dark">
                                                    <h4 class="font-weight-bold">عدد المحامين : {{$spec->lawyers->count()}}
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light"
                                        data-bs-toggle="tooltip" data-bs-original-title="تعديل"
                                        href="{{ route('admin.specialization.edit',['id'=>$spec->id]) }}"><i
                                            class="fe fe-edit-2 fs-16"></i></a>
                                    @if ($spec->lawyers->count() == 0)
                                    <form action="{{  route('admin.specialization.delete',['id'=>$spec->id])  }}" method="post" class="d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-light btn-sm waves-effect waves-light"
                                        data-bs-toggle="tooltip" data-bs-original-title="حذف" type="submit"><i class="fe fe-trash fs-16"></i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane userprof-tab" id="tab2">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class=" m-b-20">
                                <div class="card-header">
                                    <h3 class="card-title">إضافة تخصص جديد</h3>
                                </div>
                                <div class="card-body">
                                    @livewire('admin.specialization.add')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

