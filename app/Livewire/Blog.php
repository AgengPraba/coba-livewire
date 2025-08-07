<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

use App\Models\Post;
use App\Models\Category;


#[Title('Blog')]
#[Layout('layouts.public')]

class Blog extends Component
{
    use WithPagination;

    public $category_id;

    public function render(){

        $posts = Post::with('category')
            ->when($this->category_id, function ($query) {
                $query->where('category_id', $this->category_id);
            })
            ->latest()
            ->paginate(9);
        $categories = Category::all();

        return view('livewire.public.blog', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }


}