<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $statusUpdate = false;
    public $search;
    public $categoryActive;

    protected $listeners = [
        'contactStored'=> 'handleStored',
        'contactUpdated'=> 'handleUpdated'
    ];

    protected $updatesQueryString = ['search'];

    public function mount(){
        $this->search = request()->query('search', $this->search);
    }

    public function handleStored($contact){
        session()->flash('message', "Contact {$contact['name']} was successfully stored!");
    }

    public function handleUpdated($contact){
        session()->flash('message', "Contact {$contact['name']} was successfully updated!");
        $this->statusUpdate = false;
    }

    public function getContact($id){
        $this->statusUpdate = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }

    public function destroy($id){
        if($id){
            $contact = Contact::find($id);
            $contact->delete();
            session()->flash('message', "Contact {$contact['name']} was successfully deleted!");
        }
    }

    protected function getDataContacts(){
        if($this->search === null){
            $contacts = Contact::latest();
        } else {
            $contacts = Contact::latest()->where('name', 'like', '%'.$this->search.'%');
        }
        if($this->categoryActive !== null){
            $contacts = $contacts->where('category_id', $this->categoryActive);
        }

        return $contacts->with(['category'])->paginate(5);
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.contact-index', [
            'contacts' => $this->getDataContacts(),
            'categories' => $categories,
        ]);
    }
}
