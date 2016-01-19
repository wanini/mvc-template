<?php

class Index extends Controller{

	public function __construct(){}

	public function index(){

		$this->loadModel("Animes");
		$animes = Animes::find();

		$view["topAnimes"] = $animes;

		$this->toView($view);
		$this->render("index");

	}

	public function view($id){

		if(!empty($id)){

			$this->loadModel("Animes");
			$anime = Animes::find("id = " . $id);

			$view["anime"] = $anime[0];

			$this->toView($view);
			$this->render("view");

		}

	}

	public function update($id){

		$this->loadModel('Animes');
		$this->loadModel('AnimesGenres');

		if(!empty($_POST)){
			$anime = new Animes();
			$anime->id = $_POST['id'];
			$anime->title = $_POST['title'];
			$anime->rate = intval($_POST['rate']);
			$anime->description = $_POST['desc'];
			if(!empty($_FILES['img']['name'])){
				$anime->img = basename($_FILES['img']['name']);
				if(!move_uploaded_file($_FILES["img"]["tmp_name"], ROOT . 'views/assets/img/' . basename($_FILES['img']['name']))){
					die('erreur lors de l\'upload du fichier');
				}
			}
			$anime->update($_POST['id']);
			$anime->updateGenres($_POST['id'], $_POST['genres']);
			header('Location: ' . URI . 'index');
		}elseif(isset($id)){
			$this->loadModel('Genres');
			$anime = Animes::find("id = " . $id);
			$anime = $anime[0];
			$genres = Genres::find();
			$array = AnimesGenres::find("animes_id = " . $id);
			foreach($array as $value):
				$animeGenres[] = $value['genres_id'];
			endforeach;
			$this->toView(compact('anime', 'genres', 'animeGenres'));
			$this->render('update');
		}else{

		}

	}

	public function create(){

		if(empty($_POST)){
			$this->loadModel("Genres");
			$genres = Genres::find();
			$this->toView(compact('genres'));
			$this->render("create");
		}else{
			$this->loadModel('Animes');
			$this->loadModel('AnimesGenres');
			$anime = new Animes();
			$anime->id = null;
			$anime->title = $_POST['nom'];
			$anime->rate = intval($_POST['note']);
			$anime->description = $_POST['desc'];
			$anime->img = basename($_FILES['img']['name']);
			if(!move_uploaded_file($_FILES["img"]["tmp_name"], ROOT . 'views/assets/img/' . basename($_FILES['img']['name']))){
				die('erreur lors de l\'upload du fichier');
			}
			$anime_id = $anime->create();
			foreach($_POST['genres'] as $genre_id):
				$animeGenre = new AnimesGenres();
				$animeGenre->id = null;
				$animeGenre->animes_id = $anime_id;
				$animeGenre->genres_id = $genre_id;
				$animeGenre->create();
			endforeach;
			header('Location: ' . URI . 'index/');
		}

	}

	public function delete($id){
		if(isset($id)){
			$this->loadModel('Animes');
			Animes::deleteGenres($id);
			$ret = Animes::delete($id);
			header('Location: '.URI.'index/');
		}
	}
	
}

?>