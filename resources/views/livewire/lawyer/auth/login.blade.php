<form id="register_user" wire:submit.prevent='login' tabindex="500">
    @if (session()->has('error'))
    <div class="col-lg-12 alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="email">
        <label>الإيميل</label>
        <input type="email" name="email" class="border-dark" wire:model.lazy='email' style="direction: ltr">
        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

    <div class="password">
        <label>كلمة السر</label>
        <input type="password" name="password" wire:model.lazy='password' class="border-dark" style="direction: ltr">
        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

    <div class="submit">
        <input type="submit" class="btn btn-primary btn-block" value="سجل الأن">
    </div>

</form>
