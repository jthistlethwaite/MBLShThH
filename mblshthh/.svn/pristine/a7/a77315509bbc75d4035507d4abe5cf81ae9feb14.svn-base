<?php

$requestCol = array();		// which column(s) are requested
$startRow = $stopRow = 0;

$dir = opendir(".");
$files = array();

//get file names
while ($file = readdir($dir))
{
	if (preg_match('/html$/', $file))
	{
		$files[] = $file;
	}
}
closedir($dir);
sort($files);

// Load files into arrays
$liber777 = array();

foreach ($files as $columnFile)
{
	$column = file($columnFile);
	$liber777[] = $column;
	unset($column);
}

echo "<table border=\"1\">\n";

//get row 1
for ($r = 0; $r < 35; $r++)
{
	$dR = $r - 1;
	if ($dR < 0) {
		$dR = "";
	}
	echo "<tr><td><b>$dR</b></td>";
	
	foreach ($liber777 as $column)
	{
		$content = $column[$r];
		
		if ($r == 0) {
			$content = str_replace('<!-- ', '', $content);
			$content = str_replace('-->', '', $content);
		}
		
		echo "<td>". $content. "</td>";
	}
	
	echo "</tr>\n";
}

echo "</table>";

?>
