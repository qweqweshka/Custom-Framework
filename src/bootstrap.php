<?php

include $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

function debug($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}