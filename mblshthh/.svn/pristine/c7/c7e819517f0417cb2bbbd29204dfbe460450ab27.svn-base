<?php

mb_internal_encoding("UTF-8");

$config = array(
		'host' => 'localhost',
		'user' => 'mullhouse',
		'pass' => '#er67bg#',
		'db' => 'mblshthh',
		'charset' => 'utf8'
);

/*
 * CREATE TABLE names ( first_name VARCHAR(50),
                     last_name VARCHAR(50)
                   )
CHARACTER SET utf8 COLLATE utf8_general_ci;
 */

class mbshdb extends mysqli {
	public function __construct($host, $user, $pass, $db) {
		parent::__construct($host, $user, $pass, $db);

		if (mysqli_connect_error()) {
			die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
		}
		parent::set_charset("utf8");
		parent::query("SET NAMES 'utf8'");
		parent::query("SET CHARACTER SET utf8");
	}
}
$mbshdb = new mbshdb($config['host'], $config['user'], $config['pass'], $config['db']);

require_once 'libs/iaddev.php';

require_once 'display.php';
require_once 'libs/gematria.inc.php';
require_once 'libs/qlm.class.php';


?>