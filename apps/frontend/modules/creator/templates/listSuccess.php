<ul class="crumbtrail">
	<li><?php echo link_to('Home', 'default/index'); ?></li>
	<li><?php echo link_to('Authors', 'creator/list?letter=A'); ?></li>
	<li><?php echo $letter; ?></li>
</ul>

<h1>Authors Beginning With &quot;<?php echo $letter;?>&quot;</h1>

<?php include_partial('global/box_top'); ?>
	Browse: <?php include_partial('letters', array('letter' => $letter)); ?>
<?php include_partial('global/box_bottom'); ?>

<div class="list">
	<?php foreach ($creators as $creator): ?>
		<?php if (($count = $creator->getItemCount()) > 0): ?>
			<div class="creator">
				<?php if ($image = $creator->getImage()): ?>
					<span class="avatarHolder"><?php echo image_tag('/uploads/images/' . $image->getTinyPath(), array('class' => 'avatar tiny')); ?></span>
				<?php endif; ?>

				<p class="name"><?php echo link_to($creator->getBiographicalName(), 'creator/show?slug='.$creator->getSlug()) ?></p>
				<?php if ($summary = $creator->getSummary()): ?>
					<p><?php echo $summary ?></p>
				<?php endif; ?>
				<ul class="metadata">
					<li><?php echo $count; ?> quotes</li>
				</ul>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
</tbody>
</table>
