<li class="dropdown header-notification d-flex me-3">
    @if(auth('lawyer')->check())
        <a class="nav-link icon m-0" data-bs-toggle="dropdown" id="notify">
            <i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#fff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg></i>
            <span class=" nav-unread badge badge-pill notify-count" style=" background: #C2AB2F; ">{{ $count }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-start dropdown-menu-arrow notification" aria-labelledby="notify">
            @if($notifications->count() > 0)
                <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center mark-all" wire:click='readAll({{ auth('lawyer')->user()->id }})'>Mark All As Read </a>
                <div class="dropdown-divider"></div>
                <div class = "notification-result" style="overflow-y: scroll;height: calc(61px * 5);">
                    @foreach ($notifications as $notify)
                        @if($notify->type == 'cosulation')
                        <a href="{{ route('lawyer.consulations.show' , ['cons_id' => json_decode($notify->data)->cons_id , 'notify_id' => $notify->id]) }}"
                            class="dropdown-item d-flex pb-3 align-items-center" style = " color:#1e2125; @if(!$notify->read_at) background-color: #e9ecef; @endif ">
                            <div class="notify-img">
                                <i class="fe fe-help-circle"></i>
                            </div>
                            <div>
                                هناك استشارة جديدة
                            </div>
                        </a>
                        @elseif ($notify->type == 'reply')
                        <a href="{{ route('lawyer.consulations.show' , ['cons_id' => json_decode($notify->data)->cons_id , 'notify_id' => $notify->id]) }}"
                            class="dropdown-item d-flex pb-3 align-items-center" style = " color:#1e2125;@if(!$notify->read_at) background-color: #e9ecef; @endif">
                            <div class="notify-img">
                                <i class="fa fa-comment-o"></i>
                            </div>
                            <div>
                                تم الرد على الإستشارة
                            </div>
                        </a>
                        @elseif($notify->type == 'booking')
                            <a href="{{ route('lawyer.bookings.show' , ['booking_id' => json_decode($notify->data)->booking_id , 'notify_id' => $notify->id]) }}"
                                class="dropdown-item d-flex pb-3 align-items-center" style = " color:#1e2125;@if(!$notify->read_at) background-color: #e9ecef; @endif">
                                <div class="notify-img">
                                    <i class="fa fa-help-circle"></i>
                                </div>
                                <div>
                                    هناك حجز ميعاد جديد
                                </div>
                            </a>

                        @endif
                    @endforeach
                </div>
            @endif
            @if($notifications->count() == 0)
                <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center">not found notification</a>
            @endif
        </div>
    @endif
    @if(auth('user')->check())
        <a class="nav-link icon m-0" data-bs-toggle="dropdown" id="notify">
            <i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#fff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg></i>
            <span class=" nav-unread badge badge-pill notify-count" style=" background: #C2AB2F; ">{{ $count }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-start dropdown-menu-arrow notification" aria-labelledby="notify">
            @if($notifications->count() > 0)
                <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center mark-all" wire:click='readAll({{ auth('user')->user()->id }})'>Mark All As Read </a>
                <div class="dropdown-divider"></div>
                <div class = "notification-result" style="overflow-y: scroll;height: calc(61px * 5);">

                    @foreach ($notifications as $notify)
                        @if ($notify->type == 'reply')
                            <a href="{{ route('user.consulations.show' , ['cons_id' => json_decode($notify->data)->cons_id , 'notify_id' => $notify->id]) }}"
                                class="dropdown-item d-flex pb-3 align-items-center" style = " color:#1e2125;@if(!$notify->read_at) background-color: #e9ecef; @endif">
                                <div class="notify-img">
                                    <i class="fa fa-comment-o"></i>
                                </div>
                                <div>
                                    تم الرد على الإستشارة
                                </div>
                            </a>
                        @elseif($notify->type == 'booking')
                            <a href="{{ route('user.bookings.show' , ['booking_id' => json_decode($notify->data)->booking_id , 'notify_id' => $notify->id]) }}"
                                class="dropdown-item d-flex pb-3 align-items-center" style = " color:#1e2125;@if(!$notify->read_at) background-color: #e9ecef; @endif">
                                <div class="notify-img">
                                    <i class="fa fa-help-circle"></i>
                                </div>
                                <div>
                                    تم الرد على الحجز
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
            @if($notifications->count() == 0)
                <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center">not found notification</a>
            @endif
        </div>
    @endif
</li>
