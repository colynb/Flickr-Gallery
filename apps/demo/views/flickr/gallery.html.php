<style type="text/css">

	.thumbnail {
		width: 160px;
		float: left;
		margin: 5px;
	}

</style>


<?php

foreach ( $urls as $url ) {

	?><div class="thumbnail shadow">
	<img src="<?= $url ?>" alt="">
	<div class="caption">
		<h5>Thumbnail label</h5>
		<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		<p><a href="#" class="btn primary">Action</a> <a href="#" class="btn">Action</a></p>
	</div>
</div><?php

}

?>
