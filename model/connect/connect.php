<?php
/*
	2018-08-01
	Author: Jasper(rabbit.white@daum.net)
	FileName: connect.php
	Goal: Jasper의 IFRS 시스템 (IFRS system)
	Description:	
*/

class Connect{
	
	private $host;
	private $user;
	private $pw;
	private $dbName;
	
	public function __construct($host, $user, $pw, $dbName){
		$this->host = $host;
		$this->user = $user;
		$this->pw = $pw;
		$this->dbName = $dbName;
	}
	
	public function getHost(){
		return $this->host;	
	}
	
	public function getUser(){
		return $this->user;	
	}
	
	public function getPw(){
		return $this->pw;
	}
	
	public function getDBName(){
		return $this->dbName;
	}	
	
}
?>