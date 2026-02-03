<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
// IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= SITE_TEMPLATE_PATH ?>/favicon.ico" />

    <? $APPLICATION->ShowHead(); ?>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <?/* $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/assets/vendors/swiper/styles.css", true); */ ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/template_scripts.js"); ?>
    <?
    // подключаю для работы попапов на сайте
    \CJSCore::Init(['popup']);
    ?>
</head>

<body>

    <? $APPLICATION->ShowPanel() ?>
    <header class="header">header</header>
    <main class="workarea">
        workarea