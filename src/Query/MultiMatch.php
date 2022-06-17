<?php


namespace ElasticDSL\Query;

class MultiMatch extends MultiField
{
    use QueryBased, FieldsBased;

    const TYPE_BEST_FIELDS      = "best_fields";
    const TYPE_MOST_FIELDS      = "most_fields";
    const TYPE_CROSS_FIELDS     = "cross_fields";
    const TYPE_PHRASE           = "phrase";
    const TYPE_PHRASE_PREFIX    = "phrase_prefix";
    const TYPE_BOOL_PREFIX      = "bool_prefix";

    CONST VALID_TYPES = [
        self::TYPE_BEST_FIELDS,
        self::TYPE_MOST_FIELDS,
        self::TYPE_CROSS_FIELDS,
        self::TYPE_PHRASE,
        self::TYPE_PHRASE_PREFIX,
        self::TYPE_BOOL_PREFIX
    ];

    public function __construct()
    {
        $this->type  = \ElasticDSL\Tools::snakeCase((new \ReflectionClass($this))->getShortName());
        $this->object = (Object) [];
        $this->object->{$this->type} = (Object) [];
        $this->pointer = &$this->object->{$this->type};
    }


    public function type(
       string $type
    ) : self
    {
        if(!in_array($type, self::VALID_TYPES)){
            throw new  \InvalidArgumentException("[{$type}] Is Not A Valid Multi-Match Type");
        }
        $this->pointer->{"type"} = $type;
        return $this;
    }


}
