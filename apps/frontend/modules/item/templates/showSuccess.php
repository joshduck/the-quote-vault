<?php use_helper('Text'); ?>
<ul class="crumbtrail">
	<li><?php echo link_to('Home', 'default/index'); ?></li>
	<li><?php echo link_to('Authors', 'creator/list?letter=A'); ?></li>
	<?php if($creator = $item->getCreator()): ?>
		<li><?php echo link_to($creator->getName(), 'creator/show?slug=' . $creator->getSlug()); ?></li>
	<?php endif; ?>
	<li><?php echo truncate_text(strip_tags($item->getText()), 20); ?></li>
</ul>

<blockquote class="item">
	<p class="text"><?php echo $item->getText() ?></p>
	<?php if($creator = $item->getCreator()): ?>
		<p class="creator"><?php echo link_to($creator->getName(), 'creator/show?slug=' . $creator->getSlug()); ?><?php if ($date = $item->getDate()) echo  ', '. date('Y', strtotime($date)); ?></p>
	<?php endif; ?>
</blockquote>

<?php include_partial('global/ad', array('size' => '728x90')); ?>

<?php include_partial('global/box_top'); ?>
	<?php use_helper('Javascript'); ?>

	<div class="p">
		<ul class="metadata">
			<dt>Rating:</dt>
			<dd>
				<span class="itemRating">
					<?php include_partial('rating', array('rating' => $item->getRating())); ?> 
					<?php echo form_tag('item/rate?slug=' . $item->getSlug(), array("class" => 'rating')); ?>	
						<?php 
						$options = array(
									1 => "Awful",
									2 => "Bad",
									3 => "OK",
									4 => "Good",
									5 => "Great");

						if_javascript();
							echo input_hidden_tag('rating', 3);
							$output = '';
							foreach ($options as $value => $name)
							{

								$images = image_tag('star/full.png', array('alt' => $name, 'class' => 'full')) . 
										  image_tag('star/none.png', array('alt' => $name, 'class' => 'none'));
								
								$className = 'ratingOption';
								for ($i = 5; $i >= $value; $i--)
								{
									$className .= " rate$i";
								}

								$onMouseOver = "var e=document.getElementById('rating');e.form.className = 'rating rate$value'";
								$onClick = "var e=document.getElementById('rating');e.value=$value;e.form.submit();";

								echo link_to_function($images, $onClick, array('class' => $className, 'onMouseOver' => $onMouseOver, 'title' => sprintf('Click to rate this quote %s', strtolower($name))));
							}
							echo $output;
						end_if_javascript();
						?>
						<noscript>
							<?php
							echo select_tag('rating', options_for_select($options), 3);
							echo submit_tag('Rate It!');
							?>
						</noscript>
					</form>
				</span>

				<?php 
					echo '(' . number_format($item->getRating(), 1);
					if ($rating) echo ', Your Rating: ' . $rating->getRating();
					echo ')'
				?>
			</dd>
			<dt></dt>
			<dd>
				<?php 
					$image = image_tag('bookmark.png', array('alt' => 'Bookmark'));
					echo link_to_function($image . ' Bookmark this quote', 'bookmarkPage()');
				?>
			</dd>
			<dd>
				<?php 
					$image = image_tag('author.png', array('alt' => 'Bookmark'));
					echo link_to($image . sprintf(' More %s quotes ', $creator->getName()), 'creator/show?slug=' . $creator->getSlug());
				?>
			</dd>
	</div>

	<?php if ($tags = $item->getTags()): ?>
		<hr />
		<p class="tags">
			<strong>Tags: </strong>
			<?php $count = count($tags); ?>
			<?php foreach ($tags as $tag): ?>
				<?php echo link_to($tag->getName(), 'tag/show?name=' . urlencode($tag->getName())); ?><?php if (--$count > 0): ?>, <?php endif;?>
			<?php endforeach; ?>
		</p>
	<?php endif; ?>
<?php include_partial('global/box_bottom'); ?>
<br />

<?php if ($pager->getNbResults()): ?>
	<h2>Comments for this Quote</h2>
	<?php use_helper('PagerNavigation'); ?>
	<?php use_helper('Date'); ?>
	<?php echo pager_navigation($pager, 'item/show?slug=' . $item->getSlug()); ?>
	<div class="list">
		<?php foreach ($pager->getResults() as $comment): ?>
				<div class="comment">
					<p class="user"><?php echo htmlspecialchars($comment->getUserName()); ?></p>
					<ul class="metadata">
						<li>Posted <?php echo time_ago_in_words(strtotime($comment->getCreatedAt())); ?> ago.<li>
						<?php /* <li><?php echo link_to('Report', 'comment/report?id=' . $comment->getId()); ?></li> */ ?>
						<?php if ($comment->canUserEdit()): ?>
							<li><?php echo link_to('Delete', 'comment/delete?id=' . $comment->getId()); ?></li>
							<li><?php echo link_to('Edit', 'comment/edit?id=' . $comment->getId()); ?></li>
						<?php endif; ?>				
					</ul>			
					<p><?php echo htmlspecialchars($comment->getText()); ?></p>
				</div>
		<?php endforeach ?>
	</div>
<?php endif; ?>

<?php include_partial('global/box_top'); ?>
	<h2>Add Comment</h2>
	<?php echo form_tag('comment/update', array('class' => 'comment')); ?>
		<?php echo input_tag('item_slug', $item->getSlug(), 'type=hidden'); ?>
		<p class="name">
			<label for="user_name">Name (required)<label><br />
			<?php echo input_tag('user_name'); ?>
		</p>

		<p class="email">
			<label for="email" class="email">Email (required)<label><br />
			<?php echo input_tag('email', '', array('class' => 'email')); ?>
		</p>

		<p>
			<label for="text">Your Comment (required)</label><br />
			<?php echo textarea_tag('text'); ?>
		</p>
		<?php echo submit_tag('Add Comment'); ?>
	</form>
<?php include_partial('global/box_bottom'); ?>
