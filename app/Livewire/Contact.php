<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Mary\Traits\Toast;

#[Title('Contact')]
#[Layout('layouts.public')]

class Contact extends Component
{
    use Toast;
    
    public $name;
    public $email;
    public $message;
    
    public function render()
    {
        return view('livewire.public.contact');
    }

    public function save()
    {
        Message::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        $this->reset(['name', 'email', 'message']);

        $this->success("yeayyyy");
        $this->error("webnya rusak");
        $this->warning("hati-hati");
        $this->info("ingfo");

    }
}