<ul class="crumbtrail">
	<li><?php echo link_to('Home', 'default/index'); ?></li>
	<li><?php echo link_to('Authors', 'creator/list?letter=A'); ?></li>
	<li><?php echo $creator->getName(); ?></li>
</ul>

<?php
$tags = $creator->getTags(10);
$biography = $creator->getBiography();
$image = $creator->getImage();

if ($tags || $biography)
{
?>
	<h1><?php echo $creator->getName(); ?></h1>
	<?php if ($biography): ?>
		<p><a href="#quotes"><?php echo image_tag('down.png', array('alt' => "Down", 'class' => 'icon')); ?> Skip straight to the quotes.</a></p>
	<?php endif; ?>

	<?php if ($image && !$biography): ?>
			<?php echo image_tag('/uploads/images/' . $image->getMediumPath(), array('class' => 'avatar bioAvatar')); ?>
	<?php endif; ?>

	<?php if ($tags): ?>
		<?php include_partial('global/box_top'); ?>
			<h2>Popular tags for <?php echo $creator->getName(); ?></h2>
			<p><?php include_partial('tag/tags', array('tags' => $tags, 'maxSize' => '140', 'minSize' => '90')); ?></p>
		<?php include_partial('global/box_bottom'); ?>
	<?php endif; ?>

	<?php if ($biography): ?>
		<h2>Biography</h2>
		<?php if ($image): ?>
			<?php echo image_tag('/uploads/images/' . $image->getMediumPath(), array('class' => 'bioAvatarInline avatar')); ?>
		<?php endif; ?>
		<?php echo $biography;?>
	<?php endif; ?>
<?php 
}
?>

<?php include_partial('global/ad', array('size' => '728x90')); ?>

<h1><a name="quotes"></a>Quotes by <?php echo $creator->getName(); ?></h1>
<?php include_partial('item/items', array('pager' => $pager, 'link' => 'creator/show?slug=' . $creator->getSlug())); ?>