<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $name;
    public $phone;

    // store data contact in database
    public function store(){
        // do validation process in data posted from request
        $this->validate([
            'name'=> ['required', 'min:3'],
            'phone' => ['required', 'max:16'],
        ]);

        $contact = Contact::create([
            'name'=>$this->name,
            'phone'=>$this->phone,
        ]);

        $this->resetInput();

        // tell the parent component (contact-index) through the emit
        $this->emit('contactStored', $contact);
    }

    // reset input value / property value after data contact stored
    private function resetInput(){
        $this->reset(['name', 'phone']);
    }

    public function render()
    {
        return view('livewire.contact-create');
    }
}
