<?php
/*
 *  Create Date: 2018-08-16
 *  Subject: Jasper Controller
 *  FileName: JasperController.php
 *  Author: Dodo (rabbit.white@daum.net)
 *  Description:
 *  1. 2018-08-16 / Jasper / Homepage 이동 함수 구현
 *
 */

class JasperController{
    
    private $pageInfo;
    
    private $rootDir;
    private $homeDir;
    
    private $serverUrl;
    private $serverPort;
    
    // Footer
    private $footer;
    
    public function __construct( $serverUrl, $serverPort ){
        $this->serverUrl = $serverUrl;
        $this->serverPort = $serverPort;
        
        $this->footer = new Footer();
        
    }
    
    public function __destruct(){
        
    }
    
    public function setFooter( $copyright, $priemail, $subemail, $powered, $openingDate ){
        
        $this->footer->setCopyright( $copyright );
        $this->footer->setPriEmail( $priemail );
        $this->footer->setSubEmail( $subemail );
        $this->footer->setPowered( $powered );
        $this->footer->setOpeningDate( $openingDate );
    }
    
    public function getPage(){
        
        $pageInfo = $this->getPageInfo();
        
        // IFRS Table ID 존재여부
        if ( strcmp ( $pageInfo->getSubName(), "" ) == 0 ){
            
        }
        // IFRS Table ID가 존재할 때
        else{
            
            if ( strcmp( $pageInfo->getPageName(), "book" ) == 0 ){
                
                if ( strcmp ( $pageInfo->getType(), "crud") == 0 ){
                    $this->accountCrud($pageInfo);
                }else{
                    $this->loadPage($pageInfo);
                }
            }
            else if ( strcmp ( $pageInfo->getPageName(), "report" ) == 0 ){
                $this->loadPage($pageInfo);
            }
            else{
                
            }
       } // end of if
       
    }
    
