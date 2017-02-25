## Table of contents

- [\PHPieces\Collections\Collection](#class-phpiecescollectionscollection)
- [\PHPieces\Collections\Model](#class-phpiecescollectionsmodel)
- [\PHPieces\Collections\exceptions\UndefinedPropertyException](#class-phpiecescollectionsexceptionsundefinedpropertyexception)

<hr /> 
### Class: \PHPieces\Collections\Collection

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>array</em> <strong>$items=array()</strong>)</strong> : <em>void</em> |
| public | <strong>__get(</strong><em>mixed</em> <strong>$name</strong>)</strong> : <em>\PHPieces\Collections\static</em> |
| public | <strong>__set(</strong><em>mixed</em> <strong>$key</strong>, <em>mixed</em> <strong>$value</strong>)</strong> : <em>void</em> |
| public | <strong>avg()</strong> : <em>float</em><br /><em>get the average of a collection</em> |
| public | <strong>chunk(</strong><em>mixed</em> <strong>$size</strong>)</strong> : <em>[\PHPieces\Collections\Collection](#class-phpiecescollectionscollection)</em> |
| public | <strong>count()</strong> : <em>int</em><br /><em>Count the items in a collection</em> |
| public | <strong>diff(</strong><em>mixed</em> <strong>$other</strong>)</strong> : <em>[\PHPieces\Collections\Collection](#class-phpiecescollectionscollection)</em> |
| public | <strong>filter(</strong><em>\callable</em> <strong>$callback</strong>)</strong> : <em>[\PHPieces\Collections\Collection](#class-phpiecescollectionscollection)</em><br /><em>Iterates over each value in the <b>array</b> passing them to the <b>callback</b> function. If the <b>callback</b> function returns true, the current value from <b>array</b> is returned into the result array. Array keys are preserved.</em> |
| public | <strong>flip()</strong> : <em>[\PHPieces\Collections\Collection](#class-phpiecescollectionscollection)</em> |
| public | <strong>getIterator()</strong> : <em>\Traversable An instance of an object implementing <b>Iterator</b> or <b>Traversable</b></em><br /><em>Retrieve an external iterator</em> |
| public | <strong>has(</strong><em>mixed</em> <strong>$val</strong>)</strong> : <em>bool</em> |
| public | <strong>intersect(</strong><em>mixed</em> <strong>$other</strong>)</strong> : <em>[\PHPieces\Collections\Collection](#class-phpiecescollectionscollection)</em> |
| public | <strong>keys()</strong> : <em>[\PHPieces\Collections\Collection](#class-phpiecescollectionscollection)</em><br /><em>Return all the keys of the collection</em> |
| public | <strong>map(</strong><em>\callable</em> <strong>$callback</strong>)</strong> : <em>[\PHPieces\Collections\Collection](#class-phpiecescollectionscollection)</em><br /><em>Applies the callback to the elements of the collection callback arguments item: $item</em> |
| public | <strong>offsetExists(</strong><em>mixed</em> <strong>$offset</strong>)</strong> : <em>boolean true on success or false on failure. </p> <p> The return value will be casted to boolean if non-boolean was returned.</em><br /><em>Whether a offset exists</em> |
| public | <strong>offsetGet(</strong><em>mixed</em> <strong>$offset</strong>)</strong> : <em>mixed Can return all value types.</em><br /><em>Offset to retrieve</em> |
| public | <strong>offsetSet(</strong><em>mixed</em> <strong>$offset</strong>, <em>mixed</em> <strong>$value</strong>)</strong> : <em>void</em><br /><em>Offset to set</em> |
| public | <strong>offsetUnset(</strong><em>mixed</em> <strong>$offset</strong>)</strong> : <em>void</em><br /><em>Offset to unset</em> |
| public | <strong>random(</strong><em>\integer</em> <strong>$num=null</strong>)</strong> : <em>\PHPieces\Collections\static</em> |
| public | <strong>reduce(</strong><em>\callable</em> <strong>$callback</strong>, <em>mixed</em> <strong>$initial</strong>)</strong> : <em>mixed</em><br /><em>Iteratively reduce the array to a single value using a callback function</em> |
| public | <strong>reverse()</strong> : <em>[\PHPieces\Collections\Collection](#class-phpiecescollectionscollection)</em> |
| public | <strong>sum()</strong> : <em>float</em><br /><em>get the sum of all items in a collection</em> |
| public | <strong>toArray()</strong> : <em>array</em><br /><em>Convert collection to plain array</em> |
| public | <strong>toJson()</strong> : <em>string</em> |
| public | <strong>unique()</strong> : <em>[\PHPieces\Collections\Collection](#class-phpiecescollectionscollection)</em> |
| public | <strong>values()</strong> : <em>[\PHPieces\Collections\Collection](#class-phpiecescollectionscollection)</em> |

*This class implements \ArrayAccess, \IteratorAggregate, \Traversable*

<hr /> 
### Class: \PHPieces\Collections\Model

> When extender, this class gives you getters and setters on all protected properties and prevents dynamic creation of attributes. Class Model

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em><br /><em>Basic constructor.</em> |
| public | <strong>__get(</strong><em>\string</em> <strong>$name</strong>)</strong> : <em>void</em> |
| public | <strong>__set(</strong><em>\string</em> <strong>$name</strong>, <em>mixed</em> <strong>$value</strong>)</strong> : <em>mixed</em> |

<hr /> 
### Class: \PHPieces\Collections\exceptions\UndefinedPropertyException

| Visibility | Function |
|:-----------|:---------|

*This class extends \Exception*

*This class implements \Throwable*

