<?php
if (!isset($maxSize)) $maxSize = 150;
if (!isset($minSize)) $minSize = 70;
if (!isset($limit))   $limit = count($tags);

$i = 0;
$links = array();
foreach ($tags as $tag)
{
	$size = floor($maxSize - ($i++ / $limit) * ($maxSize - $minSize));
	$links[$tag->getName()] = "<span style=\"font-size:{$size}%\">" . link_to($tag->getName(), 'tag/show?name='.$tag->getName()) . '</span>';
	if ($i > $limit) break;
}
ksort($links);

echo implode(', ', $links);
?>