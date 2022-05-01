<div>
    @foreach ($replies as $reply)
        <div class="media mt-0 p-5 border br-7 review-media mb-3">
            <div class="d-flex me-3">
                <div class="d-flex">
                    <a href="javascript:void(0)">
                        @if ($reply->reply_type == 'lawyer')
                            @if ($reply->lawyer->image != null)
                                <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/lawyers/'.$reply->lawyer->id.'/'.$reply->lawyer->image)}}">
                            @else
                                <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/lawyers/male.jpg')}}">
                            @endif
                        @else
                            @if ($reply->user->image != null)
                                <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/'.$reply->user->id.'/'.$reply->user->image)}}">
                            @else
                                @if ($reply->user->gender == 'ذكر')
                                    <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/male.jpg')}}">
                                @else
                                    <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/female.jpg')}}">
                                @endif
                            @endif
                        @endif
                    </a>
                </div>
            </div>
            <div class="media-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center flex-column">
                        <h4 class="mt-0 mb-1 font-weight-semibold">
                            @if ($reply->reply_type == 'lawyer')
                                {{$reply->lawyer->name}}
                            @else
                                {{$reply->user->name}}
                            @endif
                        </h4>
                        <small class="text-muted fs-14">
                            <i class="fa fa-clock-o"></i>  {{$reply->created_at->diffForHumans()}}
                        </small>
                    </div>
                    <div class="d-flex align-items-center">
                        @if($reply->reply_type == 'lawyer' && Auth::guard('lawyer')->check())
                            @if (Auth::guard('lawyer')->user()->id == $reply->reply_id)
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light me-3 edit_reply"  data-bs-toggle="tooltip" data-bs-original-title="تعديل" wire:click='editReply({{ $reply->id }})'><i class="fe fe-edit-2 fs-16"></i></a>
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light delete_reply" data-bs-toggle="tooltip" data-bs-original-title="حذف" wire:click='delReply({{ $reply->id }})'><i class="fe fe-trash fs-16"></i></a>
                                </div>
                            @endif
                        @elseif($reply->reply_type == 'user' && Auth::guard('user')->check())
                            @if (Auth::guard('user')->user()->id == $reply->reply_id)
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light me-3 edit_reply"  data-bs-toggle="tooltip" data-bs-original-title="تعديل" wire:click='editReply({{ $reply->id }})'><i class="fe fe-edit-2 fs-16"></i></a>
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light delete_reply" data-bs-toggle="tooltip" data-bs-original-title="حذف" wire:click='delReply({{ $reply->id }})'><i class="fe fe-trash fs-16"></i></a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                @if($reply->id != $reply_id)
                <p class="font-13 fs-15 mb-2 mt-2" >{!! nl2br($reply->content) !!}</p>
                @else
                <div class ="edit_rep">
                    <div class="form-group">
                        <textarea class="form-control" name="text" rows= "5" wire:model.lazy="content" placeholder="أكتب ردك"></textarea>
                        @error('content') <span class="text-danger error">{{ $message }}</span>@enderror

                    </div>
                    <a href="javascript:void(0)" class="btn btn-primary E_reply" wire:click='edit({{ $reply->id }})'>تعديل</a>
                    <a href="javascript:void(0)" class="btn btn-primary cancelEditReply"  wire:click='cancel'>إلغاء</a>
                </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
