
<p class="welcome">
<?php
printf("The Quote Vault is one of the largest and most comprehensive collections of quotes anywhere on the web. " .
	   "Browse through our selection of %s and %s. " .
	   "If you are not sure what you are looking for then why not jump to a %s and expand your knowledge.",

		link_to(sprintf("%s authors", number_format($creatorCount)), 'creator/list?letter=A'),
		link_to(sprintf("%s quotes", number_format($itemCount)), 'creator/list?letter=A'),
		link_to('random quote', 'item/random'));
?>
</p>

<div class="launchpad">
	<?php include_partial('search/box'); ?>
</div>

<table class="popular">
	<tr>
		<td class="creators">
			<?php include_partial('global/box_top'); ?>
				<h2>Popular Authors</h2>
				
				<table>
				<?php $i = 0; ?>
				<?php foreach($creators as $creator): ?>
					<?php if ($i++ % 2 == 0): ?><tr><?php endif; ?>
						<td>
							<?php if ($image = $creator->getImage())
							{
								$image = image_tag('/uploads/images/' . $image->getTinyPath(), array('alt' => $creator->getName()));
								$link = 'creator/show?slug=' . $creator->getSlug();
								echo link_to($image, $link, 'class="avatarHolder avatar"');
							}
						?>
						</td>
						<td>
							<?php echo link_to($creator->getName(), 'creator/show?slug=' . $creator->getSlug()); ?>
						</td>
					<?php if ($i % 2 == 0): ?></tr><?php endif; ?>
				<?php endforeach; ?>
				</table>

				<p class="more"><?php echo link_to('Browse All Authors...', 'creator/list?letter=A'); ?></p>
			<?php include_partial('global/box_bottom'); ?>
		</td>
		<td class="tags">
			<?php include_partial('global/box_top'); ?>
				<h2>Popular Tags</h2>
				<p class="links"><?php include_partial('tag/tags', array('tags' => $tags, 'maxSize' => '160', 'minSize' => '90')); ?></p>
				<p class="more"><?php echo link_to('Browse All Tags...', 'tag/list'); ?></p>
			<?php include_partial('global/box_bottom'); ?>
		</td>
	</tr>
</table>