<?php

namespace ElasticDSL\Aggregation;

abstract class Bucket extends Aggregation {

    public function bindAggregation(
        Aggregation $aggregation
    ) : self
    {
        $this->pointer->{"aggregations"} = $aggregation->get();
        return $this;
    }


}