<?php

namespace ElasticDSL\Aggregation;

class Filter extends Bucket {

    public function __construct(string $field, string $alias = "")
    {
        parent::__construct($field, $alias);
        $this->field = $field;
        $this->alias = $alias ?: $field;
        $this->type  = \ElasticDSL\Tools::snakeCase((new \ReflectionClass($this))->getShortName());
        $this->object = (Object) [];
        $this->object->{$this->alias} = (Object) [];
        $this->object->{$this->alias}  = (Object) [];
        $this->pointer = &$this->object->{$this->alias};
    }


    public function bindQueryClause(
        \ElasticDSL\Query\Query $queryClause
    ) : self
    {
        $this->pointer->{"filter"} = $queryClause->get();
        return $this;
    }

}