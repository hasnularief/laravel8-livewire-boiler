<x-jet-confirmation-modal wire:model="confirmDeleteId">
    
        <x-slot name="title">
            Delete Data
        </x-slot>
    
        <x-slot name="content">
            Are you sure you want to delete this record?.
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="confirmDelete(null)" x-on:click="_confirmDeleteId = false" wire:loading.attr="disabled">
                Close
            </x-jet-secondary-button>
    
            <x-jet-danger-button class="ml-2" wire:click="deleteData()"  wire:loading.attr="disabled">
                Delete
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>