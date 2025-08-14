<x-layout-app>
    <div class="container-xl">
        <div class="page-header">
            <h1>{{ __('Sklady') }}</h1>
            <button class="btn btn-primary" onclick="Livewire.dispatch('openModal', {livewireComponents: 'admin.stock.inventory.form', title:  '{{ __('Vytvoření Skladu') }}'})">
                <i class="me-2 fas fa-plus"></i><span>{{ __('Přidat') }}</span>
            </button>
        </div>
        @livewire('admin.stock.inventory.data-table', [], key('data-table'))
    </div>
</x-layout-app>
