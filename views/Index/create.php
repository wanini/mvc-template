<section>
	<h2>Ajout d'un anime</h2>
	<form action="<?php echo URI . 'index/create'; ?>" method="post" class="inline" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" name="nom" placeholder="Nom" class="form-control">
		</div>
		<div class="form-group">
			<input type="number" name="note" placeholder="Note (/5)" max="5" min="0" class="form-control">
		</div>
		<?php foreach($genres as $genre): ?>
			<div class="form-group checkbox">
				<label><input type="checkbox" name="genres[]" value="<?php echo $genre['id']; ?>"><?php echo $genre['name']; ?></label>
			</div>
		<?php endforeach; ?>
		<div class="form-group">
			<input type="text" name="desc" placeholder="Description" class="form-control">
		</div>
		<div class="form-group">
			<input type="file" name="img" class="form-control">
		</div>
		<button class="btn btn-primary" type="submit">Valider</button>
	</form>
</section>