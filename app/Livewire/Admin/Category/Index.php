<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Categories | Admin')]
#[Layout('layouts.admin')]


class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.category.index');
    }
}