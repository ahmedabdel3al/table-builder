<?php

namespace Builder\Component\TableBuilder;


interface Component
{
    public function component(array $attributes = []): self;
}
