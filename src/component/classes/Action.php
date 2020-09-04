<?php

namespace Builder\Component\Classes\TableBuilder;

use Builder\Component\TableBuilder\Component;
use Builder\Traits\TableBuilder\CanSee;
use Builder\Traits\TableBuilder\Tooltip;

abstract class Action implements Component
{
    use CanSee, Tooltip;


    protected $static_route_key = 'static_key';

    protected $static_route_value = 'id';

    /**
     * Is Column Html
     *
     * @var boolean
     */
    public $html = true;


    public function __construct()
    {
        $this->static_route_key = config('builder-action.static_route_key');
        $this->static_route_value = config('builder-action.static_route_value');
    }

    /**
     * Set Static Key for route 
     * example : route('users.show',['user'=> '$key']) 
     * users/static_key
     * which we will replace static_key to there value  in frontend 
     *
     * @param [string] $key
     * @return self
     */
    protected function setStaticRouteKey(string  $key)
    {
        $this->static_route_key = $key;
        return $this;
    }
    /**
     * Set Static Key for route 
     * example : route('users.show',['user'=> '$key']) 
     * users/static_key  [static_key=> 20]
     * users/20
     * which we will replace static_key to there value  in frontend 
     *
     * @param [string] $key
     * @return self
     */
    protected function setStaticRouteValue($value)
    {
        $this->static_route_value;
        return $this;
    }
}
