<?php


namespace Builder\TraitS\TableBuilder;

trait Tooltip
{
    /**
     * Tooltip
     *
     * @var [string]
     */
    public $tooltip;

    public function tooltip(string $tooltip = null)
    {
        $this->tooltip = $tooltip ?: strtolower(class_basename($this));
        return $this;
    }
}
