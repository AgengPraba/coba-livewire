<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

use App\Models\Post;
use App\Models\Category;

#[Title('Blog')]
#[Layout('layouts.public')]

class Blog extends Component
{
    public $category_id = "";
    
    public function render()
    {
        $posts = Post::with('category')->latest()->paginate(10);

        $categories = Category::all();

        return view('livewire.public.blog', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function updatedCategoryId()
    {
        $this->resetPage();
    }
}