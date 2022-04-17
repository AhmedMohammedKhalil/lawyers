<form id="register_user" class="" tabindex="500" wire:submit.prevent='register'>

    @if (session()->has('error'))
    <div class="col-lg-12 alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="name">
        <label>الإسم</label>
        <input type="text" wire:model.lazy='name' name="name" class="border-dark">
        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="mail">
        <label>الإيميل</label>
        <input type="email" name="email" wire:model.lazy='email' class="border-dark" style="direction: ltr">
        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="phone">
        <label>الموبايل</label>
        <input type="text" name="phone" wire:model.lazy='phone' class="border-dark">
        @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">الجنس :</label>
            </div>
            <div class="col-md-9">
                <div class="form-controls-stacked d-md-flex">
                    <label class="custom-control custom-radio me-4">
                        <input type="radio" class="custom-control-input" wire:model.lazy='gender' name="gender" value="ذكر" checked>
                        <span class="custom-control-label">ذكر</span>
                    </label>
                    <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" wire:model.lazy='gender' name="gender" value="أنثى">
                        <span class="custom-control-label">أنثى</span>
                    </label>
                </div>
            </div>
            @error('gender') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="passwd">
        <label>كلمة السر</label>
        <input type="password" name="password" class="border-dark" wire:model.lazy='password' style="direction: ltr">
        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="passwd">
        <label>أعد كتابة كلمة السر</label>
        <input type="password" name="confirm_password" class="border-dark" wire:model.lazy='confirm_password' style="direction: ltr">
        @error('confirm_password') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group ">
        <div class="row">
            <div class="col-md-12">
                <textarea name="address" id="" cols="30" rows="6" wire:model.lazy='address' placeholder="العنوان"></textarea>
            </div>
            @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="submit">
        <input type="submit" class="btn btn-primary btn-block fs-16" value="إنشاء حساب">
    </div>
</form>
