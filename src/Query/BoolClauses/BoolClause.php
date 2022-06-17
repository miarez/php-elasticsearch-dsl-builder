<?php

namespace ElasticDSL\Query;

abstract class BoolClause {

    protected $object;
    protected $pointer;

    public function __construct(
    )
    {
        $this->type  = \ElasticDSL\Tools::snakeCase((new \ReflectionClass($this))->getShortName());
        $this->object = (Object) [];
        $this->object->{$this->type} =  [];
        $this->pointer = &$this->object->{$this->type};
    }

    public function get()
    {
        return $this->object;
    }

    public function bindQueryClause(
        Query $queryClause
    ) : self
    {
        $this->pointer[] = $queryClause->get();
        return $this;
    }

}