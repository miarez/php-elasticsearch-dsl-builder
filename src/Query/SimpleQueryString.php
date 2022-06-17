<?php


namespace Query;

class SimpleQueryString extends Leaf {

    use QueryBased, FieldsBased;

    public function __construct()
    {
        parent::__construct("");
        $this->type   = self::snakeCase((new \ReflectionClass($this))->getShortName());
        $this->object = (Object) [];
        $this->object->{$this->type} = (Object) [];
        $this->pointer = &$this->object->{$this->type};
    }


    public function defaultField(
        string $defaultField
    ) : Query
    {
        $this->pointer->{"default_field"} = $defaultField;
        return $this;
    }


}