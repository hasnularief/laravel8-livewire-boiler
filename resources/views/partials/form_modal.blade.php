<x-jet-dialog-modal wire:model="showForm">
    <x-slot name="title">
        {{ __('Form User') }} {{ $form->id ?? '' }}
    </x-slot>

    <x-slot name="content">
        {!! $content !!};
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showForm')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
            {{ $form && $form->id ? __('Update') : __('Create') }}
        </x-jet-button>

    </x-slot>
</x-jet-dialog-modal>