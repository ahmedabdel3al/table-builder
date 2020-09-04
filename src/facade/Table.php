<?php

namespace  Builder\TableBuilder\Facades;

use Illuminate\Support\Facades\Facade;
use Builder\TableBuilder\Table as BuilderTable;


class Table extends Facade
{

    public static function getFacadeAccessor()
    {
        return BuilderTable::class;
    }
}
