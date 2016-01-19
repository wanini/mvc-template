<?php

class AnimesGenres extends Model{

	protected static $table = "ANIMES_GENRES";

	public $id;
	public $animes_id;
	public $genres_id;

}