    private function accountCrud($pageInfo){
        
        $language;
        $util = new AccountFn(null);
        
        // 언어명
        if (empty($_POST["language"])) {}
        else {
            $language = $util->test_input($_POST["language"]);
        }
        
        $util->setLanguage($language);
        $jasper = new JasperAccount(null, null);
        $function = new JasperFunction();
        $languagePack = new Language($language);
        
        // 디렉터리 환경 변수
        $rootDir = $this->getRootDir();
        $homeDir = $this->getDirectories();
        $realDir = $function->getDirectories($rootDir, $homeDir);
        $footer = $this->footer;
        
        // 기본 정보 가져오기
        $boardName = $pageInfo->getSubName();
        $userName = $pageInfo->getUserName();
        
        // 사이트 URL
        $postUrl;
        
        $chkBlock = -1;
        $SUCCESS = 16;   // 성공
        
        $typeErr = $categoryErr = $subjectErr = $priceErr = $taxRateErr = $countErr = $regiDateErr = "";
        $type = $category = $subject = $price = $taxRate = $count = $regiDate = "";
        $boardName = $startDate = $endDate = $userName = $articleID = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // 유형
            if (empty($_POST["type"])) {
                
                $postVal = "type_" . $util->test_input($_POST["articleID"]);
                //echo $postVal;
                
                // 특수한 경우(수정, 삭제에 한함)
                if ( empty($_POST[$postVal] ) ){
                    
                    $typeErr = "Required Type";
                    $chkBlock++;
                    //echo "거짓";
                }
                else
                {
                    $type = $util->test_input($_POST[$postVal]);
                }
                
            }else {
                $type = $util->test_input($_POST["type"]);
            }
            
            // 카테고리
            if (empty($_POST["category"])) {
                $categoryErr = "Category is required";
                $chkBlock++;
            }else {
                // 버그 개선
                $tarCategory = $languagePack->getMessage('accType', 'accCategory', 'type_not_selected');
                if ( strcmp($_POST["category"], $tarCategory) != 0 ){
                    $category = $util->test_input($_POST["category"]);
                    //         $category = $util->getSearchCategoryID($type, $category);
                    //       echo $category;
                }
            }
            //   echo $category;
            
            // 제목명
            if (empty($_POST["subject"])) {
                $subjectErr = "Subject is required";
                $chkBlock++;
            }else {
                $subject = $util->test_input($_POST["subject"]);
            }
            
            // 가격
            if (empty($_POST["price"])) {
                $priceErr = "Price is required";
                $chkBlock++;
            }else {
                $price = $util->test_input($_POST["price"]);
            }
            
            // 세금비율
            if (empty($_POST["taxRate"])) {
                $taxRateErr = "TaxRate is required";
                $chkBlock++;
            }else {
                $taxRate = $util->test_input($_POST["taxRate"]);
            }
            
            // 수량
            if (empty($_POST["count"])) {
                $countErr = "Count is required";
                $chkBlock++;
            }else {
                $count = $util->test_input($_POST["count"]);
            }
            
            // 게시판 이름
            if (empty($_POST["boardName"])) {   }
            else {
                $boardName = $util->test_input($_POST["boardName"]);
            }
            
            // 시작일자
            if (empty($_POST["startDate"])) {}
            else {
                $startDate = $util->test_input($_POST["startDate"]);
            }
            
            // 종료일자
            if (empty($_POST["endDate"])) {}
            else {
                $endDate = $util->test_input($_POST["endDate"]);
            }
            
            // 종료일자
            if (empty($_POST["regidate"])) {}
            else {
                $regiDate = $util->test_input($_POST["regidate"]);
                
                $tmpYear = substr( $regiDate, 0, 4 );
                $tmpMonth = substr( $regiDate, 5, 2 );
                $tmpDay = substr( $regiDate, 8, 2 );
                $tmpHour = substr( $regiDate, strlen( $regiDate ) - 8, 2 );
                $tmpHour = intVal ( $tmpHour );
                $tmpMin = substr( $regiDate, strlen( $regiDate ) - 5, 2 );
                $tmpMin = intVal ($tmpMin);
                
                $tmpType = substr( $regiDate, strlen( $regiDate ) - 2, 2 );
                
                $regiDate = $tmpYear . "-" . $tmpMonth . "-" . $tmpDay;
                
                // PM(저녁) 여부
                if ( strcmp( $tmpType, "PM" ) == 0 && !empty( $tmpType) )
                {
                    $tmpHour += 12;
                }
                
                $regiDate = $regiDate . " " . $tmpHour . ":" . $tmpMin;
                
                //echo $regiDate;
            }
            
            // 사용자명
            if (empty($_POST["userName"])) {}
            else {
                $userName = $util->test_input($_POST["userName"]);
            }
            
            // 게시글 ID
            if (empty($_POST["articleID"])) {}
            else {
                $articleID = $util->test_input($_POST["articleID"]);
            }
            
            // 옵션(수정, 삭제): m, d
            if (empty($_POST["choose"])) {}
            else {
                $choose = $util->test_input($_POST["choose"]);
            }
        }
        
        $account = new Account();
        
        $postUrl = $function->getUrl($homeDir, $boardName, $userName, $language, $startDate, $endDate, 'crud_back');
        
        // 내용 비어있는지 확인
        if ( !empty($type) &&
            !empty($category) &&
            !empty($subject) &&
            !empty($boardName) &&
            !empty($language) &&
            !empty($userName) &&
            !empty($startDate) &&
            !empty($endDate) &&
            !empty($regiDate) &&
            !empty($articleID) &&
            !empty($choose) ){
                
            $account->setID($articleID);
            $account->setType($type);
            $account->setCategory($category);
            $account->setSubject($subject);
            $account->setPrice($price);
            $account->setTaxRate($taxRate);
            $account->setCount($count);
            $account->setRegidate($regiDate);
            $account->setIP($function->getRealIpAddr());
            
            $chkBlock = $SUCCESS;
            
        }
        
        // 게시글이 비어있지 않을 때
        if ( $chkBlock != $SUCCESS ){
            echo "<script>alert('";
            echo $languagePack->getMessage('book', null, 'func_crud_blank');
            echo "');";
            echo "location.href=\"$postUrl\";";
            echo "</script>";
        }
        
