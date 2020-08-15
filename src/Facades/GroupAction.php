<?php

namespace  Boly\TableBuilder\Facades;

use Illuminate\Support\Facades\Facade;
use Boly\TableBuilder\GroupAction as BolyGroupAction;

class GroupAction extends Facade
{

    public static function getFacadeAccessor()
    {
        return BolyGroupAction::class;
    }
}
