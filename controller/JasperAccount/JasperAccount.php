<?php 

/*
 2018-08-01
 Author: Jasper(rabbit.white@daum.net)
 FileName: JasperAccount.php
 Goal: Jasper의 IFRS 시스템 (IFRS system)
 Description:
 1. 2018-08-01 / Japser / IFRS 구현
 2. 2018-08-02 / Japser / 다수 복합 기능 구현(뼈대 만들기)
 3. 2018-08-02 / Japser / reporting, write, modify 등 구현
 4. 2018-08-16 / Jasper / 다국어 지원
 */

/*
  Class: Core - JasperAccount
  Author: Dodo
  Description: Algorithm with Board.  
	1. Dodo / 2018-08-02 / (회계 시스템 구현)
  
*/
class JasperAccount extends IJasperAccount{
  
    private $conn;
    private $paging;
    private $pageInfo;
    private $homeDir;
    private $language;
    private $baseStartDate;
    
    // 생성자
    public function __construct( $homeDir, $language ){
    	$this->conn = new Connect('localhost', 'dodo', '1234', 'dodo');
    	$this->paging = new Paging($this->conn, $homeDir, $language);
    	$this->homeDir = $homeDir;
    	$this->language = $language;
    	$this->baseStartDate = "";
    }
    
    // 소멸자
    public function __destruct(){
    
    }
    
    // 홈 경로 출력
    private function getHomeDir(){
        return $this->homeDir;
    }
    
    // 언어 출력
    private function getLanguage(){
        return $this->language;
    }
    
    // 기준 시작일자 설정
    public function setBaseStartDate( $baseStartDate ){
        $this->baseStartDate = $baseStartDate;
    }
    
    // 기준 시작일자 가져오기
    public function getBaseStartDate(){
        return $this->baseStartDate;
    }
    
    // 페이징 구현
    public function listPaging($boardName, $startDate, $endDate, $pageID){
        $this->paging->operate($boardName, $startDate, $endDate, $pageID);
    }
    
    public function pager($boardName, $startDate, $endDate, $userName){
        $this->paging->pager($boardName, $startDate, $endDate, $userName);
    }
    
    public function sumOfvalue($type, $category, $boardName, $startDate, $endDate){
    
        $link = mysql_connect($this->conn->getHost(), 
    	                      $this->conn->getUser(), 
    	                      $this->conn->getPw()) or 
    	                      die('Could not connect' . mysql_error());
    	                      
        mysql_set_charset('utf8',$link);
    	
        // 어카운트 함수 호출
        $accountFn = new AccountFn(null);
    	
        mysql_select_db($this->conn->getDBName()) or die('Could not select database');
        mysql_query("set session character_set_connection=utf8;");
        mysql_query("set session character_set_results=utf8;");
        mysql_query("set session character_set_client=utf8;");
    
        $query = sprintf("SELECT id, type, category, accountName, accountNo, subject, " . 
                        "price, taxRate, count, regidate " . 
        	            "FROM account_%s WHERE ( type = %s AND category = %s ) " .
    	                " AND regidate BETWEEN '%s' AND '%s' ORDER BY regidate, id ASC",
              mysql_real_escape_string($boardName),
              mysql_real_escape_string($type),
              mysql_real_escape_string($category),
              mysql_real_escape_string($startDate),
              mysql_real_escape_string($endDate)); // SQL 인젝션 점검
              
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        $resultOfMoney = 0;
    	
        // DB Article
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        
            $sum = $row['price'] * $row['count'];  
            $resultOfMoney += $sum * ( 1 + $row['taxRate'] );
        }
    
        // Free resultset
        mysql_free_result($result);
    	
        // Closing connection
        mysql_close($link);
    
