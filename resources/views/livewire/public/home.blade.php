
    <div class="">
        <x-header title="Welcome to My Blog" subtitle="Latest Posts" class="mb-8" />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <x-card :title="$post->title" class="card-bordered shadow-lg">
                    <div class="badge badge-info font-bold text-white">{{ $post->category->name }}</div>
                    <p>{{ Str::limit(strip_tags($post->content), 100) }}</p>
                    @if ($post->image)
                        <x-slot:figure>
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                        </x-slot:figure>
                    @endif
                    <x-slot:actions separator>
                        <x-button label="Read More" class="btn-primary" />
                    </x-slot:actions>
                </x-card>
            @endforeach
        </div>
    </div>

