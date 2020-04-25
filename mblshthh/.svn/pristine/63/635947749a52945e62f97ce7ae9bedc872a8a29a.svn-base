<?php
require_once 'libs/core.inc.php';

$colPath = 'dat/777/';
$rowS = $rowE = 0;
$colOutput = '';

$config['lineNumbers'] = true;
$config['drawTable'] = false;

if (isset($_GET['c']) && is_numeric($_GET['c']))
{
    $colNum = basename($_GET['c']);
}
else 
{
    exit;
}

if (isset($_GET['rowS']) && is_numeric($_GET['rowS']))
{
    $rowS = $_GET['rowS'] + 1;
}

if (isset($_GET['rowE']) && is_numeric($_GET['rowE']))
{
    $rowE = $_GET['rowE'] + 1;
}

if ($rowS > 35) { $rowS = 35; }
if ($rowE > 35) { $rowE = 35; }


echo $docHead. "\n";

if (is_readable($colPath. 'c'. $colNum. '.html'))
{
    $column = file($colPath. 'c'. $colNum. '.html');
    if ( $rowS == 0 ) {
        foreach ($column as $row)
        {
            $colOutput .= $row. "<br />";
        }
    }
    elseif ( $rowS > 0 && $rowE <= $rowS  )
    {
        $colOutput = $column[$rowS];
    }
    elseif ( $rowS > 0 && $rowE > $rowS )
    {
        for ($i = $rowS; $i < ($rowE + 1); $i++)
        {
            $colOutput .= $column[$i];
        }
    }
    else {
        $colOutput = "Well shit.";
    }
}
else
{
    exit;
}

echo $colOutput. "\n\n";
echo $docFoot;

?>