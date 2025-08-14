<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Item;

use Livewire\Component;
use SteelAnts\LaravelBoilerplate\Warehouse\Models\Item;

class Form extends Component
{
    public $item_id;

    public string $name = '';
    public string $description = '';
    public string $identifier = '';
    public string $sku = '';
    public string $ean = '';
    public ?int $category_id = null;
    public ?int $vat_rate = 21;
    public ?int $seller_id = null;
    public string $price = '';
    public string $price_no_vat = '';
    public string $currency = '';

    protected function rules()
    {
        return [
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'identifier'    => 'nullable|string|max:255',
            'sku'           => 'nullable|string|max:255',
            'ean'           => 'nullable|string|max:13',
            'category_id'   => 'nullable|integer',
            'vat_rate'      => 'nullable|integer|min:0|max:100',
            'seller_id'     => 'required|integer',
            'price'         => 'required|numeric',
            'price_no_vat'  => 'required|numeric',
            'currency'      => 'required|string|size:3',
        ];
    }

    public function mount($item_id = null)
    {
        $this->item_id = $item_id;

        if (!empty($this->item_id)) {
            $item = Item::find($this->item_id);
            if ($item) {
                $this->name = (string) $item->name;
                $this->description = (string) ($item->description ?? '');
                $this->identifier = (string) ($item->identifier ?? '');
                $this->sku = (string) ($item->sku ?? '');
                $this->ean = (string) ($item->ean ?? '');
                $this->category_id = $item->category_id;
                $this->vat_rate = $item->vat_rate;
                $this->seller_id = $item->seller_id;
                $this->price = (string) $item->price;
                $this->price_no_vat = (string) $item->price_no_vat;
                $this->currency = (string) $item->currency;
            }
        }
    }

    public function render()
    {
        return view('boilerplate-warehouse::livewire.admin.stock.item.form');
    }

    public function store()
    {
        $this->authorize('create', Item::class);

        $validatedData = $this->validate();

        if (!empty($this->item_id)) {
            $item = Item::find($this->item_id);
            $this->authorize('update', $item);
            $item->update($validatedData);
            $this->dispatch('snackbar', ['message' => __('Položka upravena'), 'type' => 'success', 'icon' => 'fas fa-check']);
        } else {
            $this->authorize('create', Item::class);
            Item::create($validatedData);
            $this->dispatch('snackbar', ['message' => __('boilerplate::ui.create'), 'type' => 'success', 'icon' => 'fas fa-check']);
        }

        $this->dispatch('close-modal');
        $this->dispatch('itemAdded');

        $this->reset('item_id');
        $this->reset('name');
        $this->reset('description');
        $this->reset('identifier');
        $this->reset('sku');
        $this->reset('ean');
        $this->reset('category_id');
        $this->reset('vat_rate');
        $this->reset('seller_id');
        $this->reset('price');
        $this->reset('price_no_vat');
        $this->reset('currency');
    }
}

