<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SteelAnts\LaravelBoilerplate\Warehouse\Observers\SupplierObserver;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'street',
        'city',
        'postcode',
        'state',
        'ico',
        'dic',
        'is_vat_payer',
    ];

    protected static function booted(): void
    {
        static::observe(SupplierObserver::class);
    }

    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLog::class, 'supplier_id', 'id');
    }

    public function stockups()
    {
        return $this->hasMany(Stockup::class, 'supplier_id', 'id');
    }
}

