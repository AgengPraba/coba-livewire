<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('About')]
#[Layout('layouts.public')]

class About extends Component
{
    public $name;
    public $email;
    public $message;
    
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];
    
    public function submit()
    {
        $this->validate();

        session()->flash('message', 'Your message has been sent successfully!');
        
        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.public.about');
    }
}