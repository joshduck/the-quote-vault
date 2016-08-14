
<?php
/*
<?php include_partial('global/box_top'); ?>
	<h2>Search Quotes</h2>
	<?php echo form_tag('search/search', 'method=get'); ?>
	<?php echo label_for('query', 'Search for'); ?>
	<?php echo input_tag('query', $query); ?>
	<?php echo submit_tag('Search'); ?>
<?php include_partial('global/box_bottom'); ?>
*/
?>

<!-- SiteSearch Google -->
<form method="get" action="http://www.google.com/custom" target="_top">
	<input type="hidden" name="forid" value="1"></input>
	<input type="hidden" name="ie" value="UTF-8"></input>
	<input type="hidden" name="oe" value="UTF-8"></input>
	<input type="hidden" name="cof" value="GALT:#3E8039;GL:1;DIV:#e8e8e8;VLC:663399;AH:center;BGC:FFFFFF;LBGC:e8e8e8;ALC:0000FF;LC:0000FF;T:000000;GFNT:0000FF;GIMP:0000FF;FORID:1"></input>
	<input type="hidden" name="hl" value="en"></input>
	<input type="hidden" name="domains" value="thequotevault.com"></input>
	<input type="hidden" name="client" value="pub-6549304712245940"></input>

	<div>
		<label for="sbi" style="float:left;margin:0.5em 0.5em 2em;">Search for a Quote</label>
		<input type="text" name="q" size="60" maxlength="255" value="" id="sbi" class="search"></input>
		<label for="sbb" style="display:none">Submit search form</label>
		<button type="submit" name="sa" id="sbb">Search</button>
	</div>
	<div class="searchType">
		<input type="radio" name="sitesearch" value="thequotevault.com" checked="checked" id="ss1"></input>
		<label for="ss1" title="Search TheQuoteVault.com">TheQuoteVault.com</label>
		<input type="radio" name="sitesearch" value="" id="ss0"></input>
		<label for="ss0" title="Search the Web">Web</label>
	</div>
</form>
<!-- SiteSearch Google -->