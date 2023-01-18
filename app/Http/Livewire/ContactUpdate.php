<?php

namespace App\Http\Livewire;

use App\Models\Contact;
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
        $this->validate([
            'name'=>'required|min:3',
            'phone'=> 'required|max:16',
        ]);

        if($this->contactId){
            $contact = Contact::find($this->contactId);
            $contact->update([
                'name'=> $this->name,
                'phone'=> $this->phone,
            ]);

            $this->resetInput();
            $this->emit('contactUpdated', $contact);
        }
    }

    public function resetInput(){

    }

    public function render()
    {
        return view('livewire.contact-update');
    }
}
