<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactUpdate extends Component
{
    public $name;
    public $phone;
    public $contactId;

    protected $listeners = [
        'getContact' => 'showContact',
    ];

    public function showContact($contact){
        // assign emit parameters to class property
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contactId = $contact['id'];
    }

    public function update(){

    }

    public function resetInput(){

    }

    public function render()
    {
        return view('livewire.contact-update');
    }
}
