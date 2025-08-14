<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SteelAnts\LaravelBoilerplate\Warehouse\Observers\InventoryObserver;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected static function booted(): void
    {
        static::observe(InventoryObserver::class);
    }

    public function inventoryItems()
    {
        return $this->hasMany(InventoryItem::class, 'inventory_id', 'id');
    }

    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLog::class, 'inventory_id', 'id');
    }
}

