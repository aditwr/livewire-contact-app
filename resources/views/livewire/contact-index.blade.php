<div>

    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
        {{ session('message') }}
      </div>
    @endif

    <div class="d-flex flex-row gap-3">
        @livewire('contact-create')
        @if ($statusUpdate)
            @livewire('contact-update')
        @endif
    </div>


    <div class="bg-white rounded py-4 px-4">
        <div class="mb-4">
            <h5 class="">Contacts List</h5>
        </div>
        <div class="row">
            <div class="input-group mb-4 col">
                <input wire:model.lazy='search' type="text" class="form-control" placeholder="Search...">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
            </div>
            <div class="input-group mb-4 w-50">
                <select wire:model='categoryActive' class="form-select" aria-label="Default select example">
                    <option value="">All Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
            </div>
        </div>
        <table class="table bg-white rounded">
            <thead>
              <tr class="table-dark">
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contacts as $contact)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->category->name }}</td>
                    <td>
                        <button wire:click="getContact({{ $contact->id }})" type="button" class="btn btn-warning">Edit</button>
                        <button wire:click="destroy({{ $contact->id }})" onclick="return confirm('delete this contact?')" type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="">
            {{ $contacts->links() }}
        </div>
    </div>
</div>
