@extends('layouts.public')
@section('content')

<div>
    <x-header title="All Posts" subtitle="Browse all articles" class="mb-8" />
    
    <div class="mb-6">
        <x-select 
            label="Filter by Category"
            wire:model="category_id"
            :options="$categories"
            placeholder="All Categories"
        />
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
            <x-card 
                :title="$post->title"
                class="card-bordered">
                @if($post->image)
                    <figure>
                        <img src="{{ asset( $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    </figure>
                @endif
                <div class="card-body">
                    <div class="badge badge-primary">{{ $post->category->name }}</div>
                    <p>{{ Str::limit(strip_tags($post->content), 100) }}</p>
                    <div class="card-actions">
                        {{-- <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
            </x-card>
        @endforeach
    </div>
    
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>

@endsection
