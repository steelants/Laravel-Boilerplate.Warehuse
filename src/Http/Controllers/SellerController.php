<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Http\Controllers;

use Illuminate\Routing\Controller;

class SellerController extends Controller
{
    public function index()
    {
        return view('boilerplate-warehouse::sellers.index');
    }
}

