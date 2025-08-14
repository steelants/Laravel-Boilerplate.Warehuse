<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Inventory;

use Livewire\Component;
use SteelAnts\LaravelBoilerplate\Warehouse\Models\Inventory;

class Form extends Component
{
    public $inventory_id;
    public string $name = '';

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function mount($inventory_id = null)
    {
        $this->inventory_id = $inventory_id;
        if (!empty($this->inventory_id)) {
            $inventory = Inventory::find($this->inventory_id);
            if ($inventory) {
                $this->name = (string) $inventory->name;
            }
        }
    }

    public function render()
    {
        return view('boilerplate-warehouse::livewire.admin.stock.inventory.form');
    }

    public function store()
    {
        $this->authorize('create', Inventory::class);

        $validatedData = $this->validate();

        if (!empty($this->inventory_id)) {
            $inventory = Inventory::find($this->inventory_id);
            $this->authorize('update', $inventory);
            $inventory->update($validatedData);
            $this->dispatch('snackbar', ['message' => __('Sklad upraven'), 'type' => 'success', 'icon' => 'fas fa-check']);
        } else {
            $this->authorize('create', Inventory::class);
            Inventory::create($validatedData);
            $this->dispatch('snackbar', ['message' => __('boilerplate::ui.create'), 'type' => 'success', 'icon' => 'fas fa-check']);
        }

        $this->dispatch('close-modal');
        $this->dispatch('inventoryAdded');

        $this->reset('inventory_id');
        $this->reset('name');
    }
}

