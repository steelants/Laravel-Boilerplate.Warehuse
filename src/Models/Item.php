<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Models;

use App\Observers\ItemObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory, Auditable, HasTenant;

    protected $fillable = [
        'name',
        'description',
        'identifier',
        'sku',
        'ean',
        'category_id',
        'vat_rate',
        'seller_id',
        'price',
        'price_no_vat',
        'currency',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'price_no_vat' => 'decimal:2',
    ];

    protected static function booted()
    {
        Item::observe(ItemObserver::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function inventoryItems()
    {
        return $this->hasMany(InventoryItem::class, "item_id", "id");
    }

    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLog::class, "item_id", "id");
    }
}
