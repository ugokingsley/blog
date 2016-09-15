<?php
class Database{
	public $host=DB_HOST;
	public $username=DB_USER;
	public $password=DB_PASS;
	public $db_name=DB_NAME;
	
	public $link;
	public $error;
	/**
		class constructor
	*/
	public function __construct(){
		 
		//call connect function
		$this->connect();
	}
	
	/**
		connector
	*/
	private function connect(){
		$this->link=new mysqli($this->host,$this->username,$this->password,$this->db_name);
		if(!$this->link){
			$this->error="connection failed: ".$this->link->connect_eeror;
			return false;
		}
		
	}
	 //select
	 public function select($query){
		$result=$this->link->query($query) or die ($this->link->error.__LINE__.);
		if ($result->num_rows > 0){
			return $rsult;
			}else{
			return false;
		}
	 }
	 
	 //insert
	 public function insert($query){
		$insert_row=$this->link->query($query) or die ($this->link->error.__LINE__.);
		
		//validate insert
		if($insert_row){
			header("location:index.php?message= ".urldecode('Record Added'));
			}else{
			die("Error:('.$this->link->errno.')".$this->link->error);
		}
	 }
	 
	 
	 //update
	 public function update($query){
		$update_row=$this->link->query($query) or die ($this->link->error.__LINE__.);
		
		//validate delete
		if($update_row){
			header("location:index.php?message= ".urldecode('Record updated'));
			}else{
			die("Error:('.$this->link->errno.')".$this->link->error);
		}
	 }
	 
	 
	 
	 //delete
	 public function delete($query){
		$insert_row=$this->link->query($query) or die ($this->link->error.__LINE__.);
		
		//validate delete
		if($delete_row){
			header("location:index.php?message= ".urldecode('Record Delete'));
			}else{
			die("Error:('.$this->link->errno.')".$this->link->error);
		}
	 }
	 
	 
	
}

$db=new Database;


?>