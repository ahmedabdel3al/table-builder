<?php

namespace  Boly\TableBuilder\Facades;

use Illuminate\Support\Facades\Facade;
use Boly\TableBuilder\Column as BolyColumn;


class Column extends Facade
{

    public static function getFacadeAccessor()
    {
        static::clearResolvedInstance(BolyColumn::class);
        return BolyColumn::class;
    }
}
