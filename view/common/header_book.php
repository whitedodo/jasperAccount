<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <title><?php echo $languagePack->getMessage('book', null, 'title'); ?></title>
    <link rel="stylesheet" type="text/css" href="/<?php echo $homeDir;?>/css/mystyle.css">
    <script src="/<?php echo $homeDir;?>/script/myscripts.js"></script>
    <script src="/<?php echo $homeDir;?>/dist/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="/<?php echo $homeDir;?>/dist/ajax/libs/highlight.js/8.9.1/highlight.min.js"></script>
    <script src="/<?php echo $homeDir;?>/dist/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <link href="/<?php echo $homeDir;?>/dist/datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="/<?php echo $homeDir;?>/dist/datepicker/js/datepicker.min.js"></script>
    
    <!-- Include English language -->
    <script src="/<?php echo $homeDir;?>/dist/datepicker/js/i18n/datepicker.en.js"></script>
    
    <?php $accountFn->selectCategory(); ?>
    <script src="/<?php echo $homeDir;?>/script/categories.js"></script>
</head>