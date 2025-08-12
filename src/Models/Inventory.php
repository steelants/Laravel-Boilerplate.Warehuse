<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Models;

use App\Observers\InventoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory, Auditable, HasTenant;

    protected $fillable = [
        'name',
    ];

    protected static function booted()
    {
        Inventory::observe(InventoryObserver::class);
    }

    public function inventoryItems()
    {
        return $this->hasMany(InventoryItem::class, "inventory_id", "id");
    }

    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLog::class, "inventory_id", "id");
    }
}
