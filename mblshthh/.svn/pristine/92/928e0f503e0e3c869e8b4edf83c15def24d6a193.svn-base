<?php

$startRow = $stopRow = 1;
$colFilter = false;
$colHeaders = false;
$maxRow = 35;				// number of highest row
$maxColumns = 100;			// maximum number of columns to lookup

//START: get row range
if (isset($_REQUEST['startRow']))
{
	if (is_numeric($_REQUEST['startRow'])) {
		$startRow = $_REQUEST['startRow'];
	}
	$startRow++;
}

if (isset($_REQUEST['stopRow']))
{
	if (is_numeric($_REQUEST['stopRow'])) {
		$stopRow = $_REQUEST['stopRow'];
	}
}

if ($stopRow == 1) { $stopRow = $maxRow; }

if ($startRow > $stopRow) {
	$tstartRow = $startRow;
	$tstopRow = $stopRow;
	$startRow = $tstopRow;
	$stopRow = $tstartRow;
	unset($tstopRow, $tstartRow);
}

if ($startRow < 1)
{
	$startRow = 1;
}

if ($stopRow == $startRow) {
	$stopRow++;
}
//END: get row range


//START: get column constraints
if (isset($_REQUEST['columns']))
{
	$tcolList = explode(',', $_REQUEST['columns']);
	$colList = array();
	
	foreach ($tcolList as $tcol) {
		if (is_numeric($tcol)) {
			$colList[] = (int) $tcol;
		}
	}
	unset($tcolList, $tcol);

	if (count($colList) > 0) {
		$colFilter = true;		
	}
	
}
//STOP: get column constraints

if (isset($_REQUEST['colHeaders']))
{
	if ($_REQUEST['colHeaders'] == '1')
	{
		$colHeaders = true;
	}
}

function loadFromFiles()
{
	$dir = opendir(".");
	$files = array();
	
	//get file names
	while ($file = readdir($dir))
	{
		if (preg_match('/^c..\.html$/', $file))
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
		// get column number
		$colNum = (int) str_replace( array('.html', 'c'), '', $columnFile );
		
		$column = file($columnFile);
		$liber777[$colNum] = $column;
		unset($column);
	}
	return $liber777;
}

$liber777 = loadFromFiles();
$resultArray = array();

for ($r = $startRow; $r < $stopRow; $r++)
{
	foreach ($liber777 as $columnNum => $column)
	{
		if ( (!$colFilter || in_array($columnNum, $colList)) && isset($column[$r]))
		{	 
			$content = $column[$r];
			if ($r == 0) {
				$content = str_replace('<!-- ', '', $content);
				$content = str_replace('-->', '', $content);
				$content = "<h3>$columnNum</h3> $content";
			}
			$resultArray['columns'][$columnNum][$r - 1] = $content;
			$resultArray['rows'][$r - 1][$columnNum] = $content;
		}
	}
}

echo "<table border=\"1\">\n";
if ($colHeaders)
{
	foreach (array_keys($resultArray['columns']) as $colNum)
	{
		echo "<td><h3>$colNum</h3></td>";
	}
}

foreach ($resultArray['rows'] as $rowNum => $rowData) {
	echo "<tr><td>$rowNum</td>";
	
	foreach ($rowData as $cellData) {
		echo "<td>$cellData</td>";
	}
	echo "</tr>\n";
}
echo "</table>";


?>
