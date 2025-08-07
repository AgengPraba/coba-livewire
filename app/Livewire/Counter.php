<?php
 
namespace App\Livewire;
 
use Livewire\Component;

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Counter")]
#[Layout("layouts.public")]


class Counter extends Component
{
    public $count = 1;
    public $halo = '';
    public $category_id;
 
    public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;
    }
 
    public function render()
    {
        return view('livewire.counter');
    }
}