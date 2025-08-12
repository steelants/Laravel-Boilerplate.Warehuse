<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Observers;

use SteelAnts\LaravelBoilerplate\Warehouse\Models\Inventory;

class InventoryObserver
{
    /**
     * Handle the Inventory "deleted" event.
     */
    public function deleting(Inventory $inventory): void
    {
        $inventoryItems = $inventory->inventoryItems;
        if (!empty($inventoryItems) && $inventoryItems->count() > 0) {
            foreach ($inventoryItems as $inventoryItem) {
                $inventoryItem->delete();
            }
        }

        $inventoryLogs = $inventory->inventoryLogs;
        if (!empty($inventoryLogs) && $inventoryLogs->count() > 0) {
            foreach ($inventoryLogs as $inventoryLog) {
                $inventoryLog->delete();
            }
        }
    }
}
