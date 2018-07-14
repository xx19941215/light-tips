<?php

function maxDepth()
{
    static $i;

    echo ++$i . PHP_EOL;

    maxDepth();
}

maxDepth();