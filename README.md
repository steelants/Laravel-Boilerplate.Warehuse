# Laravel Boilerplate Warehouse

Simple Laravel warehouse package providing models, migrations and Blade views for basic inventory, items, categories and suppliers management.

Installation
- Require the package in your Laravel app and run `composer dump-autoload`.
- Ensure auto-discovery registers `SteelAnts\LaravelBoilerplate\Warehouse\BoilerplateWarehouseServiceProvider`.
- Publish and run migrations: `php artisan vendor:publish --tag=boilerplate-warehouse-migrations` then `php artisan migrate`.
- Optionally publish views: `php artisan vendor:publish --tag=boilerplate-warehouse-views`.

Included
- Models: `Item`, `Inventory`, `Category`, `Supplier`, `InventoryItem`, `InventoryLog`, `Stockup`.
- Migrations for all related tables with foreign keys.
- Observers to cascade deletions for related records.
- Blade views hooking into expected Livewire components from the Boilerplate.

Routes
- Registered under prefix `admin/stock` with names `admin.stock.*`:
  - `GET /admin/stock/items` → items list view
  - `GET /admin/stock/items/{item}` → item detail
  - `GET /admin/stock/inventories` → inventories list view
  - `GET /admin/stock/sellers` → sellers list view
  - `GET /admin/stock/process` → placeholder (points to inventories view)

Policies
- Default policies allow all actions; override in your app if needed by re-mapping via `Gate::policy()`.

Notes
- Traits like tenancy/auditing are not hard-required here; wire your own if needed.
