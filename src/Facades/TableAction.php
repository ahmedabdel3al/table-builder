<?php

namespace  Boly\TableBuilder\Facades;

use Boly\TableBuilder\TableAction as BolyTableAction;
use Illuminate\Support\Facades\Facade;

class TableAction extends Facade
{

    public static function getFacadeAccessor()
    {
        return BolyTableAction::class;
    }
}
