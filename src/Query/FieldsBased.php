<?php


namespace ElasticDSL\Query;

trait FieldsBased {

    public function fields(
        array $fields
    ) : self
    {
        $this->pointer->{"fields"} = $fields;
        return $this;
    }
}


