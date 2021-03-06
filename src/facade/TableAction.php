<?php

namespace  Builder\TableBuilder\Facades;

use Builder\Component\TableAction as BuilderTableAction;
use Illuminate\Support\Facades\Facade;

class TableAction extends Facade
{

    public static function getFacadeAccessor()
    {
        return BuilderTableAction::class;
    }
}
