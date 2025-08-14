<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Item;

use Illuminate\Database\Eloquent\Builder;
use SteelAnts\LaravelBoilerplate\Warehouse\Models\Item;
use SteelAnts\DataTable\Livewire\DataTableComponent;
use SteelAnts\DataTable\Traits\UseDatabase;

class DataTable extends DataTableComponent
{
    use UseDatabase;

    public bool $paginated = true;
    public int $itemsPerPage = 25;

    public function query(): Builder
    {
        return Item::with(['seller', 'category'])->orderBy('name');
    }

    public function headers(): array
    {
        return [
            'name'     => __('Název'),
            'sku'      => __('SKU'),
            'price'    => __('Cena'),
            'seller'   => __('Prodejce'),
            'category' => __('Kategorie'),
        ];
    }
}
