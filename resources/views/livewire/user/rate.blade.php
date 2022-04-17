<div class="rate">
    <div class="wideget-user-rating mb-2">
        @for ($i = 1;$i <= 5 - $rating; $i++)
            <a href="javascript:void(0)"><i class="fa fa-star-o"></i></a>
        @endfor
        @if ($rating > 0)
            @for ($i = 1;$i <= $rating; $i++)
                <a href="javascript:void(0)"><i class="fa fa-star text-warning"></i></a>
            @endfor
        @endif
    </div>
    @auth('user')
        <div class="star-ratings start-ratings-main clearfix me-3 d-flex justify-content-center">
            <label class="pe-2" style="font-size: 20px" for="rating">تقيمك : </label>
            <div class="">
                <select name="rating" autocomplete="off" wire:model='user_rate'>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    @endauth
</div>
