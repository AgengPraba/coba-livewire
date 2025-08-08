<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Dashboard - Admin')]
#[Layout('layouts.admin')]

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.index');
    }
}