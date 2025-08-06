<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Contact')]
#[Layout('layouts.public')]

class Contact extends Component
{
    public function render()
    {
        return view('livewire.public.contact');
    }
}