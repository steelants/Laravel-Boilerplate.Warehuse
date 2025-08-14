<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use SteelAnts\LaravelBoilerplate\Warehouse\Models\{Item,Inventory,Seller,Supplier,Category};
use SteelAnts\LaravelBoilerplate\Warehouse\Policies\{ItemPolicy,InventoryPolicy,SellerPolicy,SupplierPolicy,CategoryPolicy};
use Livewire\Livewire;
use SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Item\DataTable as ItemDataTable;
use SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Item\Form as ItemForm;
use SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Inventory\DataTable as InventoryDataTable;
use SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Inventory\Form as InventoryForm;
use SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Seller\DataTable as SellerDataTable;
use SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Seller\Form as SellerForm;

class BoilerplateWarehouseServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/admin.php');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'boilerplate-warehouse');
        $this->publishes([
            __DIR__ . '/../config/boilerplate-warehouse.php' => config_path('boilerplate-warehouse.php'),
        ], 'boilerplate-warehouse-config');

        if ($this->app->runningInConsole()) {
            $this->bootConsole();
        }

        $this->registerPolicies();
        $this->registerLivewire();
    }

    protected function bootConsole(): void
    {
        $this->publishes([
            __DIR__ . '/../migrations' => database_path('migrations'),
        ], 'boilerplate-warehouse-migrations');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/boilerplate-warehouse'),
        ], 'boilerplate-warehouse-views');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/boilerplate-warehouse.php', 'boilerplate-warehouse');
    }

    protected function registerPolicies(): void
    {
        Gate::policy(Item::class, ItemPolicy::class);
        Gate::policy(Inventory::class, InventoryPolicy::class);
        Gate::policy(Seller::class, SellerPolicy::class);
        Gate::policy(Supplier::class, SupplierPolicy::class);
        Gate::policy(Category::class, CategoryPolicy::class);
    }

    protected function registerLivewire(): void
    {
        Livewire::component('admin.stock.item.data-table', ItemDataTable::class);
        Livewire::component('admin.stock.item.form', ItemForm::class);
        Livewire::component('admin.stock.inventory.data-table', InventoryDataTable::class);
        Livewire::component('admin.stock.inventory.form', InventoryForm::class);
        Livewire::component('admin.stock.seller.data-table', SellerDataTable::class);
        Livewire::component('admin.stock.seller.form', SellerForm::class);
    }
}
