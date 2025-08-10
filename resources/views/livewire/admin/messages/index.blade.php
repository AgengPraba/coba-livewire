<div>
    <x-header title="Messages" subtitle="Read the messages from person who contact you" separator>
        <x-slot:middle class="!justify-end">
            <x-input icon="o-bolt" placeholder="Search..." />
        </x-slot:middle>
        <x-slot:actions>
            <x-button icon="o-funnel" />
        </x-slot:actions>
    </x-header>

    <x-table :headers="$headers" :rows="$messages" no-hover with-pagination>
        @scope('cell_actions', $message)
            <div class="flex gap-2">
                <x-button icon="o-eye" class="btn-sm btn-primary" tooltip="Detail Message"
                    wire:click="showMessage({{ $message->id }})" />
                <x-button icon="o-trash" class="btn-sm btn-error" tooltip="Delete Message"
                    wire:click="confirmDelete({{ $message->id }})" />
            </div>
        @endscope

        @scope('cell_created_at', $message)
            {{ $message->created_at->diffForHumans() }}
        @endscope
    </x-table>

    <x-modal wire:model="modalDeleteMessage" title="Confirm Delete" box-class="border border-error">
        <div class="mb-4">
            @if ($messageToDelete)
                <p>Are you sure you want to delete the message from"<strong>{{ $messageToDelete->name }}</strong>"?</p>
                <p class="text-sm text-gray-600 mt-2">This action cannot be undone.</p>
            @endif
        </div>

        <x-slot:actions>
            <x-button label="Cancel" wire:click="cancelDelete" />
            <x-button label="Delete" class="btn-error" wire:click="deleteMessage" />
        </x-slot:actions>
    </x-modal>
</div>
