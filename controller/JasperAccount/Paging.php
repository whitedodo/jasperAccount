<?php

/*
 Class: Core - Paging
 Description: Algorithm with Board.
 1. Jasper / Implement to Paging System. (페이징 시스템 구현) / 2018-07-09
 
 */
class Paging{
    
    private $conn;
    private $num;
    private $page;
    private $list;
    private $block;
    private $pageNum;
    private $blockNum;
    private $nowBlock;
    private $s_page;
    private $e_page;
    private $url;
    private $language;
    
    // Constructor and Destructor(생성자와 소멸자)
    public function __construct( $conn, $homeDir = null, $language ){
        $this->conn = $conn;
        $this->url = $homeDir;
        $this->language = $language;
    }
    
    public function __destruct(){
        
    }
    
    // Getter and Setter
    
    public function getUrl(){
        return $this->url;
    }
    
    public function getLanguage(){
        return $this->language;
    }
    
    public function getNum(){
        return $this->num;
    }
    
    public function getPage(){
        return $this->page;
    }
    
    public function getList(){
        return $this->list;
    }
    
    public function getBlock(){
        return $this->block;
    }
    
    public function getPageNum(){
        return $this->pageNum;
    }
    
    public function getBlockNum(){
        return $this->blockNum;
    }
    
    public function getNowBlock(){
        return $this->nowBlock;
    }
    
    public function getS_Page(){
        return $this->s_page;
    }
    
    public function getE_Page(){
        return $this->e_page;
    }
    
    public function setNum($num){
        $this->num = $num;
    }
    
    public function setPage($page){
        $this->page = $page;
    }
    
    public function setList($list){
        $this->list = $list;
    }
    
    public function setBlock($block){
        $this->block = $block;
    }
    
    public function setPageNum($pageNum){
        $this->pageNum = $pageNum;
    }
    
    public function setBlockNum($blockNum){
        $this->blockNum = $blockNum;
    }
    
    public function setNowBlock($nowBlock){
        $this->nowBlock = $nowBlock;
    }
    
    public function setS_Page($s_page){
        $this->s_page = $s_page;
    }
    
    public function setE_Page($e_page){
        $this->e_page = $e_page;
    }
    
    // Method
    public function operate($boardName, $startDate, $endDate, $page){
        
        $link = mysql_connect($this->conn->getHost(),
            $this->conn->getUser(),
            $this->conn->getPw()) or
            die('Could not connect' . mysql_error());
            
            mysql_set_charset('utf8',$link);
            
            mysql_select_db($this->conn->getDBName()) or die('Could not select database');
            
            //$query = "SELECT id FROM account_$boardName ORDER BY id DESC"; // SQL Injection - 미점검
            $query = sprintf("SELECT id FROM account_%s WHERE " .
                " regidate BETWEEN '%s' AND '%s' ORDER BY regidate, id ASC",
                mysql_real_escape_string($boardName),
                mysql_real_escape_string($startDate),
                mysql_real_escape_string($endDate));       // SQL Injection 점검
                
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());;
                
                $this->setNum( mysql_num_rows( $result ) );
                
                $this->setPage( $page?$page:1 );
                
                $this->setList( 30 );
                $this->setBlock ( 10 );
                
                $this->setPageNum( ceil($this->getNum() / $this->getList()) ); // 총 페이지
                $this->setBlockNum( ceil($this->getPageNum() / $this->getBlock() ) ); // 총 블록
                $this->setNowBlock( ceil( $page / $this->getBlock() ) );
                
                // Block이 0일 때
                if ( $this->getNowBlock() == 0 )
                    $this->setNowBlock( 1 );
                    
                    $this->setS_page( ( $this->getNowBlock() * $this->getBlock() ) - 9 );
                    
                    if ( $this->getS_page() <= 1 ) {
                        $this->setS_page( 1 );
                    }
                    $this->setE_page( $this->getNowBlock() * $this->getBlock() );
                    
                    if ($this->getPageNum() <= $this->getE_page()) {
                        $this->setE_page( $this->getPageNum() );
                    }
                    
                    // Free resultset
                    mysql_free_result($result);
                    
                    // Closing connection
                    mysql_close($link);
                    
    }
    
    public function message(){
        
        echo "현재 페이지는".$this->getPage()."<br/>";
        echo "현재 블록은".$this->getNowBlock()."<br/>";
        
        echo "현재 블록의 시작 페이지는".$this->getS_page()."<br/>";
        echo "현재 블록의 끝 페이지는".$this->getE_page()."<br/>";
        
        echo "총 페이지는".$this->getPageNum()."<br/>";
        echo "총 블록은".$this->getBlockNum()."<br/>";
    }
    
    public function pager( $boardName, $startDate, $endDate, $userName ){
        
        $function = new JasperFunction();
        
        $s_page = $this->getPage() - 1;
        $n_page = $this->getPage() + 1;
        $e_page = $this->getPageNum();
        
        $homeDir = $this->getUrl();
        $language = $this->getLanguage();
        $languagePack = new Language($language);
        
        $url = $function->getUrl($homeDir, $boardName, $userName, $language, $startDate, $endDate, 'paging');
        
        echo "\t\t\t<table id=\"pager_font\" style=\"width:100%;\">\n";
        echo "\t\t\t\t<tr>\n";
        
        // 처음, 이전
        echo "\t\t\t\t<td style=\"width:20%; text-align:center;\">\n";
        echo "\t\t\t\t\t\n";
        echo "\t\t\t\t\t";
        
        echo "<a href=\"$url/?page=1\">";
        echo $languagePack->getMessage('book', null, 'pager_first');
        echo "</a>";
        echo "\n";
        
        if ( $s_page != 0 ){
            echo "\t\t\t\t";
            echo "<a href=\"/$url/?page=$s_page\">";
            echo $languagePack->getMessage('book', null, 'pager_prev');
            echo "</a>\n";
        }
        
        echo "\t\t\t\n";
        echo "\t\t\t</td>\n";
        
        // 실제 페이지
        echo "\t\t\t<td style=\"text-align:center;\">\n";
        echo "\t\t\t\t<ul id=\"pager\">\n";
        //   echo $this->getS_page() . "-" . $this->getE_page() . "현재블록";
        for ( $p = $this->getS_page(); $p <= $this->getE_page(); $p++ ) {
            
            if ( $this->getPage() == $p )
            {
                echo "\t\t\t\t\t<li>";
                echo "<a href=\"$url/?page=$p\"";
                echo " class=\"active\">$p</a></li>\n";
            }else{
                echo "\t\t\t\t\t<li>";
                echo "<a href=\"$url/?page=$p\">$p</a>";
            }
            echo "</li>\n";
            
        }
        
        echo "\t\t\t\t</ul>\n";
        echo "\t\t\t\t</td>";
        
        // 다음, 마지막
        echo "\n<td style=\"width:20%;text-align:center;\">\n";
        echo "\t\t\t\t\n";
        
        if ( $this->getPage() != $e_page ){
            echo "\t\t\t";
            echo "<a href=\"$url/?page=$n_page\">";
            echo $languagePack->getMessage('book', null, 'pager_next');
            echo "</a>\n";
        }
        
        echo "\t\t\t";
        
        echo "<a href=\"$url/?page=$e_page\">";
        echo $languagePack->getMessage('book', null, 'pager_last');
        echo "</a>\n";
        echo "\t\t</td>\n";
        echo "\t\t\t</tr>\n";
        echo "\t\t\t</table>\n";
    }
    
}

?>