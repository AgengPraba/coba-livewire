<div>
    <h1>{{ $count }}</h1>

    <button wire:click="increment">+</button>

    <button wire:click="decrement">-</button>

    <input type="text" wire:model.live="halo" placeholder="Type something..."
        class="input input-bordered w-full max-w-xs mt-4" />

    <p class="mt-4">data: {{ $halo }}</p>
    <select wire:model.live="category_id">
        @foreach (\App\Models\Category::all() as $category)
            <option value="{{ (string) $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <p class="mt-4">Selected Category ID: {{ $category_id }}</p>
</div>
