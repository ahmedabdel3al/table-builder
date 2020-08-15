<?php

namespace  Boly\TableBuilder\Facades;

use Illuminate\Support\Facades\Facade;
use Boly\TableBuilder\Table as BolyTable;


class Table extends Facade
{

    public static function getFacadeAccessor()
    {
        return BolyTable::class;
    }
}
