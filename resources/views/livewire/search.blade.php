<form id="search" wire:submit.prevent='search'>
    <div class="search-background bg-transparent mt-5">
        <div class="form row g-0 ">

            <div class="form-group col-xl-6 col-lg-6 col-md-12 mb-0 bg-white">
                <input type="text" name="search" wire:model.lazy='search' class="form-control input-lg br-te-md-0 br-be-md-0" id="text4"
                    placeholder="إبحث عن ما تريد">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 mb-0">
                <input type="submit" class="btn btn-lg btn-block btn-primary br-ts-md-0 br-bs-md-0" value=" إبحث الآن">
            </div>
        </div>
    </div>
</form>
