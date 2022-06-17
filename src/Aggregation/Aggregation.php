<?php

namespace ElasticDSL\Aggregation;

abstract class Aggregation {

    protected $object;
    protected $pointer;

    public function __construct(
        string $field,
        string $alias = ""
    )
    {
        $this->field = $field;
        $this->alias = $alias ?: $field;

        $this->type  = \ElasticDSL\Tools::snakeCase((new \ReflectionClass($this))->getShortName());
        $this->object = (Object) [];
        $this->object->{$this->alias} = (Object) [];
        $this->object->{$this->alias}->{$this->type}  = (Object) [];
        $this->object->{$this->alias}->{$this->type}->{"field"}  = $field;
        $this->pointer = &$this->object->{$this->alias};
    }


    public function get() : Object
    {
        return $this->object;
    }
}