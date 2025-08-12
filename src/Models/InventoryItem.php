<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory, Auditable, HasTenant;

    protected $table = "inventory_item";

    protected $fillable = [
        'item_id',
        'inventory_id',
        'amount',
        'created_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'created_at' => 'datetime:Y-m-d\TH:i:s'
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
