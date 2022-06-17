<?php


namespace ElasticDSL;

class Tools {

    public static function snakeCase(
        string $className
    ) : string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $className));
    }

}