#!/usr/bin/env php
<?php

$config = array(
  'host' => 'localhost',
  'user' => 'mullhouse',
  'pass' => '#khuipgug;g7ifg',
  'db' => 'mblshthh',
  'charset' => 'utf8'
);

if (!isset($argv[1])) {
  die("Please specify an input file.\n");
}

if (!is_file($argv[1])) {
  die("Cannot open '". $argv[1]. "'\n");
}


/*
Make database connection
*/

$db = new mysqli($config['host'], $config['user'], $config['pass'], $config['db']);
$db->set_charset($config['charset']);

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}


$csv = fopen($argv[1], "r");

while ( ($line = fgetcsv($csv, 1024, ",")) !== FALSE)
{
  $line[2] = str_replace("  ", " ", $line[2]);

  $query = "INSERT INTO liber500 SET gematriaValue = '${line[0]}', gematriaMeaning = '${line[1]}', gematriaSource = '${line[2]}'";
  
  $db->query($query);

}

fclose($csv);


echo 'Success... ' . $db->host_info . "\n";

$db->close();

exit;



?>
