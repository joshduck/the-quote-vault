<span class="rating" title="<?=$rating;?> stars">
	<?php
	for($i = 1; $i <= 5; $i++)
	{
		if ($i - 0.25 < $rating)
		{
			echo image_tag('star/full.png');
		}
		else if ($i - 0.75 < $rating)
		{
			echo image_tag('star/half.png');
		}
		else
		{
			echo image_tag('star/none.png');
		}
	}
	?>
</span>