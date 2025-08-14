<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Seller;

use Livewire\Component;
use SteelAnts\LaravelBoilerplate\Warehouse\Models\Seller as SellerModel;

class DataTable extends Component
{
    public function render()
    {
        $sellers = SellerModel::query()->orderBy('name')->get();
        return view('boilerplate-warehouse::livewire.admin.stock.seller.data-table', compact('sellers'));
    }
}

