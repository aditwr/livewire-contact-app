<div class="mb-5 bg-white w-50 py-5 px-5 rounded">
    <div class="mb-3">
        <p class=" opacity-80">Edit Contact Form</p>
    </div>
    <form wire:submit.prevent="update">
        <input type="hidden" name="" wire:model="contactId">
        <div class="d-flex flex-row gap-5 mb-3">
            <div class="w-100">
                <label for="name" class="form-label fw-bolder opacity-80">Name</label>
                <input wire:model.lazy="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp">
                @error('name')
                    <span class="invalid-feedback"><small>{{ $message }}</small></span>
                @enderror
              </div>
              <div class="w-100">
                <label for="phone" class="form-label fw-bolder opacity-80">Phone Number</label>
                <input wire:model.lazy="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone">
                @error('phone')
                    <span class="invalid-feedback"><small>{{ $message }}</small></span>
                @enderror
              </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
</div>
