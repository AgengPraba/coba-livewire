<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Category;
use Mary\Traits\Toast;
use Livewire\WithPagination;

#[Title('Categories | Admin')]
#[Layout('layouts.admin')]


class Index extends Component
{
    use Toast;
    use WithPagination;

    public $showDeleteModal = false;
    public $categoryToDelete = null;
    public $showUpdateModal = false;
    public $category= null;
    public $categoryName = null;
    public $showModalCreate = false;

    public function render()
    {
        $headers = [
            ['key' => 'name', 'label' => 'Name'],
            ['key' => 'created_at', 'label' => 'Created At'],
            ['key' => 'updated_at', 'label' => 'Updated At'],
            ['key' => 'actions', 'label' => 'Actions'],
        ];
        
        $categories = Category::latest()->paginate(5);

        $data = compact('headers', 'categories');
        return view('livewire.admin.category.index', $data);
    }

    public function showModalCreateCategory()
    {
        $this->showModalCreate = true;
    }

    public function createCategory()
    {
        $this->validate([
            'categoryName' => 'required|string|max:20',
        ]);

        try {
            Category::create(['name' => $this->categoryName]);

            $this->showModalCreate = false;
            $this->categoryName = null;

            $this->success('Category created successfully!');
            session()->flash('success', 'Category created successfully!');
            $this->resetPage();

        } catch (\Exception $e) {
            $this->error('Failed to create category!');
            session()->flash('error', 'Failed to create category: ' . $e->getMessage());
        }
    }

    public function modalEditCategory($id)
    {
        $this->category = Category::find($id);
        $this->showUpdateModal = true;
        $this->categoryName = $this->category->name;
    }

    public function updateCategory()
    {
        $this->validate([
            'categoryName' => 'required|string|max:255',
        ]);

        try {
            if ($this->category) {
                $this->category->name = $this->categoryName;
                $this->category->save();
            }

            $this->showUpdateModal = false;
            $this->category = null;

            $this->success('Category updated successfully!');
            session()->flash('success', 'Category updated successfully!');
            $this->resetPage();

        } catch (\Exception $e) {
            $this->error('Failed to update category!');
            session()->flash('error', 'Failed to update category: ' . $e->getMessage());
        }
    }
    
    public function confirmDelete($id)
    {
        $this->categoryToDelete = Category::find($id);
        $this->showDeleteModal = true;
    }

    public function deleteCategory()
    {
    try {
        if ($this->categoryToDelete) {
            $this->categoryToDelete->delete();
        }

        $this->showDeleteModal = false;
        $this->categoryToDelete = null;

        $this->success('Category deleted successfully!');
        session()->flash('success', 'Category deleted successfully!');
        $this->resetPage();

    } catch (\Exception $e) {
        $this->error('Failed to delete category!');
        session()->flash('error', 'Failed to delete category: ' . $e->getMessage());
     }
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->categoryToDelete = null;
    }
}