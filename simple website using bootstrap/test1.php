<?php

fscanf(STDIN, "%d\n", $number);

for ( $i = 1; $i <= $number; $i++) {

if($i % 56 == 0)
{
    echo "LaunchCodeSTL\n";
}
elseif($i % 28 == 0)
{
    echo "LaunchCode\n";
}
elseif($i % 7 == 0)
{
    echo "Code\n";
}
elseif($i % 4 == 0)
{
    echo "Launch\n";
}
else
{
    echo $i."\n";
}
}