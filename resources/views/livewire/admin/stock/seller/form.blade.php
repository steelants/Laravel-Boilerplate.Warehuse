<div>
    <x-form::form wire:submit.prevent="store">
        <x-form::input group-class="mb-3" type="text" wire:model="name" id="name" label="{{ __('boilerplate::ui.name') }}"/>
        <x-form::input group-class="mb-3" type="text" wire:model="street" id="street" label="{{ __('Ulice') }}"/>
        <x-form::input group-class="mb-3" type="text" wire:model="city" id="city" label="{{ __('Město') }}"/>
        <x-form::input group-class="mb-3" type="text" wire:model="postcode" id="postcode" label="{{ __('PSČ') }}"/>
        <x-form::input group-class="mb-3" type="text" wire:model="state" id="state" label="{{ __('Stát') }}"/>
        <x-form::input group-class="mb-3" type="text" wire:model="ico" id="ico" label="{{ __('IČO') }}"/>
        <x-form::input group-class="mb-3" type="text" wire:model="dic" id="dic" label="{{ __('DIČ') }}"/>
        <x-form::input group-class="mb-3" type="checkbox" wire:model="is_vat_payer" id="is_vat_payer" label="{{ __('Plátce DPH') }}"/>
        <x-form::button class="btn-primary" type="submit">{{ __('boilerplate::ui.create') }}</x-form::button>
    </x-form::form>
</div>
