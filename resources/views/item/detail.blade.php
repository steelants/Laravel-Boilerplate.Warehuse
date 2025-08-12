<x-admin.layout>
    <div class="container-xl">
        <div class="page-header">
            <h1>{{ $item->name }}</h1>
        </div>
        <div class="page-body">
            <p><b>{{ __('Popis') . ": " }}</b>{{ (!empty($item->description) ? $item->description : "") }}</p>
            <p><b>{{ __('Identifikátor') . ": " }}</b>{{ (!empty($item->identifier) ? $item->identifier : "") }}</p>
            <p><b>{{ __('sku') . ": " }}</b>{{ (!empty($item->sku) ? $item->sku : "") }}</p>
            <p><b>{{ __('ean') . ": " }}</b>{{ (!empty($item->ean) ? $item->ean : "") }}</p>
            <p><b>{{ __('Kategorie') . ": " }}</b>{{ (!empty($item->category->name) ? $item->category->name : __("Bez kategorie")) }}</p>
            <p><b>{{ __('Sazba DPH') . ": " }}</b>{{ (!empty($item->vat_rate) ? $item->vat_rate . "%" : "") }}</p>
            <p><b>{{ __('Prodejce') . ": " }}</b>{{ (!empty($item->seller->name) ? $item->seller->name : "") }}</p>
            <p><b>{{ __('Cena') . ": " }}</b>{{ (!empty($item->price) ? $item->price : "") }}</p>
            <p><b>{{ __('Cena bez DPH') . ": " }}</b>{{ (!empty($item->price_no_vat) ? $item->price_no_vat : "") }}</p>
            <p><b>{{ __('Měna') . ": " }}</b>{{ (!empty($item->currency) ? $item->currency : "") }}</p>
            <hr/>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Sklad') }}</th>
                        <th scope="col">{{ __('Množství na skladě') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventoryItems as $inventoryItem)
                        <tr>
                            <td>{{ $inventoryItem->inventory->name }}</td>
                            <td>{{ $inventoryItem->amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layout>
