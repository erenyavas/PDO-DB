<?php 

class Database{

	public function __construct($servername="localhost",$dbname="foto",$usr="root",$pass=""){

		$this->dbname=$dbname;
		$this->servername=$servername;
		$this->usr=$usr;
		$this->pass=$pass;
		$db = "";
		$this->db = $db;
		try {
			$this->db = new PDO("mysql:host=$this->servername;dbname=$this->dbname", "$this->usr", "$this->pass");
		} catch ( PDOException $e ){
			print $e->getMessage();
		}
	}

	public function getData($tablename,$where,$id,$parameter)
	{

		$this->tablename = $tablename;
		$this->where = $where;
		$this->id = $id;
		$this->parameter = $parameter;

		$query = $this->db->query("SELECT * FROM $this->tablename WHERE $this->where = '{$this->id}'")->fetch(PDO::FETCH_ASSOC);
		if ( $query ){
			return ($query["$this->parameter"]);
		}
	}

	public function listData($tablename)
	{
		$a = array();
		$query = $this->db->query("SELECT * FROM $tablename", PDO::FETCH_ASSOC);
		$throughput = $query->fetchAll(PDO::FETCH_ASSOC);
		return $throughput;
	}


	

	public function insertData($tablename,$array)
	{
		$keys ="" ;
		$a = [];
		foreach($array as $rkey => $deger)
		{
			$keys = $keys . "$rkey=?,";
			array_push($a,$deger);
		}
		$keys = rtrim($keys, ",");
		$query = $this->db->prepare("INSERT INTO $tablename SET $keys ");
		$insert = $query->execute(($a));
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}




	public function delete($tablename,$where,$wherevalue)
	{
		$query = $this->db->prepare("DELETE FROM $tablename WHERE $where = $wherevalue");
		$delete = $query->execute();
		if($delete){
			return true;
		}
		else{
			return false;
		}
	}





	public function update($tablename,$array,$where,$wherevalue)
	{
		$keys ="" ;
		$a = [];
		foreach($array as $rkey => $deger)
		{
			$keys = $keys . "$rkey=?,";
			array_push($a,$deger);
		}
		$keys = rtrim($keys, ",");
		$query = $this->db->prepare("UPDATE $tablename SET $keys WHERE $where = $wherevalue");
		$insert = $query->execute(($a));
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}


	




}




