<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Observers;

use SteelAnts\LaravelBoilerplate\Warehouse\Models\Item;

class ItemObserver
{
    public function deleting(Item $item): void
    {
        $inventoryItems = $item->inventoryItems;
        if (!empty($inventoryItems) && $inventoryItems->count() > 0) {
            foreach ($inventoryItems as $inventoryItem) {
                $inventoryItem->delete();
            }
        }

        $inventoryLogs = $item->inventoryLogs;
        if (!empty($inventoryLogs) && $inventoryLogs->count() > 0) {
            foreach ($inventoryLogs as $inventoryLog) {
                $inventoryLog->delete();
            }
        }
    }
}

