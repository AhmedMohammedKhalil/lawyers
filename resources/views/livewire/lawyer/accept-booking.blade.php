
<form wire:submit.prevent='accept'>
    @if (session()->has('error'))
    <div class="col-lg-12 alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="form-group">
        <label class="form-label" for="">ميعاد الحجز</label>
        <input type="datetime-local" class="form-control" wire:model.lazy='book_at' name="book_at" id=""
            placeholder="ميعاد الحجز">
        @error('book_at') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group mb-0">
        <div class="checkbox checkbox-secondary">
            <input type="submit" class="btn btn-primary " value="قبول">
        </div>
    </div>
</form>
