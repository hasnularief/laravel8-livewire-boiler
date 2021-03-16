@props(['title', 'content', 'form'])
<x-jet-dialog-modal wire:model="showForm">
    <x-slot name="title">
        {{ __($title) }} {{ $form['id'] ?? '' }}
    </x-slot>

    <x-slot name="content">
        {!! $slot !!}
        {{-- <div class="mt-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="name" />
            @error('name')<span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="text" wire:model="email" />
            @error('email')<span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input id="password" class="block mt-1 w-full" type="text" wire:model="password" />
            @error('password')<span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="text" wire:model="password_confirmation" />
            @error('password_confirmation')<span class="error">{{ $message }}</span> @enderror
        </div> --}}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showForm')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="writeData()" wire:loading.attr="disabled">
            {{ $form && $form['id'] ? __('Update') : __('Create') }}
        </x-jet-button>

    </x-slot>
</x-jet-dialog-modal>