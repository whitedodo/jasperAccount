<?php

/*
 2018-08-16
 Author: Jasper(rabbit.white@daum.net)
 FileName: AccountView.php
 Goal: Jasper의 IFRS 시스템 (IFRS system)
 Description:
 1. 2018-08-01 / Japser / IFRS 1 구현
 */


abstract class IJasperAccount{
    
    abstract public function sumOfvalue($type, $category, $boardName, $startDate, $endDate);
    abstract public function prevBalance($boardName, $targetDate);
    abstract public function prevPageBalance($boardName, $startDate, $endDate, $page_id);
    //    abstract public function pageBalance($boardName, $startDate, $endDate);
    abstract public function listContent($boardName, $startDate, $endDate, $userName, $balance, $page_id);
    abstract public function read($boardName, $articleID);
    abstract public function write($boardName, $account);
    abstract public function modify($boardName, $account);
    abstract public function remove($boardName, $account);
    
}

?>