<?php

namespace  Builder\TableBuilder;


class FilterOption
{
    /**
     * Enable filter
     *
     * @var [Boolean]
     */
    public $enabled = true;

    /**
     * Placeholder 
     *
     * @var [String]
     */
    public $placeholder;

    /**
     *  Drop Down Item
     * @var  [array] 
     *       
     */
    public $filterDropdownItems = [];

    /**
     * trigger Action 
     *
     * @var string
     */
    public $trigger = "enter";


    public function __construct(array $filterDropdownItems = [], $placeholder = "search", $trigger = "enter")
    {

        $this->filterDropdownItems = $filterDropdownItems;
        $this->placeholder = $placeholder;
        $this->trigger = $trigger;
    }
}
