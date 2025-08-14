<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Http\Controllers;

use Illuminate\Routing\Controller;

class InventoryController extends Controller
{
    public function index()
    {
        return view('boilerplate-warehouse::inventory.index');
    }
}

