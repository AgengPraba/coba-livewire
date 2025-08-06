@extends('layouts.public')
@section('content')
    <div>
    <x-header title="Contact Me" subtitle="Get in touch" class="mb-8" />
    
    <x-form wire:submit.prevent="submit" class="max-w-lg mx-auto">
        <x-input 
            label="Name"
            wire:model="name"
            icon="o-user"
            required
        />
        
        <x-input 
            label="Email"
            wire:model="email"
            type="email"
            icon="o-envelope"
            required
        />
        
        <x-textarea 
            label="Message"
            wire:model="message"
            rows="5"
            required
        />
        
        <x-button 
            label="Send Message"
            type="submit"
            class="btn-primary"
        />
        
        @if (session('message'))
            <x-alert 
                type="success"
                :message="session('message')"
                class="mt-4"
            />
        @endif
    </x-form>
</div>
@endsection