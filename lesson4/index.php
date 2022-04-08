<?php
$array = [ 1, 2, 3, 4, 5, 0, 0, 0, 0, 0 ];
for ( $i = 0; $i < 10; $i += 2 ) {
    $item = array( $array[ $i ] );
    $start = array_slice( $array, 0, $i + 1 );
    $end = array_slice( $array, $i + 1, count( $array ) - ( $i + 2 ) );

    $array = array_merge( $start, $item, $end );
//    $array = [ ...$start, $item, ... $end ];
}
var_dump( $array );
