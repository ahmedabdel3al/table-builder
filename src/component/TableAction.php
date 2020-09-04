<?php

namespace Builder\Component;

use Builder\Component\TableBuilder\Component;
use Builder\Traits\TableBuilder\CanSee;

class TableAction
{
    use CanSee;


    public $components = [];

    public $tableAction = true;

    public $field  = 'Actions';

    public  $label;



    public function component(Component $component)
    {
        if ($component->canSee) {
            $this->component[] = $component->toolTip();
        }
        return $this;
    }

    public function label($label)
    {
        $this->label  = $label;

        return $this;
    }
}
