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

    public $showDeleteModal = false;
    public $postToDelete = null;

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

    public function viewPost($id)
    {
        $this->redirect(route('admin.blog.show', $id), navigate: true);
    }

    public function editPost($id)
    {
        $this->redirect(route('admin.blog.edit', $id), navigate: true);
    }

    public function confirmDelete($id)
    {
        $this->postToDelete = Post::find($id);
        $this->showDeleteModal = true;
    }

    public function deletePost()
    {
        if ($this->postToDelete) {
            // Delete image file if exists
            if ($this->postToDelete->image && file_exists(public_path($this->postToDelete->image))) {
                unlink(public_path($this->postToDelete->image));
            }
            
            $this->postToDelete->delete();
            $this->showDeleteModal = false;
            $this->postToDelete = null;
            
            session()->flash('success', 'Post deleted successfully!');
            $this->resetPage();
        }
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->postToDelete = null;
    }
}