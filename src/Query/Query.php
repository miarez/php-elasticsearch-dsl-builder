<?php

namespace ElasticDSL\Query;

abstract class Query  {

    protected $pointer;

    public function get() : Object
    {
        return $this->object;
    }



}