        // 게시글 UD 구현
        if ( $chkBlock == $SUCCESS )
        {
            // 추가 모드
            if ( $choose == 'w' ){
                $jasper->write($boardName, $account);
                //  $comment->setArticle_ID($articleID);    // 수정에서만 게시글 ID 사용
                
                echo "<script>alert('";
                echo $languagePack->getMessage('book', null, 'func_crud_add');
                echo "');";
                echo "location.href=\"$postUrl\";";
                echo "</script>";
            }
            
            // 수정 모드
            if ( $choose == 'm' ){
                $jasper->modify($boardName, $account);
                //    $comment->setArticle_ID($articleID);    // 수정에서만 게시글 ID 사용
                
                echo "<script>alert('";
                echo $languagePack->getMessage('book', null, 'func_crud_modify');
                echo "');";
                echo "location.href=\"$postUrl\";";
                echo "</script>";
            }
            
            // 삭제 모드
            if ( $choose == 'd' ){
                //    $board->removeComment($boardName, $comment);
                //    $result = $board->updateReplyCount($boardName, $articleID);
                
                echo "<script>alert('";
                echo $languagePack->getMessage('book', null, 'func_crud_remove');
                echo "');";
                echo "location.href=\"$postUrl\";";
                echo "</script>";
                
            }
        }
        
    }
    
    private function loadPage( $pageInfo ){
        
        // 기본 정보 가져오기
        $startDate = $pageInfo->getStartDate();
        $endDate = $pageInfo->getEndDate();
        $boardName = $pageInfo->getSubName();
        $page = $pageInfo->getPage();
        $userName = $pageInfo->getUserName();
        $language = $pageInfo->getLanguage();
        $baseStartDate = $pageInfo->getBaseStartDate(); // 기준 시작일자
        $baseUnit = $pageInfo->getBaseUnit();           // 기준 단위
        
        // 디렉터리 환경 변수
        $rootDir = $this->getRootDir();
        $homeDir = $this->getDirectories();
        
        // 객체 생성
        $jasper = new JasperAccount( $homeDir, $language );
        $jasper->setBaseStartDate($baseStartDate);
        $accountFn = new AccountFn( $language );
        $function = new JasperFunction();
        $languagePack = new Language($language);
        
        // 실제 디렉터리 생성
        $realDir = $function->getDirectories($rootDir, $homeDir);
        
        // 하단 생성
        $footer = $this->footer;
        
        // 페이징 처리
        $jasper->listPaging( $boardName, $startDate, $endDate, $page );
        
        // 잔액 시산
        $balance = $jasper->prevBalance($boardName, $startDate);
        $page_balance = $jasper->prevPageBalance($boardName, $startDate, $endDate, $page);
        
        // 리포트 보고서 URL
        $requestUrl = $function->convertToUTF8($_SERVER["REQUEST_URI"]);
        $writeUrl = $function->getUrl($homeDir, $boardName,  $userName, $language, $startDate, $endDate, 'writePost');
        $reportUrl = str_replace("book", "report", $requestUrl);
        $bookUrl = str_replace("report", "book", $requestUrl);
        
        // 초기일자 생성
        $initialStartDate = $baseStartDate;
        $initialEndDate = date("Y-m-d", strtotime($startDate."-1day"));
        
        // 실행시간 측정
        $start = $function->getExecutionTime();
        
        // 일지 작성
        if ( strcmp( $pageInfo->getPageName(), "book") == 0 ){
            require_once "$rootDir/$homeDir/view/common/header_book.php";
            require_once "$rootDir/$homeDir/view/ifrs/accountbook.php";
        }
        
        // 보고서 작성
        if ( strcmp( $pageInfo->getPageName(), "report") == 0 ){
            require_once "$rootDir/$homeDir/controller/ifrs/ifrsSystem.php";
            require_once "$rootDir/$homeDir/view/common/header_report.php";
            require_once "$rootDir/$homeDir/view/ifrs/report.php";
        }
        
        require_once "$rootDir/$homeDir/view/common/executionTime.php";
        require_once "$rootDir/$homeDir/view/common/footer.php";
        
    }
    
    // Getter & Setter
    public function getPageInfo(){
        return $this->pageInfo;
    }
    
    public function getRootDir(){
        return $this->rootDir;
    }
    
    public function getDirectories(){
        return $this->homeDir;
    }
    
    public function getFooter(){
        return $this->footer;
    }
    
    public function setDirectories($rootDir, $homeDir){
        $this->rootDir = $rootDir;
        $this->homeDir = $homeDir;
    }
    
    public function setPageInfo($pageInfo){
        $this->pageInfo = $pageInfo;
    }
    
}


?>