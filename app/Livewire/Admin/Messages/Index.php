<?php

namespace App\Livewire\Admin\Messages;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Message;

#[Title('Messages | Admin')]
#[Layout('layouts.admin')]

class Index extends Component
{
    use WithPagination;
    
    public $showDeleteModal = false;
    public $messageToDelete = null;
    public $modalDeleteMessage = false;
    
    public function render()
    {
        $headers = [
            ['key' => 'name', 'label' => 'Name'],
            ['key' => 'email', 'label' => 'Email'],
            ['key' => 'message', 'label' => 'Message'],
            ['key' => 'created_at', 'label' => 'sent at'],
            ['key' => 'actions', 'label' => 'Actions'],
        ];
        $messages = Message::latest()->paginate(10);

        $data = compact('headers', 'messages');
        return view('livewire.admin.messages.index', $data);
    }
}