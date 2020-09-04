<?php

namespace  Builder\TableBuilder;

use Closure;
use Illuminate\Support\Str;

class TableAction extends Column
{

    protected $static_route_key = 'static_key';
    protected $static_route_value = 'id';

    public $components = [];

    public $group = [];

    public $tableAction = true;


    public $model = '';

    public function __construct()
    {
        parent::__construct(false, true);
    }



    public function label($label)
    {
        $this->field = 'Actions';
        $this->label  = $label;

        return $this;
    }



    public function model(string $model, array $actions)
    {
        $this->model = Str::plural(Str::snake(class_basename($model)));
        foreach ($actions as $key => $value) {
            if (is_integer($key)) {
                $key = $value;
                $value = true;
            }
            $this->when($value, function ($action) use ($key) {
                $this->{$key}(route($this->model . '.' . $key, [Str::singular($this->model) => $this->static_route_key]));
            });
        }

        return $this;
    }

    public function edit($url, string $replace_value = null, string $replace_key = null)
    {
        $this->components[] = [
            'name' => 'edit',
            'url' => $url,
            'key' => $replace_key ?: $this->static_route_key,
            'value' => $replace_value ?: $this->static_route_value
        ];
        return $this;
    }

    public function show($url, string $replace_value = null, string $replace_key = null)
    {
        $this->components[] = [
            'name' => 'show',
            'url' => $url,
            'key' => $replace_key ?: $this->static_route_key,
            'value' => $replace_value ?: $this->static_route_value
        ];
        return $this;
    }

    public function when($condition, callable $closure)
    {
        if ($condition instanceof Closure) {
            $condition = $condition($this);
        }
        if (!$condition) {
            return $this;
        }
        return $closure($this);
    }

    public function delete($url, string $replace_value = null, string $replace_key = null)
    {
        $this->components[] = [
            'name' => 'destroy',
            'url' => $url,
            'key' => $replace_key ?: $this->static_route_key,
            'value' => $replace_value ?: $this->static_route_value
        ];
        return $this;
    }

    // public function toggle($url, string $replace_value = null, string $replace_key = null)
    // {
    //     $this->components[] = [
    //         'name' => 'toggle',
    //         'url' => $url,
    //         'key' => $replace_key ?: $this->static_route_key,
    //         'value' => $replace_value ?: $this->static_route_value
    //     ];
    //     return $this;
    // }
}
