<div class="item">
	<p class="text"><?php echo link_to($item->getText(), 'item/show?slug=' . $item->getSlug()) ?></p>
	<?php if($creator = $item->getCreator()): ?>
		<p class="creator"><?php echo link_to($creator->getName(), 'creator/show?slug=' . $creator->getSlug()); ?><?php if ($date = $item->getDate()) echo  ', '. date('Y', strtotime($date)); ?></p>
	<?php endif; ?>
	<dl class="metadata">
		<dt>Rating:</dt>
		<dd>
			<?php if ($rating= $item->getRating()): ?>
				<?php include_partial('item/rating', array('rating' => $item->getRating())); ?> 
				(<?php echo number_format($rating, 1); ?>)
			<?php else: ?>
				Not rated
			<?php endif; ?>
		<dd>
		<dt>Comments:</dt>
		<dd><?php echo $item->getCommentCount();?><dd>
	</dl>
</div>