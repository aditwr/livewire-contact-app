<div>

    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
        {{ session('message') }}
      </div>
    @endif

    @if ($statusUpdate)
        @livewire('contact-update')
    @else
        @livewire('contact-create')
    @endif


    <div class="bg-white rounded py-4 px-4">
        <div class="mb-4">
            <h5 class="">Contacts List</h5>
        </div>
        <table class="table bg-white rounded">
            <thead>
              <tr class="table-dark">
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contacts as $contact)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>
                        <button wire:click="getContact({{ $contact->id }})" type="button" class="btn btn-warning">Edit</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
