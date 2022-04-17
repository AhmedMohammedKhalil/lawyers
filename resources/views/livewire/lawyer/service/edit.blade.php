<form id="create_service" wire:submit.prevent='edit'>
    @if (session()->has('error'))
    <div class="col-lg-12 alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="form-group">
        <label class="form-label" for="exampleInputEmail1">الإسم</label>
        <input type="text" class="form-control" wire:model.lazy='title' name="title" id="exampleInputname"
            placeholder="الإسم">
        @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label>التخصصات</label>
        <select name="spec_id" class="form-control" wire:model.lazy='spec_id' class="border-dark">
            @foreach (auth('lawyer')->user()->specializations as $spec)
                <option value="{{ $spec->id }}" @if($spec->id == $spec_id) selected @endif>{{ $spec->title }}</option>
            @endforeach

        </select>
        @error('spec_id') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-12">
                <textarea class="form-control" name="details" id="" cols="30" rows="6" wire:model.lazy='details'
                    placeholder="التفاصيل"></textarea>
            </div>
            @error('details') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="form-group mb-0">
        <div class="checkbox checkbox-secondary">
            <input type="submit" class="btn btn-primary " value="حفظ التغييرات">
        </div>
    </div>
</form>
