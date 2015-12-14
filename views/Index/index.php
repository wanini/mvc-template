<section class="top-animes">
	<h2>TOP ANIMES</h2>
	<?php foreach ($topAnimes as $anime) : ?>
	<article>
		<h3><a href="<?php echo URI . "index/view/" . $anime["ID"]; ?>"><?php echo $anime["title"]; ?></a></h3>
		<p><?php echo $anime["rate"]; ?></p>
		<p><?php echo $anime["tags"]; ?></p>
		<p><?php echo $anime["description"]; ?></p>
	</article>
	<?php endforeach; ?>
</section>
