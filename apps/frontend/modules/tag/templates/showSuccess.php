<ul class="crumbtrail">
	<li><?php echo link_to('Home', 'default/index'); ?></li>
	<li><?php echo link_to('Tags', 'tag/list'); ?></li>
	<li><?php echo ucfirst($tag->getName()); ?></li>
</ul>

<h1>Quotes Tagged &quot;<?php echo $tag->getName() ?>&quot;</h1>
	
<?php include_partial('global/ad', array('size' => '728x90')); ?>

<?php include_partial('item/items', array('pager' => $pager, 'link' => 'tag/show?name=' . $tag->getName())); ?>