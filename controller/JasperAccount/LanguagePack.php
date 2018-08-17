<?php

/*
 2018-08-17
 Author: Jasper(rabbit.white@daum.net)
 FileName: LanguagePack.php
 Goal: Jasper의 IFRS 시스템 (IFRS system)
 Description:
 1. 2018-08-17 / Jasper / 다국어 언어팩(Multi LanguagePack)
 2. 2018-08-17 / Jasper / 한글어(Hangul) 추가
 */

class Language{
    
    private $usrLang;
    private $msg;
    
    public function __construct( $usrLang ){
        
        $this->usrLang = $usrLang;
        
        if ( strcmp ( $usrLang , 'ko-kr' ) == 0 ){
            $langPack = new Lang_Kokr();
            $this->msg = $langPack->getMsg();
        }
        
        if ( strcmp ( $usrLang , 'english') == 0 ){
            $langPack = new Lang_English();
            $this->msg = $langPack->getMsg();
        }
        
    }
    
    public function __destruct(){
        
    }
    
    private function getMsg(){
        return $this->msg;
    }
    
    public function getLanguage(){
        return $this->usrLang;
    }
    
    public function getMessage($firstCategory, $secondCategory = null, $description){
        
        $msg = $this->getMsg();
        $language = $this->getLanguage();
        
        if ( $secondCategory == null){
            return $msg[$language][$firstCategory][$description];
        }
        
        if ( $secondCategory != null ){
            return $msg[$language][$firstCategory][$secondCategory][$description];
        }
        
        
        return '';
        
    }
    
}

?>