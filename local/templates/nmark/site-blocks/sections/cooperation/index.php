<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/site-blocks/sections/cooperation/style.css");
?>

<div class="base-section cooperation">
    <div class="container">
        <p class="cooperation__slogan">Вместе успешнее!</p>
        <p class="cooperation__text">Давайте работать<br>
            <span>вместе</span> <button class="main-btn main-btn--secondary">Нажмите</button>
        </p>
    </div>
</div>