<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Seller;

use Illuminate\Database\Eloquent\Builder;
use SteelAnts\LaravelBoilerplate\Warehouse\Models\Seller as SellerModel;
use SteelAnts\DataTable\Livewire\DataTableComponent;
use SteelAnts\DataTable\Traits\UseDatabase;

class DataTable extends DataTableComponent
{
    use UseDatabase;

    public bool $paginated = true;
    public int $itemsPerPage = 25;

    public function query(): Builder
    {
        return SellerModel::query()->orderBy('name');
    }

    public function headers(): array
    {
        return [
            'name' => __('Prodejce'),
        ];
    }
}

