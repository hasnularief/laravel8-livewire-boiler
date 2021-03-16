
{{-- Care about people's approval and you will be their prisoner. --}}
<div class="p-6">
    <x-jet-button class="mb-6" wire:click="form()">
        {{ __('Create') }}
    </x-jet-button>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($data->count())
                                @foreach($data as $item)
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->name }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->email }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->email_verified_at }}</td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <x-jet-button wire:click="form({{ $item->id }})">
                                            {{ __('Update')}}
                                        </x-jet-button>
                                        <x-jet-danger-button wire:click="confirmDelete({{$item->id}})">
                                            {{ __('Delete')}}
                                        </x-jet-danger-button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-5 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    {{ $data->links() }}

    @include('partials.delete_modal')

    <x-form-modal title="Form User" :form="$form">
        <div class="mt-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.debounce.500ms="form.name" />
            @error('form.name')<span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="text" wire:model.debounce.500ms="form.email" />
            @error('form.email')<span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input id="password" class="block mt-1 w-full" type="password" wire:model.debounce.500ms="form.password" />
            @error('form.password')<span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" wire:model.debounce.800ms="form.password_confirmation" />
            @error('form.password_confirmation')<span class="error">{{ $message }}</span> @enderror
        </div>
    </x-form-modal>
    
    
</div>

