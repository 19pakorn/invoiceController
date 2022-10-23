<?php
///==================================Main Setting==================================================
//Setting  
//title_bar = <title> xxx xxx </title>
$title_bar="PMWA";
/// Head MENU
$hMenu="PMWA";
// breadcrumb 
//Footer
//logo-icon.png   70x70
//favicon.ico
$hICO="favicon.ico";
$hLogo="logo.png";
$textFoorer='<small>พบปัญหาการใช้งานติดต่อ Tel. <a href="tel:0865921597">086-592-1597</a></small>';
///==================================///==================================================
$_SESSION['sess_pageOn']=(isset($_SESSION['sess_pageOn'])!="")?$_SESSION['sess_pageOn']:'หน้าหลัก';
$pageTile=isset($pageTile)?$pageTile:'';
$post=$_POST;
$get=$_GET;
$file=$_FILES;
$server=$_SERVER;
?>