<?php

namespace  Builder\TableBuilder;


class GroupAction
{

    protected $groups = [];

    protected $model;

    protected $availableActions = [
        'delete',
        'excel'
    ];

    public function forModel($model)
    {
        $this->model = $model;
        return $this;
    }
    public function delete($route, $key_name_will_send_to_server = 'id', $key_which_plucking_from_data = 'id')
    {
        return  $this->group('destroy', $route, $key_name_will_send_to_server, $key_which_plucking_from_data);
    }
    public function excel($route, $key_name_will_send_to_server = 'id', $key_which_plucking_from_data = 'id')
    {
        return  $this->group('excel', $route, $key_name_will_send_to_server, $key_which_plucking_from_data);
    }
    public function group($name, $route, $key_name_will_send_to_server = 'id', $key_which_plucking_from_data = 'id')
    {
        $this->groups[] = [
            'name' => $name,
            'url' => $route,
            'key' => $key_name_will_send_to_server,
            'value' => $key_which_plucking_from_data
        ];
        return $this;
    }


    public function when($condition, callable $callable)
    {
        if (!$condition) {
            return $this;
        }
        return $callable($this);
    }
    public function getGroups()
    {
        if (!$this->model) {
            return $this->groups;
        }
        $policy = $this->guessPolicyClass();

        return array_filter($this->groups, function ($group) use ($policy) {
            if (!method_exists($policy, $group['name'])) {
                return true;
            }
            return  $policy->{$group['name']}(auth()->loginUsingId(1, true), true);
        });
    }

    private function guessPolicyClass()
    {
        $policyName = 'App\Policies\\' . ucwords(class_basename($this->model)) . 'Policy';
        return  app($policyName);
    }
}
