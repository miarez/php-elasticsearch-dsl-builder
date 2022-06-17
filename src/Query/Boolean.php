<?php

namespace ElasticDSL\Query;

class Boolean extends Compound {

    public function bindBoolClause(
        BoolClause $boolClause
    ) : self
    {
        foreach($boolClause->get() as $boolType=>$boolObject)
        {
            $this->pointer->$boolType = $boolObject;
        }
        return $this;
    }

    public function minimumShouldMatch(
        int $minimumShouldMatch
    ) : self
    {
        $this->pointer->{"minimum_should_match"} = $minimumShouldMatch;
        return $this;
    }


}
