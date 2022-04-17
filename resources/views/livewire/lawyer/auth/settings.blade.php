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
                <label class="form-label mb-0" id="examplenameInputname2">المسمى الوظيفى :</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="job_title" wire:model.lazy='job_title' class="form-control form-text">
                @error('job_title') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">الإيميل :</label>
            </div>
            <div class="col-md-8">
                <input type="email" name="email" wire:model.lazy='email' class="form-control form-text"
                    style="direction: ltr">
                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">الموبايل :</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="phone" wire:model.lazy='phone' class="form-control form-text">
                @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">التخصصات :</label>
            </div>
            <div class="col-md-8">
                <select name="specials" class="form-control " wire:model.lazy='specials' class="border-dark" multiple
                    style="height:80px">
                        @foreach ($specis as $spec)
                            <option value="{{ $spec->id }}"
                                @foreach (auth('lawyer')->user()->specializations as $s)
                                    @if($s->id == $spec->id) selected=true @endif
                                @endforeach
                            >{{ $spec->title }}</option>
                        @endforeach
                </select>
            </div>
            @error('specials') <span class="text-danger error">{{ $message }}</span>@enderror
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
                        <span class="btn btn-primary br-ts-0 br-bs-0">إرفع <input type="file" wire:model.lazy='image'
                                name="image" style="display: none;">
                        </span>
                    </label>
                </div>
                @error('image') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">الجنس :</label>
            </div>
            <div class="col-md-9">
                <div class="form-controls-stacked d-md-flex">
                    <label class="custom-control custom-radio me-4">
                        <input type="radio" class="custom-control-input" wire:model.lazy='gender' name="gender" value="ذكر"
                            checked>
                        <span class="custom-control-label">ذكر</span>
                    </label>
                    <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" wire:model.lazy='gender' name="gender"
                            value="أنثى">
                        <span class="custom-control-label">أنثى</span>
                    </label>
                </div>
            </div>
            @error('gender') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">كلمة السر الجديدة
                    :</label>
            </div>
            <div class="col-md-8">
                <input type="password" name="new_password" wire:model.lazy='password' class="form-control form-text"
                    style="direction: ltr">
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
                <input type="password" name="confirm_password" wire:model.lazy='confirm_password'
                    class="form-control form-text" style="direction: ltr">
                @error('confirm_password') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center">
                <label class="form-label mb-0" id="examplenameInputname2">العنوان :</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control form-text" name="address" id="" rows="6" wire:model.lazy='address'
                    placeholder="العنوان"></textarea>
            </div>
            @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="حفظ التغييرات">
    </div>

</form>
