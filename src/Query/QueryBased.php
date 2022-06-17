<?php


namespace ElasticDSL\Query;

trait QueryBased {

    public function query(
        string $query
    ) : self
    {
        $this->pointer->{"query"} = $query;
        return $this;
    }
}


