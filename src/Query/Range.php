<?php


namespace ElasticDSL\Query;

class Range extends SingleField {

    public function gt(
        int $greaterThan
    ) : self
    {
        $this->pointer->{"gt"} = $greaterThan;
        return $this;
    }

    public function gte(
        int $greaterThanOrEqualTo
    ) : self
    {
        $this->pointer->{"gte"} = $greaterThanOrEqualTo;
        return $this;
    }


    public function lt(
        int $lessThan
    ) : self
    {
        $this->pointer->{"lt"} = $lessThan;
        return $this;
    }



    public function lte(
        int $lessThanOrEqualTo
    ) : self
    {
        $this->pointer->{"lte"} = $lessThanOrEqualTo;
        return $this;
    }



}
