<?php

namespace  Boly\TableBuilder;

use stdClass;

class Table
{
    /**
     * Url To Fetch 
     *
     * @var [url]
     */
    public $fetchUrl;
    /**
     * Collections of Column 
     *
     * @var array
     */
    public $columns = [];
    /**
     * Table mode
     *
     * @var string
     */
    public $mode;
    /**
     * is Rtl
     *
     * @var boolean
     */
    public $rtl;
    /**
     * Table Has Line Numbers
     *
     * @var boolean
     */
    public $lineNumbers;
    /**
     * Fixed Header
     *
     * @var boolean
     */
    public $fixedHeader;

    public $selectOptions;

    public $paginationOptions;

    public $paginationEnabled = false;

    public $group = [];


    public $filters = [];



    public function __construct($lineNumbers = true, $fixedHeader = false, $rtl = false, $mode = "remote")
    {
        $this->lineNumbers = $lineNumbers;
        $this->fixedHeader = $fixedHeader;
        $this->rtl = $rtl;
        $this->mode = $mode;
        $this->selectOptions = new stdClass;
        $this->paginationOptions = new stdClass;
    }

    private function selectOptions()
    {
        $this->selectOptions->enabled = true;
        $this->selectOptions->selectOnCheckboxOnly = true;
        return $this;
    }
    public function paginationOptions($enabled = true, $per_page = 20, $perPageDropdown = [10, 20, 30, 40], $dropdownAllowAll = true)
    {
        $this->paginationEnabled = $enabled;
        $this->paginationOptions->enabled =  $enabled;
        $this->paginationOptions->mode = "records";
        $this->paginationOptions->perPageDropdown = $perPageDropdown;
        $this->paginationOptions->dropdownAllowAll = $dropdownAllowAll;
        $this->paginationOptions->perPage = in_array((int) request()->per_page, $perPageDropdown) ? (int) request()->per_page : $per_page;
        return $this;
    }
    public function fetchUrl($url)
    {
        $this->fetchUrl = $url;
        return $this;
    }
    public function columns(array $columns)
    {
        $columns = collect($columns)->reject(function ($column) {
            return !$column->canSee;
        })->toArray();
        $this->columns =  array_merge($this->columns, $columns);
        return $this;
    }
    public function actions(TableAction $tableAction)
    {
        $this->columns[] = $tableAction;
        return $this;
    }

    public function groupAction(GroupAction $group)
    {
        $this->selectOptions();
        $this->group = $group->getGroups();
        return $this;
    }

    public function filters(array $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
