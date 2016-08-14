<?php
if (!isset($size)) $size = '728x90';
list($width, $height) = explode('x', $size);
//https://www.google.com/adsense/static/en_US/AdFormats.html
?>
<div class="a <?php echo $size;?>" style="<?php echo "width{$width}px;";?>">
	<script type="text/javascript"><!--
	google_ad_client = "pub-6549304712245940";
	google_ad_slot = "1230351700";
	google_ad_width = <?php echo $width;?>;
	google_ad_height = <?php echo $height;?>;
	//--></script>
	<script type="text/javascript"
	src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
</div>