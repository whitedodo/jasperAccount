<?php
/*
 * Subject: My Homepage
 * FileName: function.php
 * Created by 2018-08-16
 * Author: Dodo (rabbit.white at daum dot net)
 * Description:
 * 1. 2018-08-03 / Jasper / IPv4, IPv6 감지 구현
 * 2. 2018-08-03 / Jasper / UTF-8 한글 지원 추가
*/


class JasperFunction{
    
    // 실제 경로 가져오기
    public function getDirectories($rootDir, $userDir){
        
        $strDir = $_SERVER["SCRIPT_FILENAME"];
        $strDir = str_replace($strDir, "index.php", "");
        
        if ($strDir == ''){
            $strDir = $rootDir;
        }
        
        if ( $userDir != '' )
        {
            // ~ 포함 여부
            if ( strpos( $userDir, '~') !== false ){
                return $strDir;
            }else{
                return $strDir. "/" . $userDir;
            }
            
        }else{
            return $strDir;
        }
    }
    
    // 글 쓰기 기능
    // writePost, crud_back
    public function getUrl($homeDir, $boardName, $userName = null, $language = null, $startDate = null, $endDate = null, $type){
        
        // WritePost 기능
        if ( strcmp($type, 'writePost') == 0 ){
            
            if ( strpos($homeDir, '/') !== false ){
                return "/$homeDir/index.php?pageName=book&subName=$boardName&type=crud";
            }else{
                return "/$homeDir/book/crud/$boardName";
            }
        }
        else if ( strcmp($type, 'crud_back') == 0 ){
            
            if ( strpos($homeDir, '/') !== false ){
                return "/$homeDir/index.php?pageName=book&subName=$boardName&userName=$userName&startdate=$startDate&enddate=$endDate&language=$language";
            }else{
                return "/$homeDir/book/$boardName/$userName/$startDate/$endDate/$language";
            }
        }
        else if ( strcmp($type, 'paging') == 0 ){
            
            if ( strpos($homeDir, '/') !== false ){
                return "/$homeDir/index.php?pageName=book&subName=$boardName&userName=$userName&startdate=$startDate&enddate=$endDate&language=$language";
            }else{
                return "/$homeDir/book/$boardName/$userName/$startDate/$endDate/$language";
            }
        }
        
    }

    public function getRealIpAddr(){     
        if(!empty($_SERVER['HTTP_CLIENT_IP']) && getenv('HTTP_CLIENT_IP')){     
            return $_SERVER['HTTP_CLIENT_IP'];     
        }    
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']) && getenv('HTTP_X_FORWARDED_FOR')){     
            return $_SERVER['HTTP_X_FORWARDED_FOR'];     
        }    
        elseif(!empty($_SERVER['REMOTE_HOST']) && getenv('REMOTE_HOST')){     
            return $_SERVER['REMOTE_HOST'];     
        }    
        elseif(!empty($_SERVER['REMOTE_ADDR']) && getenv('REMOTE_ADDR')){     
            return $_SERVER['REMOTE_ADDR'];     
        }     
        return false;     
    } 
    
    // ipv6 체크 함수 
    public function is_ipv6() { 
        $ip = getRealIpAddr(); 
        if (!preg_match("/^([0-9a-f\.\/:]+)$/",strtolower($ip))) { 
            return false; 
        } 
        
        if (substr_count($ip,":") < 2) { 
            return false; 
        } 
        
        $part = preg_split("/[:\/]/", $ip); 
        foreach ($part as $i) { 
            if (strlen($i) > 4) { 
                return false; 
            } 
        } 
        
        return true; 
    } 
    
    // 한글 지원
    public function convertToUTF8($strTxt)
    {
        if(iconv("utf-8", "utf-8", $strTxt) == $strTxt){
          return $strTxt;
        }
        else
        {
          return iconv("euc-kr", "utf-8", $strTxt );
        }
    }
    
    // 페이지 번호
    public function getPageID( $id ){
    
        $page_id = 0;
        
        if ( $id != 0 )
        	$page_id = $id;
        else
          $page_id = 1;
          
        return $page_id;
    }
    
    // 수행시간 측정
    public function getExecutionTime() {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

}

?>