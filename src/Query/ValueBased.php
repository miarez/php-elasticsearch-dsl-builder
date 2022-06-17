<?php

namespace ElasticDSL\Query;

trait ValueBased {

    public function value(
        string $value
    ) : Query
    {
        $this->pointer->{"value"} = $value;
        return $this;
    }
}


