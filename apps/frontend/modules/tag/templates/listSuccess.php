<ul class="crumbtrail">
	<li><?php echo link_to('Home', 'default/index'); ?></li>
	<li>Tags</li>
</ul>

<h1>Popular Tags</h1>

<p>Tags are a method of categorizing quotes. The larger a tag is the more popular it is. Click on a tag name to see quotes which use that tag.</p>

<?php include_partial('tag/tags', array('tags' => $tags)); ?>