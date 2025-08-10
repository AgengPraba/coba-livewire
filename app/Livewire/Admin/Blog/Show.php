<?php

namespace App\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Post;

#[Title('View Post | Admin')]
#[Layout('layouts.admin')]

class Show extends Component
{
    public Post $post;

    public function mount($id)
    {
        $this->post = Post::with('category')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.blog.show');
    }

    public function editPost()
    {
        $this->redirect(route('admin.blog.edit', $this->post->id), navigate: true);
    }

    public function backToIndex()
    {
        $this->redirect(route('admin.blog.index'), navigate: true);
    }
}