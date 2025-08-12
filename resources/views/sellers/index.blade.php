<x-admin.layout>
    <div class="container-xl">
        <div class="page-header">
            <h1>{{ __('Prodejci') }}</h1>
            <button class="btn btn-primary" onclick="Livewire.dispatch('openModal', {livewireComponents: 'admin.stock.seller.form', title:  '{{ __('Vytvoření prodejce') }}'})">
                <i class="me-2 fas fa-plus"></i><span>{{ __('Přidat') }}</span>
            </button>
        </div>
        @livewire('admin.stock.seller.data-table', [], key('data-table'))
    </div>
</x-admin.layout>
