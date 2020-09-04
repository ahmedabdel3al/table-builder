<?php


namespace Builder\TraitS\TableBuilder;

trait Makeable
{
    /**
     * Component Option
     *
     * @var array
     */
    protected $component = [];

    /**
     * set Component attributes 
     *
     * @param [string] $url
     * @param [string |int | null] $static_route_key
     * @param [string |int | null] $static_route_value
     * @return self
     */
    protected function make(string $url, $static_route_key = null, $static_route_value = null): self
    {
        $this->component = [
            'name' => $this->name,
            'url' => $url,
            'key' => $static_route_key ?: $this->static_route_key,
            'value' => $static_route_value ?: $this->static_route_value
        ];
        return $this;
    }
}
