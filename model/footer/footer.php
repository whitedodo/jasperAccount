<?php
/*
 * Subject: My Homepage
 * FileName: footer.php
 * Created by 2018-08-16
 * Author: Dodo (rabbit.white at daum dot net)
 * Description:
 *
 */

class Footer{
    
    private $copyright;
    private $priemail;
    private $subEmail;
    private $powered;
    private $openingDate;
    
    public function __construct(){
        
        $this->copyright = NULL;
        $this->priemail = NULL;
        $this->subEmail = NULL;
        $this->powered = NULL;
        $this->openingDate = NULL;
    }
    
    public function __destruct(){
        
    }
    
    public function getCopyright(){
        return $this->copyright;
    }
    
    public function getPriEmail(){
        return $this->priemail;
    }
    
    public function getSubEmail(){
        return $this->subEmail;
    }
    
    public function getPowered(){
        return $this->powered;
    }
    
    public function getOpeningDate(){
        return $this->openingDate;
    }
    
    public function setCopyright($copyright){
        $this->copyright = $copyright;
    }
    
    public function setPriEmail($email){
        $this->priemail = $email;
    }
    
    public function setSubEmail($email){
        $this->subEmail = $email;
    }
    
    public function setPowered($powered){
        $this->powered = $powered;
    }
    
    public function setOpeningDate($openDate){
        $this->openingDate = $openDate;
    }
    
}

?>