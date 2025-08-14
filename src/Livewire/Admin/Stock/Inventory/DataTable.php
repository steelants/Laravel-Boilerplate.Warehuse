<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Inventory;

use Livewire\Component;
use SteelAnts\LaravelBoilerplate\Warehouse\Models\Inventory;

class DataTable extends Component
{
    public function render()
    {
        $inventories = Inventory::query()->orderBy('name')->get();
        return view('boilerplate-warehouse::livewire.admin.stock.inventory.data-table', compact('inventories'));
    }
}