        return $resultOfMoney;  // 합계
    
    }  
  
    public function prevBalance($boardName, $targetDate){
        
        $link = mysql_connect($this->conn->getHost(), 
        	                      $this->conn->getUser(), 
        	                      $this->conn->getPw()) or 
        	                      die('Could not connect' . mysql_error());
        	                      
        mysql_set_charset('utf8',$link);
        	
        // 어카운트 함수 호출
        $accountFn = new AccountFn(null);
        	
        $startDate = $this->getBaseStartDate();
        $endDate = date("Y-m-d", strtotime($targetDate."-1day"));
        	
        mysql_select_db($this->conn->getDBName()) or die('Could not select database');
        mysql_query("set session character_set_connection=utf8;");
        mysql_query("set session character_set_results=utf8;");
        mysql_query("set session character_set_client=utf8;");
        
        $query = sprintf("SELECT id, type, subject, accountName, accountNo, " . 
                 "price, taxRate, count, regidate " . 
        	         "FROM account_%s WHERE regidate BETWEEN '%s' AND '%s' ORDER BY regidate, id ASC", 
                  mysql_real_escape_string($boardName),
                  mysql_real_escape_string($startDate),
                  mysql_real_escape_string($endDate)); // SQL 인젝션 점검
                  
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        			
        $index = 0;
        $resultOfPrice = 0;
        $tmp_price = 0;
        	
        // DB Article
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        	  
            $sumOfPrice = $row['price'] * $row['count'];
            $sumOfPriceTax = $sumOfPrice * $row['taxRate'];
            $resultOfPrice = $sumOfPrice + $sumOfPriceTax;
            
            if ($index == 0){
                $tmp_price = $resultOfPrice;
        	}
        	  
        	if ($index != 0){
        	    $resultOfPrice = $accountFn->calculate( $row['type'], $tmp_price, $resultOfPrice );
        	    $tmp_price = $resultOfPrice;
        	} 
        	  
        	$index = $index + 1;
        	  
        }
        
        // Free resultset
        mysql_free_result($result);
        	
        // Closing connection
        mysql_close($link);
        
        return $resultOfPrice;  // 합계
    }
  
    public function prevPageBalance($boardName, $startDate, $endDate, $page_id){
    
        if ( $page_id > 1 ){
            $this->pageBalance($boardName, $startDate, $endDate);
        }
        
    }
  
    // 이전 조회(페이지)
    private function pageBalance($boardName, $startDate, $endDate){
    
        $link = mysql_connect($this->conn->getHost(), 
		                      $this->conn->getUser(), 
		                      $this->conn->getPw()) or 
		                      die('Could not connect' . mysql_error());
		                      
		mysql_set_charset('utf8',$link);
		
		// 어카운트 함수 호출
		$accountFn = new AccountFn();
	
		// Paging
		$paging = $this->paging;
		$s_point = ($paging->getPage() -1 ) * $paging->getList();
		
		mysql_select_db($this->conn->getDBName()) or die('Could not select database');
		mysql_query("set session character_set_connection=utf8;");
        mysql_query("set session character_set_results=utf8;");
        mysql_query("set session character_set_client=utf8;");

        $query = sprintf("SELECT id, type, subject, accountName, accountNo, " . 
                         "price, taxRate, count, regidate " . 
		                 "FROM account_%s WHERE regidate BETWEEN '%s' AND '%s' ORDER BY regidate, id ASC" .
 		                 " LIMIT %s, %s", 
                          mysql_real_escape_string($boardName),
                          mysql_real_escape_string($startDate),
                          mysql_real_escape_string($endDate),
                          mysql_real_escape_string(0),
                          mysql_real_escape_string($s_point)); // SQL 인젝션 점검
              
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
		
		$index = 0;
		$resultOfPrice = 0;
		$tmp_price = 0;
		
		// DB Article
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		  
            $sumOfPrice = $row['price'] * $row['count'];
            $sumOfPriceTax = $sumOfPrice * $row['taxRate'];
            $resultOfPrice = $sumOfPrice + $sumOfPriceTax;
	    
    	    if ($index == 0){
	   	       $tmp_price = $resultOfPrice;
            }
		  
            if ($index != 0){
    		    $resultOfPrice = $accountFn->calculate( $row['type'], $tmp_price, $resultOfPrice );
		        $tmp_price = $resultOfPrice;
		    } 
		  
		    $index = $index + 1;
		  
		}
  
		// Free resultset
		mysql_free_result($result);
		
		// Closing connection
		mysql_close($link);
    
        return $resultOfPrice;  // 합계
    
    }
  
    // 조회(가계부)
    public function listContent($boardName, $startDate, $endDate, $userName, $balance, $page_id){
    
        $link = mysql_connect($this->conn->getHost(), 
		                      $this->conn->getUser(), 
		                      $this->conn->getPw()) or 
		                      die('Could not connect' . mysql_error());
		                      
		mysql_set_charset('utf8',$link);
		
		// 언어 호출
		$language = $this->getLanguage();
		$languagePack = new Language($language);
		
		// 어카운트 함수 호출
		$accountFn = new AccountFn($language);
		$function = new JasperFunction();
		
		// 주소 생성
		$homeDir = $this->getHomeDir();
		$writeUrl = $function->getUrl($homeDir, $boardName,  $userName, $language, $startDate, $endDate, 'writePost');
		
		// Paging
		$paging = $this->paging;
		$s_point = ($paging->getPage() -1 ) * $paging->getList();
		$s_list = $paging->getList();
		
		mysql_select_db($this->conn->getDBName()) or die('Could not select database');
		mysql_query("set session character_set_connection=utf8;");
        mysql_query("set session character_set_results=utf8;");
        mysql_query("set session character_set_client=utf8;");

        $query = sprintf("SELECT id, type, category, accountName, accountNo, " . 
                         "subject, price, taxRate, count, regidate " . 
		                 "FROM account_%s WHERE regidate BETWEEN '%s' AND '%s' ORDER BY regidate, id ASC" . 
		                 " LIMIT %s, %s", 
                    mysql_real_escape_string($boardName),
                    mysql_real_escape_string($startDate),
                    mysql_real_escape_string($endDate),
                    mysql_real_escape_string($s_point),
                    mysql_real_escape_string($s_list)); // SQL 인젝션 점검

		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
		
        // 초기화
        $index = 1;
		$last = mysql_num_rows($result);
		$resultOfPrice = 0;
		$tmp_price = $balance;
		
		// DB Article
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		  
            echo "\t";
            echo "<form name=\"bookeeping_frm_" . $row['id'] . "\" method=\"post\" ";
            echo "action=\"$writeUrl\">\n";

            echo "\t<table class=\"tg_general\" style=\"width:100%; margin-top:10px;\">";
			echo "\t<tr>\n";
			
			// 최종 행
			if ( strcmp ( $index, $last ) != 0 )
			{
                echo "\t\t\t<td class=\"tg-031e\" style=\"width:5%; background-color:#F3E2A9\">";
            }
            else{
                echo "\t\t\t<td class=\"tg-031e\" style=\"width:5%; background-color:#F79F81\">";
            }
      
            echo "<span style=\"font-weight:bold;\">";
            echo $index + $s_point;
            echo "</span>";
            echo "</td>\n";
            echo "\t\t\t<td class=\"tg-031e\" colspan=\"1\">";
      
            echo "\t\t\t";
            echo "<input name=\"regidate\" class=\"datepicker-here\"\n";
            echo "\t\t\t";
            echo "data-timepicker=\"true\"\n";
            echo "\t\t\t";
            echo "data-language=\"en\"\n";
            echo "\t\t\t";
            echo "data-date-format=\"yyyy-mm-dd\"\n";
            echo "\t\t\t";
            echo "data-time-format='hh:ii AA'";
      		echo " value=\"" . htmlentities($row['regidate'], ENT_QUOTES | ENT_IGNORE, "UTF-8") . "\">";
  		
            echo "</td>\n";
            echo "\t\t\t<td class=\"tg-031e\" style=\"width:7%;\" colspan=\"2\">";
            echo htmlentities($accountFn->getType( $row['type'] ), ENT_QUOTES | ENT_IGNORE, "UTF-8");
            echo "<br>";
            echo $accountFn->createMenu( 'type', $row['id']);
            echo "</td>\n";
            echo "\t\t\t<td class=\"tg-031e\" style=\"width:12%;\" colspan=\"2\">";
            echo $accountFn->getCategory( $row['type'], $row['category'] );
            //  echo htmlentities($accountFn->getCategory( $type, $row['category'] ), ENT_QUOTES | ENT_IGNORE, "UTF-8");
            echo "<br>";
            echo $accountFn->createMenu('category', $row['id']);
            echo "</td>\n";
            echo "\t\t\t<td class=\"tg-031e\">";
    		echo "<input type=\"text\" name=\"accountNmae\"";
    		echo " class=\"input_box\" value=\"";
    		echo $row['accountName'] . "\">";
            echo "</td>\n";
            echo "\t\t\t<td class=\"tg-031e\" colspan=\"2\">";
    		echo "<input type=\"text\" name=\"accountNo\"";
    		echo " class=\"input_box\" value=\"";
    		echo $row['accountNo'] . "\">";
            echo "</td>\n";      
			echo "\t</tr>\n";
		  
            // 로직(Logic)
            $sumOfPrice = $row['price'] * $row['count'];
            $sumOfPriceTax = $sumOfPrice * $row['taxRate'];
	        $resultOfPrice = $sumOfPrice + $sumOfPriceTax;

	        $resultOfPrice = $accountFn->calculate( $row['type'], $tmp_price, $resultOfPrice );
	        $tmp_price = $resultOfPrice;
		  
		    echo "\t\t<tr>\n";
            echo "\t\t\t<td class=\"tg-031e\" colspan=\"2\">";
		    echo "<input type=\"text\" name=\"subject\"";
		    echo " class=\"input_box\" value=\"";
		    echo $row['subject'] . "\">";
            echo "</td>\n";
            echo "\t\t\t<td class=\"tg-031e\" style=\"width:7%;\">";
		    echo "<input type=\"text\" name=\"price\"";
		    echo " class=\"input_box\" value=\"";
            echo htmlentities(number_format($row['price']), ENT_QUOTES | ENT_IGNORE, "UTF-8");
		    echo "\">";
		    
            echo "</td>\n";
            echo "\t\t\t<td class=\"tg-031e\" style=\"width:7%;\">\n";
            echo "<input type=\"text\" name=\"count\"";
		    echo " class=\"input_box\" value=\"";
            echo htmlentities(number_format($row['count']), ENT_QUOTES | ENT_IGNORE, "UTF-8");
		    echo "\">";
		    echo "</td>\n";
		    
            echo "\t\t\t<td class=\"tg-031e\" style=\"width:8%;\">\n";
		    echo "<input type=\"text\" name=\"taxRate\"";
		    echo " class=\"input_box\" value=\"";
            echo $row['taxRate'];
		    echo "\">";
            echo "</td>\n";
      
            echo "\t\t\t<td class=\"tg-031e\" style=\"width:8%;\">\n";
            echo htmlentities(number_format( $sumOfPriceTax ), ENT_QUOTES | ENT_IGNORE, "UTF-8");
            echo "</td>\n";
            echo "\t\t\t<td class=\"tg-031e\" style=\"width:8%;\">\n";
            echo htmlentities(number_format( $sumOfPrice + $sumOfPriceTax ), ENT_QUOTES | ENT_IGNORE, "UTF-8");
            echo "</td>\n";
            echo "\t\t\t<td class=\"tg-031e\" style=\"width:5%;\">";
            echo htmlentities(number_format( $resultOfPrice ), ENT_QUOTES | ENT_IGNORE, "UTF-8");
            echo "</td>\n";
            echo "\t\t\t<td class=\"tg-031e\" style=\"width:8%;\">";
			echo "<input type=\"button\"";
			echo " onclick=\"";
			echo "jasper_update('$boardName', '$language', '$startDate', '";
			echo "$endDate', '$userName', '";
			echo $row['id'] . "', 'm')";
			echo ";\"";
			echo " value=\"";
			echo $languagePack->getMessage('book', null, 'crud_modify');
			echo "\"";
			echo " class=\"comment_handle_btn\" style=\"color:#000;\">";
			echo "<br>";
			
			echo "<input type=\"button\"";
			echo " onclick=\"";
			echo "jasper_update('$boardName', '$language', '$startDate', '";
			echo "$endDate', '$userName', '";
			echo $row['id'] . "', 'm')";
			echo ";\"";
			echo " value=\"";
			echo $languagePack->getMessage('book', null, 'crud_remove');
            echo "\"";
			echo " class=\"comment_handle_btn\" style=\"color:#000;\">";
			
			echo "</td>\n";
            echo "\t\t</tr>\n";
            echo "\t</table>\n";
			echo "</form>\n";
		 
            // index 증가
		    $index++;
		   
		}

		// Free resultset
		mysql_free_result($result);
		
		// Closing connection
		mysql_close($link);
		
    }
  
    public function read($boardName, $articleID){
  
    }
  
    public function write($boardName, $account){
	
        $link = mysql_connect($this->conn->getHost(), 
		                      $this->conn->getUser(), 
		                      $this->conn->getPw()) or 
		                      die('Could not connect' . mysql_error());
		                      
		mysql_set_charset('utf8', $link);
		
		mysql_select_db($this->conn->getDBName()) or die('Could not select database');

        mysql_query("set session character_set_connection=utf8;");
        mysql_query("set session character_set_results=utf8;");
        mysql_query("set session character_set_client=utf8;");
		
		// Performing SQL query
		/*
		$query = 'INSERT INTO `board_' . $boardName . '_comment` (`id`, `article_id`, `memo`, ' . 
		         '`author`, `password`, `ip`, `regidate`) ' .
		         'VALUES (NULL, \''. $comment->getArticle_ID() . '\', \'' .
		         $comment->getMemo() . '\', \'' . $comment->getAuthor() . '\', \'' . 
		         $password . '\', \'' . $comment->getIP() . '\', \'' . 
		         $comment->getRegidate() . '\')';
		*/ // SQL Injection 미점검
		
		$query = sprintf("INSERT INTO `account_%s` (`id`, `type`, `category`, `accountName`, `accountNo`," . 
		         "`subject`, `price`, `taxRate`, `count`, `regidate`, `ip`) " .
		         "VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",

                 mysql_real_escape_string($boardName),
                 mysql_real_escape_string($account->getType()),
                 mysql_real_escape_string($account->getCategory()),
                 mysql_real_escape_string($account->getAccountName()),
                 mysql_real_escape_string($account->getAccountNo()),
                 mysql_real_escape_string($account->getSubject()),
                 mysql_real_escape_string($account->getPrice()),
                 mysql_real_escape_string($account->getTaxRate()),
                 mysql_real_escape_string($account->getCount()),
                 mysql_real_escape_string($account->getRegidate()),
                 mysql_real_escape_string($account->getIP()));  // SQL Injection 점검
    		
        $result = mysql_query($query, $link) or die('Query failed: ' . mysql_error());
		
		// Closing connection
		mysql_close($link);
	  
	    return $result;
	
    }
  
    // 수정(Modify)
    // 2018-08-02
    public function modify($boardName, $account){
	
        $link = mysql_connect($this->conn->getHost(), 
		                      $this->conn->getUser(), 
		                      $this->conn->getPw()) or 
		                      die('Could not connect' . mysql_error());
		                      
		mysql_set_charset('utf8', $link);

        mysql_query("set session character_set_connection=utf8;");
        mysql_query("set session character_set_results=utf8;");
        mysql_query("set session character_set_client=utf8;");
		
		mysql_select_db($this->conn->getDBName()) or die('Could not select database');
		
		// Performing SQL query
		/*
		$query = 'UPDATE `account_' . $boardName . '`' .
		         ' SET `type` = \'' . $account->getType() .
		         '\', `category` = \'' . $account->getCategory() .
             '\', `subject` = \'' . $account->getSubject() .
             '\', `price` = \'' . $account->getPrice() .
             '\', `taxRate` = \'' . $account->getTaxRate() .
             '\', `count` = \'' . $account->getCount() .
		         '\' WHERE `account_' . $boardName . '`.`id` = \'' . $account->getID() . '\';';
		*/  // SQL Injection 미점검
		
        $query = sprintf("UPDATE `account_%s` SET `type` = '%s', `category` = '%s', " .
	                      "`accountName` = '%s', `accountNo` = '%s', " .
	                      "`subject` = '%s', `price` = '%s', `taxRate` = '%s', `count` = '%s' " .
	                      "WHERE `account_%s`.`id` = '%s'",
    	                 mysql_real_escape_string($boardName),
                         mysql_real_escape_string($account->getType()),
                         mysql_real_escape_string($account->getCategory()),
                         mysql_real_escape_string($account->getAccountName()),
                         mysql_real_escape_string($account->getAccountNo()),
                         mysql_real_escape_string($account->getSubject()),
                         mysql_real_escape_string($account->getPrice()),
                         mysql_real_escape_string($account->getTaxRate()),
                         mysql_real_escape_string($account->getCount()),
    	                 mysql_real_escape_string($boardName),
    	                 mysql_real_escape_string($account->getID()));       // SQL Injection 점검
    		
		$result = mysql_query($query, $link) or die('Query failed: ' . mysql_error());
		
        // Closing connection
        mysql_close($link);
	  
        return $result;
	
    }	
  
	public function remove($boardName, $account){
	
        $link = mysql_connect($this->conn->getHost(), 
    	                      $this->conn->getUser(), 
    	                      $this->conn->getPw()) or 
    	                      die('Could not connect' . mysql_error());
    	                      
        mysql_set_charset('utf8', $link);
    	
    	mysql_select_db($this->conn->getDBName()) or die('Could not select database');
    
        mysql_query("set session character_set_connection=utf8;");
        mysql_query("set session character_set_results=utf8;");
        mysql_query("set session character_set_client=utf8;");
    
        $query = sprintf("DELETE FROM `account_%s` WHERE `id` = '%s'" ,
                       mysql_real_escape_string($boardName),
                       mysql_real_escape_string($account->getID())); // SQL Injection 점검
                       
    	$result = mysql_query($query, $link) or die('Query failed: ' . mysql_error());  
    	
    	// Closing connection
    	mysql_close($link);
      
        return $result;
	
	}	
  
}

?>