<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse\Policies;

class BaseAllowAllPolicy
{
    public function before($user, $ability)
    {
        return true; // allow everything by default; override in app if needed
    }
}

