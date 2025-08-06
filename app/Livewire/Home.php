<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Home')]
#[Layout('layouts.public')]

class Home extends Component
{
    public function render()
    {
        $posts = Post::with('category')
            ->latest()
            ->take(6)
            ->get();
            
        return view('livewire.public.home',[
            'posts' => $posts
        ]);
    }
}