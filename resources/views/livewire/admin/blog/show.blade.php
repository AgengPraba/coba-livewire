<div>
    <x-header :title="$post->title" subtitle="View Post Details" separator>
        <x-slot:actions>
            <x-button icon="o-arrow-left" label="Back to List" wire:click="backToIndex" class="btn-outline" />
            <x-button icon="o-pencil" label="Edit Post" wire:click="editPost" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Main Content --}}
        <div class="lg:col-span-2">
            <x-card title="Post Content" class="mb-6">
                @if ($post->image)
                    <div class="mb-4">
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}"
                            class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endif

                <div class="prose max-w-none">
                    {!! $post->content !!}
                </div>
            </x-card>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Post Info --}}
            <x-card title="Post Information">
                <div class="space-y-4">
                    <div>
                        <label class="font-semibold text-gray-700">Category:</label>
                        <p class="text-gray-600">{{ $post->category->name }}</p>
                    </div>

                    <div>
                        <label class="font-semibold text-gray-700">Created:</label>
                        <p class="text-gray-600">{{ $post->created_at->format('M d, Y \a\t H:i') }}</p>
                    </div>

                    <div>
                        <label class="font-semibold text-gray-700">Last Updated:</label>
                        <p class="text-gray-600">{{ $post->updated_at->format('M d, Y \a\t H:i') }}</p>
                    </div>

                    @if ($post->image)
                        <div>
                            <label class="font-semibold text-gray-700">Featured Image:</label>
                            <p class="text-gray-600 text-sm">{{ basename($post->image) }}</p>
                        </div>
                    @endif
                </div>
            </x-card>

            {{-- Quick Actions --}}
            <x-card title="Quick Actions">
                <div class="space-y-2">
                    <x-button icon="o-pencil" label="Edit Post" wire:click="editPost" class="btn-primary w-full" />
                    <x-button icon="o-eye" label="View on Site" link="{{ route('blogs') }}" external
                        class="btn-outline w-full" />
                </div>
            </x-card>
        </div>
    </div>
</div>
