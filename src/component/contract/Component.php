<?php

namespace Builder\Component\TableBuilder;


interface Component
{
    public function make(...$attributes): self;
}
