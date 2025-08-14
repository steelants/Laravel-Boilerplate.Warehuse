<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Inventory;

use Illuminate\Database\Eloquent\Builder;
use SteelAnts\LaravelBoilerplate\Warehouse\Models\Inventory;
use SteelAnts\DataTable\Livewire\DataTableComponent;
use SteelAnts\DataTable\Traits\UseDatabase;

class DataTable extends DataTableComponent
{
    use UseDatabase;

    public bool $paginated = true;
    public int $itemsPerPage = 25;

    public function query(): Builder
    {
        return Inventory::query()->orderBy('name');
    }

    public function headers(): array
    {
        return [
            'name' => __('Sklad'),
        ];
    }
}

