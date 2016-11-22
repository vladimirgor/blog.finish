<?php

class M_Mysql  {
	
	private static $instance;
	private $link;
	
	private function __construct(){
    try {
        $this->link = new PDO('mysql:dbname='. DB_NAME . ';host='. DB_HOST
        	, DB_USER, DB_PASS, 
        	[
        		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        		PDO::ATTR_EMULATE_PREPARES => false
   			]);
   
	    } catch (PDOException $e) {
	        echo "Connection error: " . $e->getMessage();
	        die;
	    }

		// Language setting.
    	setlocale(LC_ALL, 'ru_RU.UTF-8'); // Устанавливаем нужную локаль (для дат, денег, запятых и пр.)
    	mb_internal_encoding('UTF-8'); // Устанавливаем кодировку строк

	}

	public static function GetInstance(){
		if(self::$instance == null)
			self::$instance = new M_Mysql();
		return self::$instance;
	}

	//SELECT * FROM t1 WHERE id > 10
	//SELECT * FROM t1 LEFT JOIN t2 ON t1.id = t2.a_id WHERE t1.id > (SELECT MAX(t2.a_id) FROM t2)
	public function Select($sql){
		try {
			$stmt = $this->link->query($sql);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rows = array();
			while( $row = $stmt->fetch() ) {  
				$rows[] = $row;
    			}
			return $rows;
			}
		catch (PDOException $e){
		    echo "Select error: " . $e -> getMessage();
		    die;
			}
	}
	public function Insert($table, $object){
		$columns = array();
		$values = array();

		foreach ( $object as $key => $value ) {
			$columns[] = $key;

			if( $value == NULL ){
				$values[] = "NULL";
			}else{

				$values[] = "'$value'";
			}
		}

		$columns_s = implode(",", $columns);
		$values_s = implode(",", $values);
		try {

			$stmt = $this->link -> prepare("INSERT INTO $table ($columns_s) VALUES($values_s)");
			$stmt -> execute();
			return $this->link -> lastInsertId();
		}
		catch (PDOException $e){
		    echo "Insert error: " . $e -> getMessage();
		    die;
		}
	}

	//UPDATE t1 SET f1=v1, f2=v2, f3=v3 WHERE sid = 5 AND title <> "";
	public function Update($table,  $object, $where){
		$sets = array();

		foreach ($object as $key => $value) {
			if($value == NULL){
				$sets[] = "$key=NULL";
			}else{

				$sets[] = "$key='$value'";
			}
		}

		$sets_s = implode(",", $sets);
		try {
			$stmt = $this->link -> prepare("UPDATE $table SET $sets_s WHERE $where");
			$stmt -> execute();
			return $stmt -> rowCount();
			}
		catch (PDOException $e){
		    echo "Update error: " . $e -> getMessage();
		    die;
			}
	}

	//DELETE FROM t1 WHERE id = 3
	public function Delete($table, $where){

		try {
			$stmt = $this->link -> prepare("DELETE FROM $table  WHERE $where");
			$stmt -> execute();
			return $stmt -> rowCount();
			}
		catch (PDOException $e){
		    echo "Delete error: " . $e -> getMessage();
		    die;
		}
	}
}