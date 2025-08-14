<div>
    <x-form::form wire:submit.prevent="store">
        <x-form::input group-class="mb-3" type="text" wire:model="name" id="name" label="{{ __('boilerplate::ui.name') }}"/>
        <x-form::button class="btn-primary" type="submit">{{ __('boilerplate::ui.create') }}</x-form::button>
    </x-form::form>
</div>
