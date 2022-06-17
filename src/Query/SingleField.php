<?php

namespace ElasticDSL\Query;

abstract class SingleField extends Leaf {

    public function __construct(
        string $field
    )
    {
        $this->field = $field;
        $this->type  = \ElasticDSL\Tools::snakeCase((new \ReflectionClass($this))->getShortName());
        $this->object = (Object) [];
        $this->object->{$this->type} = (Object) [];
        $this->object->{$this->type}->{$this->field}  = (Object) [];
        $this->pointer = &$this->object->{$this->type}->{$this->field};
    }

}