<x-layout-app>
    <div class="container-xl">
        <div class="page-header">
            <h1>{{ __('Sklad') }}</h1>
            <div>
                <a class="btn btn-primary" href="{{ route('admin.stock.process') }}">
                    <span>{{ __('Naskladnění') }}</span>
                </a>
                <button class="btn btn-primary" onclick="Livewire.dispatch('openModal', {livewireComponents: 'admin.stock.item.form', title:  '{{ __('Vytvoření itemu') }}'})">
                    <i class="me-2 fas fa-plus"></i><span>{{ __('Přidat') }}</span>
                </button>
            </div>
        </div>
        @livewire('admin.stock.item.data-table', [], key('data-table'))
    </div>
</x-layout-app>
