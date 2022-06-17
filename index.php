<?php

use ElasticDSL\Query;
use ElasticDSL\Aggregation;

# The Primary Node of the Syntax Tree
//include "src/Search.php";
include "src/Tools.php";

# Traits
include "src/Query/QueryBased.php";
include "src/Query/ValueBased.php";
include "src/Query/FieldsBased.php";

# Query Clause Abstractions
include "src/Query/Query.php";
include "src/Query/Leaf.php";
include "src/Query/SingleField.php";
include "src/Query/MultiField.php";
include "src/Query/Compound.php";

# Query Clause Types
include "src/Query/Match.php";
include "src/Query/Fuzzy.php";
include "src/Query/MatchPhrase.php";
include "src/Query/MatchBoolPrefix.php";
include "src/Query/MatchPhrasePrefix.php";
include "src/Query/MultiMatch.php";
include "src/Query/QueryString.php";
include "src/Query/Regexp.php";
include "src/Query/Term.php";
include "src/Query/Range.php";
include "src/Query/Wildcard.php";
include "src/Query/Boolean.php";

# Boolean Clauses
include "src/Query/BoolClauses/BoolClause.php";
include "src/Query/BoolClauses/Must.php";
include "src/Query/BoolClauses/MustNot.php";
include "src/Query/BoolClauses/Should.php";
include "src/Query/BoolClauses/Filter.php";


# Aggregations
include "src/Aggregation/Aggregation.php";
include "src/Aggregation/Bucket.php";
include "src/Aggregation/Metric.php";
include "src/Aggregation/Filter.php";
include "src/Aggregation/Terms.php";
include "src/Aggregation/Cardinality.php";
include "src/Aggregation/ValueCount.php";
include "src/Aggregation/Avg.php";
include "src/Aggregation/Sum.php";
include "src/Aggregation/Stats.php";
include "src/Aggregation/ExtendedStats.php";
include "src/Aggregation/Percentiles.php";



class Builder {

    public function __construct()
    {
        $this->from = 0;
        $this->size = 0;
        $this->aggregations = (Object) [];
    }

    public function bindQueryClause(
        Query\Query $queryClause
    ) : self
    {
        $this->query = $queryClause->get();
        return $this;
    }

    public function bindAggregation(
        Aggregation\Aggregation $aggregation
    ) : self
    {
        foreach($aggregation->get() as $key=>$value)
        {
            $this->aggregations->$key = $value;
        }
        return $this;
    }
}



$dslQuery = (new Builder())
    ->bindQueryClause(
        (new Query\MultiMatch())
            ->fields(["meow", "woof"])
            ->query("Seattle")
    )
    ->bindAggregation(
        (new Aggregation\Terms("geo_region1.geo_region1_raw"))
    )
    ->bindAggregation(
        (new Aggregation\Filter("geo_country.geo_country_raw", "country"))
            ->bindQueryClause(
                (new Query\Term("geo_city.geo_city_raw"))
                    ->value("Seattle")
            )
    )

;


echo "<PRE>";
echo json_encode($dslQuery, JSON_PRETTY_PRINT);
exit;




