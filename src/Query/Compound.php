<?php

namespace ElasticDSL\Query;

abstract class Compound extends Query {

    public function __construct()
    {
        $this->type  = \ElasticDSL\Tools::snakeCase((new \ReflectionClass($this))->getShortName());
        if($this->type == "boolean") $this->type = "bool"; #todo shit
        $this->object = (Object) [];
        $this->object->{$this->type} = (Object) [];
        $this->pointer = &$this->object->{$this->type};
    }


}


