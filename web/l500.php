<?php
require_once 'libs/core.inc.php';

if (isset($_GET['a'])) {
	$action = $_GET['a'];
} elseif (isset($_POST['a'])) {
	$action = $_POST['a'];
} else {
	$action = 'default';
}

if (isset($_GET['num']))
{
	$numbers = explode(',', $_GET['num']);
} else {
	$numbers = array();
}


/* Action Handler
* This is where we decide what to do
*/
echo $docHead;
switch ($action) {
	case 'lookupNum':
		foreach ($numbers as $number)
		{
			if (!is_numeric($number)) { break; }
			$query = "SELECT * FROM liber500 WHERE gematriaValue = $number";
			$ret = $mbshdb->query($query);
		
			echo "<table class=\"result\">".
				"<tr><td colspan=\"2\"><h3>$number</h3></td></tr>";
		
			while ( ($row = $ret->fetch_assoc()) ) {
				echo "<tr><td>{$row['gematriaMeaning']}</td><td><span lang=\"il\" class=\"hebrew\">{$row['gematriaSource']}</span></td></tr>";
			}
			echo "</table>\n";
		}
		

		
		break;
	
	default:
		echo "Hello there";
		break;
}
echo $docFoot;
$mbshdb->close();
?>