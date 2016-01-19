<section class="top-animes">
	<div class="row slider">
		<?php foreach($topAnimes as $slide): ?>
			<div><img height="200px" src="<?= URI . 'views/assets/img/' . $slide['img'] ?>"></div>
		<?php endforeach; ?>
	</div>
	<?php foreach ($topAnimes as $anime) : ?>
	<article>
		<div class="pull-right">
			<a class="btn btn-warning btn-xs" href="<?= URI . 'index/update/' . $anime['id'] ?>">Modifier</a>
			<a class="btn btn-danger btn-xs" href="<?= URI . 'index/delete/' . $anime['id'] ?>">Supprimer</a>
		</div>
		<h3><a href="<?php echo URI . "index/view/" . $anime["id"]; ?>"><?php echo $anime["title"]; ?></a></h3>
		<p>Note : <?php echo $anime["rate"]; ?>/5</p>
		<p>Genre : <?php foreach(Animes::genres($anime['id']) as $genre): echo '<span class="label label-info">'.$genre['name'].'</span> '; endforeach; ?></p>
		<p>Description : <?php echo $anime["description"]; ?></p>
	</article>
	<?php endforeach; ?>
</section>
