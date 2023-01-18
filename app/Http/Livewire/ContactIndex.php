<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactIndex extends Component
{
    public $statusUpdate = false;

    protected $listeners = [
        'contactStored'=> 'handleStored',
    ];

    public function handleStored($contact){
        session()->flash('message', "Contact {$contact['name']} was successfully stored!");
    }

    public function getContact($id){
        $this->statusUpdate = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts' => Contact::latest()->get(),
        ]);
    }
}
