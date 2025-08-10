<?php

namespace App\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithFileUploads;

#[Title('Edit Post | Admin')]
#[Layout('layouts.admin')]

class Update extends Component
{
    use WithFileUploads;

    public Post $post;
    public $title;
    public $content;
    public $category_id;
    public $image;
    public $currentImage;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
        $this->title = $this->post->title;
        $this->content = $this->post->content;
        $this->category_id = $this->post->category_id;
        $this->currentImage = $this->post->image;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function update()
    {
        $this->validate();

        $imagePath = $this->currentImage;

        if ($this->image) {
            // Delete old image if exists
            if ($this->currentImage && file_exists(public_path($this->currentImage))) {
                unlink(public_path($this->currentImage));
            }

            // Store new image
            $imagePath = $this->image->store('posts', 'public');
            $imagePath = 'storage/' . $imagePath;
        }

        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->category_id,
            'image' => $imagePath,
        ]);

        session()->flash('success', 'Post updated successfully!');
        $this->redirect(route('admin.blog.index'), navigate: true);
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.blog.update', compact('categories'));
    }
}
