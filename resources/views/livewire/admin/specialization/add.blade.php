<form id="create_spec" wire:submit.prevent='add'>
    @if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="form-group">
        <label class="form-label" for="exampleInputEmail1">الإسم</label>
        <input type="text" class="form-control" wire:model.lazy='title' name="title" id="exampleInputname" placeholder="الإسم">
        @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group mb-0">
        <div class="checkbox checkbox-secondary">
            <input type="submit" class="btn btn-primary " value="أضف">
        </div>
    </div>
</form>
