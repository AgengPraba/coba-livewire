
    <div>
    <x-header title="Contact Me" subtitle="Get in touch" class="mb-8" />
    
    <x-form wire:submit="save" class="max-w-lg mx-auto">
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
            spinner="save"
        />
    </x-form>
</div>
