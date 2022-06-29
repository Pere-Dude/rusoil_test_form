<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <? $APPLICATION->ShowHead(); ?>
    <link href="<?= SITE_TEMPLATE_PATH ?>/common.css" type="text/css" rel="stylesheet"/>
    <link href="<?= SITE_TEMPLATE_PATH ?>/colors.css" type="text/css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"
</head>
<body>
<div id="page-wrapper">
    <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
    <div id="header">
        <div id="workarea">
        
