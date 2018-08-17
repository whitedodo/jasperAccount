<?php
/*
	2018-08-01	
	Author: Jasper(rabbit.white@daum.net)
	FileName: Account.php
	Goal: Jasper의 IFRS 시스템 (IFRS system)
	Description:	
	1. 2018-08-01 / Japser / IFRS 1 구현
*/

// Account
class Account{
    private $id;
    private $type;
    private $category;
    private $accountName;
    private $accountNo;
    private $subject;
    private $price;
    private $taxRate;
    private $count;
    private $regidate;
    private $ip;
    
    public function getID(){
      return $this->id;
    }
    
    public function getType(){
      return $this->type;
    }
    
    public function getCategory(){
      return $this->category;
    }
    
    public function getAccountName(){
      return $this->accountName;
    }
    
    public function getAccountNo(){
      return $this->accountNo;
    }
    
    public function getSubject(){
      return $this->subject;
    }
    
    public function getPrice(){
      return $this->price;
    }
    
    public function getTaxRate(){
      return $this->taxRate;
    }
    
    public function getCount(){
      return $this->count;
    }
    
    public function getRegidate(){
      return $this->regidate;
    }
    
    public function getIP(){
      return $this->ip;
    }
    
    public function setID($id){
      $this->id = $id;
    }
    
    public function setType($type){
      $this->type = $type;
    }
    
    public function setCategory($category){
      $this->category = $category;
    }
    
    public function setAccountName($accountName){
      $this->accountName = $accountName;
    }
    
    public function setAccountNo($accountNo){
      $this->accountNo = $accountNo;
    }
    
    public function setSubject($subject){
      $this->subject = $subject;
    }
    
    public function setPrice($price){
      $this->price = $price;
    }
    
    public function setTaxRate($taxRate){
      $this->taxRate = $taxRate;
    }
    
    public function setCount($count){
      $this->count = $count;
    }
    
    public function setRegidate($regidate){
      $this->regidate = $regidate;
    }
    
    public function setIP($ip){
      $this->ip = $ip;
    }

}
  
?>