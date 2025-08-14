<div>
    <x-form::form wire:submit.prevent="store">
        <x-form::input group-class="mb-3" type="text" wire:model="name" id="name" label="{{ __('boilerplate::ui.name') }}"/>
        <x-form::input group-class="mb-3" type="text" wire:model="description" id="description" label="{{ __('boilerplate::ui.description') }}"/>
        <x-form::input group-class="mb-3" type="text" wire:model="identifier" id="identifier" label="{{ __('Identifikátor') }}"/>
        <x-form::input group-class="mb-3" type="text" wire:model="sku" id="sku" label="SKU"/>
        <x-form::input group-class="mb-3" type="text" wire:model="ean" id="ean" label="EAN"/>
        <x-form::input group-class="mb-3" type="number" wire:model="category_id" id="category_id" label="{{ __('Kategorie ID') }}"/>
        <x-form::input group-class="mb-3" type="number" wire:model="vat_rate" id="vat_rate" label="{{ __('Sazba DPH') }}"/>
        <x-form::input group-class="mb-3" type="number" wire:model="seller_id" id="seller_id" label="{{ __('Prodejce ID') }}"/>
        <x-form::input group-class="mb-3" type="number" step="0.01" wire:model="price" id="price" label="{{ __('Cena') }}"/>
        <x-form::input group-class="mb-3" type="number" step="0.01" wire:model="price_no_vat" id="price_no_vat" label="{{ __('Cena bez DPH') }}"/>
        <x-form::input group-class="mb-3" type="text" wire:model="currency" id="currency" label="{{ __('Měna') }}"/>
        <x-form::button class="btn-primary" type="submit">{{ __('boilerplate::ui.create') }}</x-form::button>
    </x-form::form>
    
</div>
