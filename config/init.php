<?php
/*
Author : Shakib Ahmed
E-mail : shakibwap@yahoo.com
WEB: https://shakib.eu.org
*/
error_reporting(E_ALL);
ini_set('display_errors', 0);

include_once('./controller/controller.php');

if (!defined('SHAKIB')) {
    die('THIS PAGE IS DEAD...!');
}

function convert_de($result)
{
    $result = str_replace('-', ' ', $result);
    $result = ucwords(strtolower($result)); // Uppercase first letter of each word and lowercase the rest
    return $result;
}
