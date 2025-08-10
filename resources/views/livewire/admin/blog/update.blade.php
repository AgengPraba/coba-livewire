<div>
    <x-header title="Edit Post" subtitle="Update blog post information" separator>
        <x-slot:actions>
            <x-button icon="o-arrow-left" label="Back to List" link="{{ route('admin.blog.index') }}" class="btn-outline" />
        </x-slot:actions>
    </x-header>

    <x-form wire:submit="update">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Main Form --}}
            <div class="lg:col-span-2 space-y-6">
                <x-card title="Post Details">
                    <x-input label="Title" wire:model="title" placeholder="Enter post title" required />

                    <x-textarea label="Content" wire:model="content" placeholder="Write your post content here..."
                        rows="15" required />
                </x-card>

                {{-- Current Image --}}
                @if ($currentImage)
                    <x-card title="Current Image">
                        <div class="mb-4">
                            <img src="{{ asset($currentImage) }}" alt="Current image"
                                class="w-full max-w-md h-48 object-cover rounded-lg">
                        </div>
                        <p class="text-sm text-gray-600">{{ basename($currentImage) }}</p>
                    </x-card>
                @endif

                {{-- New Image Upload --}}
                <x-card title="Update Image">
                    <x-file label="Featured Image" wire:model="image" accept="image/*"
                        hint="Leave empty to keep current image. Max size: 2MB" />

                    @if ($image)
                        <div class="mt-4">
                            <label class="font-semibold">New Image Preview:</label>
                            <img src="{{ $image->temporaryUrl() }}"
                                class="mt-2 w-full max-w-md h-48 object-cover rounded-lg">
                        </div>
                    @endif
                </x-card>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                <x-card title="Post Settings">
                    <x-select label="Category" wire:model="category_id" :options="$categories" option-value="id"
                        option-label="name" placeholder="Select category" required />
                </x-card>

                <x-card title="Actions">
                    <div class="space-y-3">
                        <x-button label="Update Post" type="submit" icon="o-check" class="btn-primary w-full" />

                        <x-button label="Cancel" link="{{ route('admin.blog.index') }}" class="btn-outline w-full" />
                    </div>
                </x-card>
            </div>
        </div>
    </x-form>
</div>
