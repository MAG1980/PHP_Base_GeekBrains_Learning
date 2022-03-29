<?php

function find($start, $history, $target)
{
    if	($start	== $target)
        echo "{$target} = {$history}<br>";

    elseif ($start > $target)
        return NULL;
    else
        return find($start + 5, "({$history} + 5)", $target)
            || find($start * 3, "({$history} * 3)", $target);
    return NULL;
}


find(1, "1", 48);