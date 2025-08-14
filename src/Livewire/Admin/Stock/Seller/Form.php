<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Livewire\Admin\Stock\Seller;

use Livewire\Component;
use SteelAnts\LaravelBoilerplate\Warehouse\Models\Seller;

class Form extends Component
{
    public $seller_id;
    public string $name = '';
    public ?string $street = null;
    public ?string $city = null;
    public ?string $postcode = null;
    public ?string $state = null;
    public ?string $ico = null;
    public ?string $dic = null;
    public bool $is_vat_payer = false;

    protected function rules()
    {
        return [
            'name'          => 'required|string|max:255',
            'street'        => 'nullable|string|max:255',
            'city'          => 'nullable|string|max:255',
            'postcode'      => 'nullable|string|max:20',
            'state'         => 'nullable|string|max:255',
            'ico'           => 'nullable|string|max:50',
            'dic'           => 'nullable|string|max:50',
            'is_vat_payer'  => 'boolean',
        ];
    }

    public function mount($seller_id = null)
    {
        $this->seller_id = $seller_id;
        if (!empty($this->seller_id)) {
            $seller = Seller::find($this->seller_id);
            if ($seller) {
                $this->name = (string) $seller->name;
                $this->street = $seller->street;
                $this->city = $seller->city;
                $this->postcode = $seller->postcode;
                $this->state = $seller->state;
                $this->ico = $seller->ico;
                $this->dic = $seller->dic;
                $this->is_vat_payer = (bool) $seller->is_vat_payer;
            }
        }
    }

    public function render()
    {
        return view('boilerplate-warehouse::livewire.admin.stock.seller.form');
    }

    public function store()
    {
        $this->authorize('create', Seller::class);

        $validatedData = $this->validate();

        if (!empty($this->seller_id)) {
            $seller = Seller::find($this->seller_id);
            $this->authorize('update', $seller);
            $seller->update($validatedData);
            $this->dispatch('snackbar', ['message' => __('Prodejce upraven'), 'type' => 'success', 'icon' => 'fas fa-check']);
        } else {
            $this->authorize('create', Seller::class);
            Seller::create($validatedData);
            $this->dispatch('snackbar', ['message' => __('boilerplate::ui.create'), 'type' => 'success', 'icon' => 'fas fa-check']);
        }

        $this->dispatch('close-modal');
        $this->dispatch('sellerAdded');

        $this->reset('seller_id');
        $this->reset('name');
        $this->reset('street');
        $this->reset('city');
        $this->reset('postcode');
        $this->reset('state');
        $this->reset('ico');
        $this->reset('dic');
        $this->reset('is_vat_payer');
    }
}

