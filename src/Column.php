<?php

namespace  Builder\TableBuilder;

use Illuminate\Support\Str;
use Builder\TraitS\TableBuilder\CanSee;

class Column
{
    use CanSee;
    /**
     * Label Of Column
     *
     * @var [string]
     */
    public $label;
    /**
     * Field TO Get data 
     *
     * @var [string]
     */
    public $field;
    /**
     * Is Column Sortable 
     *
     * @var boolean
     */
    public $sortable = false;



    /**
     *  filter
     *
     * @var [mixed]
     */
    public $filterOptions;



    public function field($label, $field = '')
    {
        if (!$field) {
            $field = Str::snake($label);
        }
        $this->field = $field;
        $this->label  = $label;

        return $this;
    }
    /**
     * Set Filter Option
     *
     * @param FilterOption $filterOption
     * @return self
     */
    protected function filterOptions(FilterOption $filterOption)
    {
        $this->filterOptions = $filterOption;

        return $this;
    }
    /**
     * Set Sortable Field   
     *
     * @return self
     */
    protected function sortable()
    {
        $this->sortable = true;
        return $this;
    }
}
