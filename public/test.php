<?php
function sortByPriceAscending(string $jsonString): string
{
    $data = json_decode($jsonString);

    usort($data, "sortObjectsByPrice");

    return json_encode($data);
}

echo sortByPriceAscending('[{"name":"eggs","price":1},{"name":"coffee","price":9.99},{"name":"rice","price":4.04}]');

function sortObjectsByPrice($x, $y) {
    if($x->price === $y->price) {
        return compareNames($x, $y);
    }

    return ($x->price < $y->price) ? -1 : 1;
}

function compareNames($x, $y) {
    $arr = [$x->name, $y->name];
    sort($arr);
    $firstName =  reset($arr);

    return ($x->name === $firstName) ? -1 : 1;
}
