<?php

namespace App\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithFileUploads;

#[Title('Create Post | Admin')]
#[Layout('layouts.admin')]

class Create extends Component
{
    use WithFileUploads;

    public $title = '';
    public $content = '';
    public $category_id = '';
    public $image;

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function save()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('posts', 'public');
            $imagePath = 'storage/' . $imagePath;
        }

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->category_id,
            'image' => $imagePath,
        ]);

        session()->flash('success', 'Post created successfully!');
        $this->redirect(route('admin.blog.index'), navigate: true);
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.blog.create', compact('categories'));
    }
}
