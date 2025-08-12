<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Observers;

use SteelAnts\LaravelBoilerplate\Warehouse\Models\Supplier;

class SupplierObserver
{
    /**
     * Handle the Supplier "deleted" event.
     */
    public function deleting(Supplier $supplier): void
    {
        $inventoryLogs = $supplier->inventoryLogs;
        if (!empty($inventoryLogs) && $inventoryLogs->count() > 0) {
            foreach ($inventoryLogs as $inventoryLog) {
                $inventoryLog->supplier_id = null;
                $inventoryLog->saveQuietly();
            }
        }

        $stockups = $supplier->stockups;
        if (!empty($stockups) && $stockups->count() > 0) {
            foreach ($stockups as $stockup) {
                $stockup->supplier_id = null;
                $stockup->saveQuietly();
            }
        }

        $contacts = $supplier->contacts;
        if (!empty($contacts) && $contacts->count() > 0) {
            foreach ($contacts as $contact) {
                $contact->delete();
            }
        }
    }
}
