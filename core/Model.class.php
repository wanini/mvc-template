<?php

class Model{

	protected static $pdo;
	protected static $table;

	public function __construct(){
		$this->initDb();
	}

	public function initDb(){
		global $CONFIG;
		self::$pdo = new PDO(
			'mysql:host='.$CONFIG["database"]["host"].';dbname='.$CONFIG["database"]["dbname"],
			$CONFIG["database"]["user"],
			$CONFIG["database"]["pass"],
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
		);
	}

	public static function find($condition = null){
		self::initDb();
		if(!empty($condition)){
			$stmt = "SELECT * FROM " . static::$table . " WHERE " . $condition;
		}else{
			$stmt = "SELECT * FROM " . static::$table;
		}
		$request = self::$pdo->query($stmt);
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
		$request = self::$pdo->prepare('INSERT INTO ' . static::$table . ' VALUES (' . implode(',', array_keys($vars)) . ')');
		try{
			$ret = $request->execute($vars);
		}catch(PDOException $e){
			$ret = $e->getMessage();
		}
		if($ret) return self::$pdo->lastInsertId();
		else return false;
	}

	public function update($id){
		if(isset($id)){
			$keys = array_keys(get_class_vars(__CLASS__));
			$vars = get_object_vars($this);
			$stmt = '';
			foreach ($keys as $key) {
				unset($vars[$key]);
			}
			foreach ($vars as $key => $value) {
				if($key != 'id' && $value != ''){
					$stmt .= $key . "='" . addslashes($value) . "',";
				}
			}
			$stmt = substr($stmt, 0, -1);
			$request = self::$pdo->prepare("UPDATE ".static::$table." SET " . $stmt . " WHERE id = " . $id);
			try{
				$ret = $request->execute($vars);
			}catch(PDOException $e){
				$ret = $e->getMessage();
			}
		}else{ $ret = "The id is missing"; }
		return $ret;
	}

	public static function delete($id){
		self::initDb();
		if(isset($id)){
			$ret = self::$pdo->exec('DELETE FROM '.static::$table.' WHERE id = '.$id);
		}else{ $ret = "The id is missing"; }
		return $ret;
	}
	
}

?>