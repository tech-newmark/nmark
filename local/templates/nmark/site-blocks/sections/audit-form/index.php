<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/site-blocks/sections/audit-form/style.css");
?>

<section class="base-section audit-form">
  <div class="container">
    <? $APPLICATION->IncludeComponent(
      "bitrix:form.result.new",
      "inline-form",
      array(
        "CUSTOM_TITLE" => "Получить <b class='strong'>аудит сайта</b> бесплатно",
        "CUSTOM_CLASS" => "inline-form--audit",
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CHAIN_ITEM_LINK" => "",
        "CHAIN_ITEM_TEXT" => "",
        "COMPONENT_TEMPLATE" => "inline-form",
        "EDIT_URL" => "",
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "LIST_URL" => "",
        "SEF_MODE" => "N",
        "SUCCESS_URL" => "",
        "USE_EXTENDED_ERRORS" => "Y",
        "VARIABLE_ALIASES" => array("WEB_FORM_ID" => "WEB_FORM_ID", "RESULT_ID" => "RESULT_ID",),
        "WEB_FORM_ID" => "2"
      ),
      $component
    ); ?>
  </div>
</section>