<?php

namespace  Builder\TableBuilder;

use Closure;
use Illuminate\Support\Str;
use stdClass;

class Column
{
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
    public $sortable;

    /**
     * Is Column Html
     *
     * @var boolean
     */
    public $html;

    /**
     * component value
     *
     * @var [array]
     */
    public $component;
    /**
     * Table Body Class 
     *
     * @var [string]
     */
    public $tdClass;
    /**
     * table head Class 
     *
     * @var [string]
     */
    public $thClass;

    /**
     *  filter
     *
     * @var [mixed]
     */
    public $filterOptions;

    public $canSee = true;

    public function __construct(bool $sortable = false, bool $html = false, $component = [], string $tdClass = "text-center", string  $thClass = "text-center")
    {

        $this->sortable = $sortable;
        $this->html = $html;
        $this->component = $component;
        $this->thClass = $thClass;
        $this->tdClass = $tdClass;
        $this->filterOptions = new stdClass;
    }


    public function filterOptions(FilterOption $filterOption)
    {
        $this->filterOptions = $filterOption;

        return $this;
    }
    public function field($label, $field = '')
    {
        if (!$field) {
            $field = Str::snake($label);
        }
        $this->field = $field;
        $this->label  = $label;

        return $this;
    }
    public function sortable()
    {
        $this->sortable = true;
        return $this;
    }

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
