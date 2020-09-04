<?php

namespace  Builder\TableBuilder\Facades;

use Illuminate\Support\Facades\Facade;
use Builder\TableBuilder\Column as BuilderColumn;


class Column extends Facade
{

    public static function getFacadeAccessor()
    {
        static::clearResolvedInstance(BuilderColumn::class);
        return BuilderColumn::class;
    }
}
