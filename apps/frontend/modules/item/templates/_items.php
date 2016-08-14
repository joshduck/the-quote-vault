<?php use_helper('PagerNavigation'); ?>

<?php $navigation =  pager_navigation($pager, $link); ?>
<?php if ($navigation): ?>
	<?php include_partial('global/box_top'); ?>
		Pages: <?php echo $navigation; ?>
	<?php include_partial('global/box_bottom'); ?>
<?php endif; ?>

<div class="list">
	<?php foreach ($pager->getResults() as $item): ?>
	  <?php include_partial('item/item', array('item' => $item)); ?>
	<?php endforeach ?>
</div>

<?php if ($navigation): ?>
	<?php include_partial('global/box_top'); ?>
		Pages: <?php echo $navigation; ?>
	<?php include_partial('global/box_bottom'); ?>
<?php endif; ?>
