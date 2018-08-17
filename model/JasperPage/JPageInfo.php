<?php
/*
 * Subject: My Homepage
 * FileName: JPageInfo.php
 * Created by 2018-08-16
 * Author: Dodo (rabbit.white at daum dot net)
 * Description:
 *
 */

class JPageInfo{
    
    private $pageName;
    private $subName;
    private $startDate;
    private $endDate;
    private $page;
    private $userName;
    private $language;
    private $type;
    private $baseStartDate;
    private $baseUnit;
    
    public function __construct($pageName = -1, $subName = -1, $startDate = -1, $endDate = -1, $page = -1){
        
        $this->pageName = $pageName;
        $this->subName = $subName;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->page = $page;
        $this->language = -1;
        $this->userName = -1;
        $this->type = -1;
    }
    
    public function __destruct(){
        
    }
    
    public function getPageName(){
        return $this->pageName;
    }
    
    public function getSubName(){
        return $this->subName;
    }
    
    public function getStartDate(){
        return $this->startDate;
    }
    
    public function getEndDate(){
        return $this->endDate;
    }
    
    public function getPage(){
        return $this->page;
    }
    
    public function getLanguage(){
        return $this->language;
    }
    
    public function getUserName(){
        return $this->userName;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getBaseStartDate(){
        return $this->baseStartDate;
    }
    
    public function getBaseUnit(){
        return $this->baseUnit;
    }
    
    public function isEmpty(){
        
        if ( $this->pageName == -1 ||
            $this->subName == -1 ||
            $this->startDate == -1 ||
            $this->endDate == - 1 ||
            $this->page == -1 ){
                return true;
        }
        else if ( $this->pageName == '' ||
            $this->subName == '' || 
            $this->startDate == '' ||
            $this->endDate == '' ||
            $this->page == ''){
                return true;
        }
        else{
            return false;
        }
    }
    
    public function isCountable(){
        
        $count = 0;
        
        if ( $this->pageName != '' ){
            $count++;
        }
        if ( $this->subName != '' ){
            $count++;
        }
        if ( $this->startDate != '' ){
            $count++;
        }
        if ( $this->endDate != '' ){
            $count++;
        }
        if ( $this->userName != '' ){
            $count++;
        }
        if ( $this->type != '' ){
            $count++;
        }
        if ( $this->page != '' ){
            $count++;
        }
        
        return $count;
    }
    
    public function setPageName($pageName){
        $this->pageName = $pageName;
    }
    
    public function setSubName($subName){
        $this->subName = $subName;
    }
    
    public function setStartDate($startDate){
        $this->startDate = $startDate;
    }
    
    public function setEndDate($endDate){
        $this->endDate = $endDate;
    }
    
    public function setUserName($userName){
        $this->userName = $userName;
    }
    
    public function setLanguage($language){
        $this->language = $language;
    }
    
    public function setType($type){
        $this->type = $type;
    }
    
    public function setPage($page){
        $this->page = $page;
    }
    
    public function setBaseStartDate($baseStartDate){
        $this->baseStartDate = $baseStartDate;
    }
    
    public function setBaseUnit($baseUnit){
        $this->baseUnit = $baseUnit;
    }
    
}

?>