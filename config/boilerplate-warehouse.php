<?php

return [
    'datatable' => [
        // Alias of the Steel Ants datatable Livewire component
        'alias' => 'datatable',

        'items' => [
            'columns' => [
                ['key' => 'name', 'label' => 'Název'],
                ['key' => 'sku', 'label' => 'SKU'],
                ['key' => 'price', 'label' => 'Cena'],
            ],
        ],

        'inventories' => [
            'columns' => [
                ['key' => 'name', 'label' => 'Sklad'],
            ],
        ],

        'sellers' => [
            'columns' => [
                ['key' => 'name', 'label' => 'Prodejce'],
            ],
        ],
    ],
];

