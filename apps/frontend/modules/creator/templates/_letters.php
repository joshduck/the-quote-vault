<?php 
$letters = array();
if (!isset($letter)) $letter = null;
for ($start = ord('A'), $end = ord('Z'), $asc = $start; $asc <= $end; $asc++)
{
	$chr = chr($asc);
	echo link_to_unless($letter == $chr, $chr, 'creator/list?letter=' . $chr);
	echo ' ';
}