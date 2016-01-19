<section class="top-animes">
		<a class="btn btn-default" href="<?= URI . 'index' ?>">Retour</a>
		<article>
			<h2><?php echo $anime["title"]; ?></h2>
			<p><?php echo $anime["rate"]; ?></p>
			<p><?php echo $anime["description"]; ?></p>
			<img width="50%" src="<?= URI . 'views/assets/img/' . $anime['img'] ?>">
		</article>
</section>
