<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_http_metas() ?>
	<?php include_metas() ?>
	<?php include_title() ?>
	<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
<div id="page">
	<?php echo link_to(image_tag('logo.png', array('alt' => 'The Quote Vault')), 'default/index'); ?>
	<div id="navigation">
		<ul>
			<li><?php echo link_to('Home', 'default/index'); ?> &bull;</li>
			<li><?php echo link_to('Tags', 'tag/list'); ?> &bull;</li>
			<li><?php echo link_to('Authors', 'creator/list?letter=A'); ?> &bull;</li>
			<li><?php echo link_to('Search', 'search/index'); ?> &bull;</li>
			<li><?php echo link_to('Random Quote!', 'item/random'); ?></li>
		</ul>
	</div>
	<div id="content">
		<?php echo $sf_data->getRaw('sf_content') ?>

		<div id="footer">
			&copy; TheQuoteVault.com 2007 - <?php echo date('2008'); ?>
			<?php echo link_to('Terms and Conditions', 'default/terms'); ?>
		</div>
	
	</div>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-3407586-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>

</body>
</html>
