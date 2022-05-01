<div class="row">
@if($lawyers)
    @foreach ($lawyers as $lawyer)
        <div class="col-lg-4 col-md-4 mb-5">
            <div class="wideget-user-desc">
                <div class="wideget-user-img">
                    @if ($lawyer->image != null)
                    <img src="{{asset('assets/images/data/lawyers/'.$lawyer->id.'/'.$lawyer->image)}}"
                        alt="img">
                    @else
                        @if ($lawyer->gender == 'انثى')
                            <img src="{{asset('assets/images/data/lawyers/female.jpg')}}" alt="img">
                        @else
                            <img src="{{asset('assets/images/data/lawyers/male.jpg')}}" alt="img">
                        @endif
                    @endif
                </div>
                <div class="user-wrap">
                    <h3>{{$lawyer->name}}</h3>
                    <h3>{{$lawyer->job_title}}</h3>
                    <h3>{{$lawyer->phone}}</h3>
                    <h3>{{$lawyer->gender}}</h3>
                    <p class="text-default mb-3">{{nl2br($lawyer->address)}}</p>
                </div>
                @livewire('user.rate' , ["lawyer_id"=>$lawyer->id], key($lawyer->id))
                <div class="btn-list">
                    <a href="{{ route('lawyer.details',['id'=>$lawyer->id]) }}" class="btn btn-primary btn-md mb-5 mb-lg-0">للمزيد</a>
                </div>
            </div>
        </div>
    @endforeach
@endif
</div>

