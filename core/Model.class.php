<?php

class Model{

	protected $pdo;
	public $table;

	public function __construct(){
		global $CONFIG;
		$this->pdo = new PDO(
			'mysql:host='.$CONFIG["database"]["host"].';dbname='.$CONFIG["database"]["dbname"],
			$CONFIG["database"]["user"],
			$CONFIG["database"]["pass"],
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
		);
	}

	public function find($condition = null){
		if(!empty($condition)){
			$stmt = "SELECT * FROM " . $this->table . " WHERE " . $condition;
		}else{
			$stmt = "SELECT * FROM " . $this->table;
		}
		$request = $this->pdo->query($stmt);
		return $request->fetchAll();
	}

	public function create(){
		$keys = array_keys(get_class_vars(__CLASS__));
		$vars = get_object_vars($this);
		foreach ($keys as $key) {
			unset($vars[$key]);
		}
		foreach ($vars as $key => $value) {
			$vars[":".$key] = $value;
			unset($vars[$key]);
		}
		$request = $this->pdo->prepare("INSERT INTO ANIMES VALUES (:ID, :title, :rate, :tags, :description)");
		try{
			$ret = $request->execute($vars);
		}catch(PDOException $e){
			$ret = $e->getMessage();
		}
		return $ret;
	}

	public function update($ID){
		if(isset($ID)){
			$keys = array_keys(get_class_vars(__CLASS__));
			$vars = get_object_vars($this);
			foreach ($keys as $key) {
				unset($vars[$key]);
			}
			foreach ($vars as $key => $value) {
				if($vars[$key] != NULL){
					$stmt = $key . "='" . $value . "'";
				}
			}
			$request = $this->pdo->prepare("UPDATE ANIMES SET " . $stmt . " WHERE ID = " . $ID);
			try{
				$ret = $request->execute($vars);
			}catch(PDOException $e){
				$ret = $e->getMessage();
			}
		}else{ $ret = "ID missing"; }
		return $ret;
	}

	public function delete($ID){
		if(isset($ID)){
			$request = $this->pdo->prepare("DELETE FROM ANIMES WHERE ID = " . $ID);
			try{
				$ret = $request->execute($vars);
			}catch(PDOException $e){
				$ret = $e->getMessage();
			}
		}else{ $ret = "ID missing"; }
		return $ret;
	}
	
}

?>