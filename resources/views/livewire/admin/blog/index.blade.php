<div>
    <x-header title="Blogs" subtitle="Manage your blog posts" separator>
        <x-slot:middle class="!justify-end">
            <x-input icon="o-bolt" placeholder="Search..." />
        </x-slot:middle>
        <x-slot:actions>
            <x-button icon="o-funnel" />
            <x-button icon="o-plus" class="btn-primary" label="Add Post" link="{{ route('admin.blog.create') }}" />
        </x-slot:actions>
    </x-header>

    {{-- Success Message --}}
    @if (session()->has('success'))
        <x-alert icon="o-check-circle" class="alert-success mb-4">
            {{ session('success') }}
        </x-alert>
    @endif

    {{-- Table with custom actions --}}
    <x-table :headers="$headers" :rows="$posts" no-hover with-pagination>
        @scope('cell_actions', $post)
            <div class="flex gap-2">
                <x-button icon="o-eye" class="btn-sm btn-outline" tooltip="View Post"
                    wire:click="viewPost({{ $post->id }})" />
                <x-button icon="o-pencil" class="btn-sm btn-primary" tooltip="Edit Post"
                    wire:click="editPost({{ $post->id }})" />
                <x-button icon="o-trash" class="btn-sm btn-error" tooltip="Delete Post"
                    wire:click="confirmDelete({{ $post->id }})" />
            </div>
        @endscope

        @scope('cell_created_at', $post)
            {{ $post->created_at->format('M d, Y') }}
        @endscope

        @scope('cell_updated_at', $post)
            {{ $post->updated_at->format('M d, Y') }}
        @endscope
    </x-table>

    {{-- Delete Confirmation Modal --}}
    <x-modal wire:model="showDeleteModal" title="Confirm Delete" box-class="border border-error">
        <div class="mb-4">
            @if ($postToDelete)
                <p>Are you sure you want to delete the post "<strong>{{ $postToDelete->title }}</strong>"?</p>
                <p class="text-sm text-gray-600 mt-2">This action cannot be undone.</p>
            @endif
        </div>

        <x-slot:actions>
            <x-button label="Cancel" wire:click="cancelDelete" />
            <x-button label="Delete" class="btn-error" wire:click="deletePost" />
        </x-slot:actions>
    </x-modal>
</div>
