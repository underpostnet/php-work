<?php

$str = "  123.456.789-9   TEST (TEST)";

$str = explode(' ', trim($str))[0];

$str = str_replace(array(".","-"), "", $str);

echo $str;

?>
