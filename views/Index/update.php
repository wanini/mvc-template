<section>
	<a class="btn btn-default" href="<?= URI . 'index' ?>">Retour</a>
	<h2>Modification d'un anime</h2>
	<form action="<?php echo URI . 'index/update'; ?>" method="post" class="inline" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" name="title" value="<?= $anime['title'] ?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="number" name="rate" value="<?= $anime['rate'] ?>" class="form-control">
		</div>
		<?php 
			foreach($genres as $genre): 
			$checked = (in_array($genre['id'], $animeGenres)) ? 'checked' : ''; 
		?>
			<div class="form-group checkbox">
				<label><input type="checkbox" name="genres[]" value="<?php echo $genre['id']; ?>" <?= $checked ?>><?php echo $genre['name']; ?></label>
			</div>
		<?php endforeach; ?>
		<div class="form-group">
			<input type="text" name="desc" value="<?= $anime['description'] ?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="file" name="img" placeholder="Image" class="form-control">
		</div>
		<input type="hidden" name="id" value="<?= $anime['id'] ?>">
		<button class="btn btn-primary" type="submit">Valider</button>
	</form>
</section>