<div>
@foreach ($consulations as $cons)
    <div class="d-block mx-auto col-lg-12 col-md-12 mb-5 consulation" id="{{$cons->id}}">
        <div class="card blog-detail">
            <div class="card-body">
                <div >
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0)" class="me-3">

                                @if ($cons->user->image != null)
                                    <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/'.$cons->user->id.'/'.$cons->user->image)}}">
                                @else
                                    @if ($cons->user->gender == "ذكر")
                                        <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/male.jpg')}}">
                                    @else
                                        <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/female.jpg')}}">
                                    @endif
                                @endif
                            </a>
                            <a href="javascript:void(0)" class="text-dark">
                                <h2 class="font-weight-semibold m-0">
                                        {{$cons->user->name}}
                                </h2>
                            </a>
                        </div>
                        @if(Auth::guard('user')->check())
                            @if (Auth::guard('user')->user()->id == $cons->user_id)
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light delete_cons" data-bs-toggle="tooltip" data-bs-original-title="حذف" wire:click="del({{ $cons->id }})"><i class="fe fe-trash fs-16"></i></a>
                                </div>
                            @endif
                        @endif
                    </div>

                    <p class="ps-3 mt-3 mb-0"> التخصص : {!!$cons->specialization->title!!}</p>
                    <p class="ps-3 mb-0">المحامى : {!!$cons->lawyer->name!!}</p>
                    <p class="ps-3 ">التفاصيل : {!! nl2br($cons->details) !!}</p>
                    <div class="item7-card-desc d-md-flex mb-2 mt-3">
                        <a href="javascript:void(0)" class="font-weight-semibold fs-16 ms-0"><i class="fe fe-calendar me-2 text-primary float-start mt-1"></i>{{$cons->created_at->diffForHumans()}}</a>
                        <div class="ms-auto">
                            <a href="javascript:void(0)" class="font-weight-semibold fs-16 me-0 cons-replies"><i class="fe fe-message-circle me-2 text-primary float-start mt-1"></i><span>{{$cons->replies->count()}}</span> ردود</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card replies">
            <div class="card-header">
                <h3 class="card-title">الردود</h3>
            </div>
            <div class="card-body replies_result">
                @if($cons->replies->count() == 0)
                    <h5 class="no-replies" >لا يوجد أى ردود</h5>
                @else
                    @livewire('replies', ['replies' => $cons->replies , 'cons_id' => $cons->id], key('cons-'.$cons->id))
                @endif
            </div>

        </div>
        @if(Auth::guard('lawyer')->check() || Auth::guard('user')->check())
            <div class="card mb-lg-0">
                <div class="card-header">
                    <h3 class="card-title">أضف ردك</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea class="form-control" name="text" wire:model.lazy='content' rows="6" placeholder="إكتب ردك"></textarea>
                        @if($reply_con_id == $cons->id)
                            @error('content') <span class="text-danger error">{{ $message }}</span>@enderror
                        @endif
                    </div>
                    <a href="javascript:void(0)" class="btn btn-primary addreply" wire:click="addReply({{ $cons->id }})">أضف</a>
                </div>
            </div>
        @endif
    </div>
@endforeach
</div>
