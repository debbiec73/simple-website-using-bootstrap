<?php
getIntegerComplement(50);
function getIntegerComplement( $n) {
    $i = decbin($n);
    for ( $j = 0; $j < strlen($i); $i++) {
    if($j == 0)
    {
    $j = 1;
    }
      else
      {
          $j = 0;
      }
    }
   return bindec($i);
}

