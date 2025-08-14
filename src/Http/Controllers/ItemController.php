<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Http\Controllers;

use Illuminate\Routing\Controller;
use SteelAnts\LaravelBoilerplate\Warehouse\Models\{Item, InventoryItem};

class ItemController extends Controller
{
    public function index()
    {
        return view('boilerplate-warehouse::item.index');
    }

    public function show(Item $item)
    {
        $inventoryItems = InventoryItem::with('inventory')
            ->where('item_id', $item->id)
            ->get();

        return view('boilerplate-warehouse::item.detail', compact('item', 'inventoryItems'));
    }
}

