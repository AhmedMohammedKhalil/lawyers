<form class="form-horizontal" id="basic" wire:submit.prevent='edit'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">الإسم :</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="name" wire:model.lazy='name' class="form-control form-text">
                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">الإيميل :</label>
            </div>
            <div class="col-md-8">
                <input type="email" name="email" wire:model.lazy='email' class="form-control form-text" style="direction: ltr">
                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0">صورتك الشخصية :</label>
            </div>
            <div class="col-md-8">
                <div class="input-group file-browser">
                    <input type="text" name="text" class="form-control bg-transparent border-end-0 browse-file valid"
                        placeholder="إرفع الصورة" readonly="" aria-invalid="false">
                    <label class="input-group-btn">
                        <span class="btn btn-primary br-ts-0 br-bs-0">إرفع <input type="file" wire:model.lazy='image' name="image"
                                style="display: none;">
                        </span>
                    </label>
                </div>
                @error('image') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>

    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">كلمة السر الجديدة
                    :</label>
            </div>
            <div class="col-md-8">
                <input type="password" name="new_password" wire:model.lazy='password' class="form-control form-text" style="direction: ltr">
                @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">أعد كتابة كلمة السر
                    الجديدة :</label>
            </div>
            <div class="col-md-8">
                <input type="password" name="confirm_password" wire:model.lazy='confirm_password' class="form-control form-text" style="direction: ltr">
                @error('confirm_password') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="حفظ التغييرات">
    </div>

</form>
