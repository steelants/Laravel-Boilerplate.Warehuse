<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Models;

use App\Observers\SellerObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory, Auditable, HasTenant;

    protected $fillable = [
        'name',
    ];

    protected static function booted()
    {
        Seller::observe(SellerObserver::class);
    }

    public function items()
    {
        return $this->belongsTo(Item::class);
    }
}
