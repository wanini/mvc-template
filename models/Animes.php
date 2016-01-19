<?php

class Animes extends Model{

	protected static $table = "ANIMES";

	public $id;
	public $title;
	public $rate;
	public $description;
	public $img;

	public static function genres($id){
		$array = array();
		$query = "
			SELECT genres_id
			FROM ANIMES_GENRES
			WHERE animes_id = ".$id;
		$req = self::$pdo->query($query);
		$ret = $req->fetchAll();
		foreach ($ret as $key => $value) {
			$array[] = $value["genres_id"];
		}
		$query2 = '
			SELECT *
			FROM GENRES
			WHERE id IN (' . implode(',', array_map('intval', $array)) . ')
		';
		$req2 = self::$pdo->query($query2);
		$ret2 = $req2->fetchAll();
		return $ret2;
	}

	public static function deleteGenres($anime_id){
		self::initDb();
		self::$pdo->exec('DELETE FROM ANIMES_GENRES WHERE animes_id = '.$anime_id);
	}

	public function updateGenres($anime_id, $genres_id){
		self::deleteGenres($anime_id);
		foreach($genres_id as $genre):
			$query = '
				INSERT INTO ANIMES_GENRES
				VALUES (NULL, '.$anime_id.', '.$genre.');
			';
			$ret = self::$pdo->exec($query);
		endforeach;
	}

}