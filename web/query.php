<?php
require_once 'libs/core.inc.php';

$gematria = new gematriaDB();

echo var_dump($gematria);

echo print_r($gematria->fetchNum(5), 1);

echo var_dump($gematria);

?>