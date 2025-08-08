<?php

namespace App\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

use App\Models\Post;
use Livewire\WithPagination;

#[Title('Blog | Admin')]
#[Layout('layouts.admin')]

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $headers = [
        ['key' => 'title', 'label' => 'Title'],
        ['key' => 'category.name', 'label' => 'Category'],
        ['key' => 'created_at', 'label' => 'Created At'],
        ['key' => 'updated_at', 'label' => 'Updated At'],
        ['key' => 'actions', 'label' => 'Actions'],
    ];
        $posts = Post::with('category')
            ->latest()
            ->paginate(5);
        return view('livewire.admin.blog.index', compact('headers', 'posts'));
    }
}