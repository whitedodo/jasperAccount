<?php
/*
 * Created by 2018-08-16
 * Project Name: JasperAccount / Module
 * Filename: index.php
 * Description:
 * 2018-08-01 ~ 2018-08-02 / Jasper / 초안 작성
 * 2018-08-16 ~ 2018-08-17 / Jasper / MVC 형태로 수정
 * 2018-08-16 ~ 2018-08-17 / Jasper / 다국어 지원
 * 2018-08-16 ~ 2018-08-17 / Jasper / 사용자 디렉터리 지원
 */
?>
<?php

    require_once 'function.php';
    
    header("Content-Type: text/html; charset=UTF-8");
    header('X-Frame-Options: DENY');  // 'X-Frame-Options'
    
    $function = new JasperFunction();
    
    $pageName = $function->convertToUTF8( $_GET['pageName'] );
    $subName = $function->convertToUTF8( $_GET['subName'] );
    $userName = $function->convertToUTF8( $_GET['userName'] );
    $startDate = $function->convertToUTF8( $_GET['startdate'] );
    $endDate = $function->convertToUTF8( $_GET['enddate'] );
    $userType = $function->convertToUTF8( $_GET['type'] );
    $language = $function->convertToUTF8( $_GET['language'] );
    $page = $function->convertToUTF8( $_GET['page'] );
    
    
    $root = "C:/APM_Setup/htdocs";  // 실제 경로 입력
    $directories = 'account';    // 사용자 디렉토리일 떄 입력
    
    $rootDir = $function->getDirectories($root, $directories);
    $serverURL = $_SERVER["SERVER_NAME"];
    $serverPort = $_SERVER["SERVER_PORT"];
    
    $copyright = "Jasper";
    $priemail = "root@localhost";
    $subemail = "root@localhost";
    $powered = "localhost";
    $openingDate = "2018-08-17";
    
    $baseStartDate = "1920-01-01";
    $baseUnit = "원(Won)";
    
    //require_once $rootDir . "/model/homepage/pageList.php";
    
    //require('connect.php');
    //require('model.php');
    //require('function.php');
    
    require_once $rootDir . "/model/JasperPage/JPageInfo.php";
    require_once $rootDir . "/model/connect/connect.php";
    require_once $rootDir . "/model/footer/footer.php";
    require_once $rootDir . "/model/JasperAccount/Account.php";
    require_once $rootDir . "/model/JasperAccount/AccountView.php";
    require_once $rootDir . "/model/JasperAccount/IJasperAccount.php";
    require_once $rootDir . "/controller/JasperAccount/Paging.php";
    require_once $rootDir . "/controller/JasperAccount/JasperAccount.php";
    require_once $rootDir . "/view/common/LanguageView.php";
    require_once $rootDir . "/controller/JasperAccount/LanguagePack.php";
    require_once $rootDir . "/controller/ifrs/AccountFn.php";
    require_once $rootDir . "/controller/JasperAccount/JasperController.php";
    
    
    $pageInfo = new JPageInfo( $pageName, $subName, $startDate, $endDate, $page );
    $pageInfo->setType($userType);
    $pageInfo->setLanguage($language);
    $pageInfo->setUserName($userName);
    $pageInfo->setBaseStartDate($baseStartDate);
    $pageInfo->setBaseUnit($baseUnit);
    
    $page = new JasperController( $serverURL, $serverPort );
    $page->setFooter($copyright, $priemail, $subemail, $powered, $openingDate);
    $page->setPageInfo( $pageInfo );   
    
    $page->setDirectories($root, $directories);
    $page->getPage();

?>