<?php

function readGuestBook($fileName)
{
    $res = fopen($fileName, 'r');
    $resultArray = [];

    while (false !== $str = fgets($res)) {
        $resultArray[] = trim($str);
    }

    fclose($res);

    return $resultArray;
}