<?php

namespace Builder\Traits\TableBuilder;


trait CanSee
{

    /**
     * 
     * Can See Component 
     * @var boolean
     */
    public $canSee = true;

    /**
     * Calculate If Attribute Should visible
     *
     * @param [bool|Closure] $condition
     * @return self
     */
    public function showIf($condition)
    {
        if ($condition instanceof Closure) {
            $this->canSee =  $condition($this) ? true : false;
        }
        if (is_bool($condition)) {
            $this->canSee =  $condition;
        }
        return $this;
    }
}
