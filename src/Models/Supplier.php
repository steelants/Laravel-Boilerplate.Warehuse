<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Models;

use App\Observers\SupplierObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory, Auditable, HasTenant, HasContact;

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

    protected static function booted()
    {
        Supplier::observe(SupplierObserver::class);
    }

    public function inventoryLogs()
    {
        return $this->belongsTo(InventoryLog::class);
    }

    public function stockups()
    {
        return $this->belongsTo(Stockup::class);
    }
}
