<?php
/*
 2018-08-16
 Author: Jasper(rabbit.white@daum.net)
 FileName: AccountView.php
 Goal: Jasper의 IFRS 시스템 (IFRS system)
 Description:
 1. 2018-08-01 / Japser / IFRS 1 구현
 */

class AccountView extends Account{

    private $taxMoney;
    private $sumMoney;
    private $balanceMoney;
    
    public function getTaxMoney(){
      return $this->taxMoney;
    }
    
    public function getSumMoney(){
      return $this->sumMoney;
    }
    
    public function getBalanceMoney(){
      return $this->balanceMoney;
    }
    
    public function setTaxMoney($taxMoney){
      $this->taxMoney = $taxMoney;
    }
    
    public function setSumMoney($sumMoney){
      $this->sumMoney = $sumMoney;
    }
    
    public function setBalanceMoney($balance){
      $this->balance = $balance;
    }

}
  
 ?>