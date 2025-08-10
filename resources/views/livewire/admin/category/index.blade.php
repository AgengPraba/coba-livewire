<div>
    <x-header title="Categories" subtitle="Manage your blog categories" separator>
        <x-slot:middle class="!justify-end">
            <x-input icon="o-bolt" placeholder="Search..." />
        </x-slot:middle>
        <x-slot:actions>
            <x-button icon="o-funnel" />
            <x-button icon="o-plus" class="btn-primary" label="Add Category" wire:click="showModalCreateCategory" />
        </x-slot:actions>
    </x-header>

    <x-table :headers="$headers" :rows="$categories" no-hover with-pagination>
        @scope('cell_actions', $category)
            <div class="flex gap-2">
                <x-button icon="o-pencil" class="btn-sm btn-primary" tooltip="Edit Category"
                    wire:click="modalEditCategory({{ $category->id }})" />
                <x-button icon="o-trash" class="btn-sm btn-error" tooltip="Delete Category"
                    wire:click="confirmDelete({{ $category->id }})" />
            </div>
        @endscope

        @scope('cell_created_at', $category)
            {{ $category->created_at->format('M d, Y') }}
        @endscope

        @scope('cell_updated_at', $category)
            {{ $category->updated_at->format('M d, Y') }}
        @endscope
    </x-table>

    <x-modal wire:model="showDeleteModal" title="Confirm Delete" box-class="border border-error">
        <div class="mb-4">
            @if ($categoryToDelete)
                <p>Are you sure you want to delete the category "<strong>{{ $categoryToDelete->name }}</strong>"?</p>
                <p class="text-sm text-gray-600 mt-2">This action cannot be undone.</p>
            @endif
        </div>

        <x-slot:actions>
            <x-button label="Cancel" wire:click="cancelDelete" />
            <x-button label="Delete" class="btn-error" wire:click="deleteCategory" />
        </x-slot:actions>
    </x-modal>

    <x-modal wire:model="showUpdateModal" title="Edit Category" subtitle="Edit the category details">
        <x-form no-separator>
            <x-input label="Name" icon="o-tag" placeholder="Enter category name" wire:model="categoryName" />
            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.showUpdateModal = false" />
                <x-button label="Confirm" class="btn-primary" wire:click="updateCategory" />
            </x-slot:actions>
        </x-form>
    </x-modal>

    <x-modal wire:model="showModalCreate" title="Create Category" subtitle="Create a new category">
        <x-form no-separator>
            <x-input label="Name" icon="o-tag" placeholder="Enter category name" wire:model="categoryName" />
            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.showModalCreate = false" />
                <x-button label="Confirm" class="btn-primary" wire:click="createCategory" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>
