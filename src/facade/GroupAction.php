<?php

namespace  Builder\TableBuilder\Facades;

use Illuminate\Support\Facades\Facade;
use Builder\TableBuilder\GroupAction as BuilderGroupAction;

class GroupAction extends Facade
{

    public static function getFacadeAccessor()
    {
        return BuilderGroupAction::class;
    }
}
