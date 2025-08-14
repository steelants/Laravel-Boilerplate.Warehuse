<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Item;

use Livewire\Component;
use SteelAnts\LaravelBoilerplate\Warehouse\Models\Item;

class DataTable extends Component
{
    public function render()
    {
        $items = Item::query()->latest()->limit(20)->get();
        return view('boilerplate-warehouse::livewire.admin.stock.item.data-table', compact('items'));
    }
}

