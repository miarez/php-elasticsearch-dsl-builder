<?php


namespace ElasticDSL\Query;

class QueryString extends MultiField {

    use QueryBased;

    public function __construct()
    {
        $this->type   = \ElasticDSL\Tools::snakeCase((new \ReflectionClass($this))->getShortName());
        $this->object = (Object) [];
        $this->object->{$this->type} = (Object) [];
        $this->pointer = &$this->object->{$this->type};
    }


    public function defaultField(
        string $defaultField
    ) : Query
    {
        $this->object->{$this->type}->{"default_field"} = $defaultField;
        return $this;
    }


}