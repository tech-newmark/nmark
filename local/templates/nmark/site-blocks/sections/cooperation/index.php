<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/site-blocks/sections/cooperation/style.css");
?>

<div class="base-section ">
    <div class="cooperation">
        <div class="container">
            <div class="cooperation__content">
                <p>Вместе успешнее!</p>
                <p>Давайте работать
                    <span>вместе
                        <button class="main-btn main-btn--secondary">Нажмите
                            <svg width="48" height="48" role="img" aria-hidden="true" focusable="false">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/sprite.svg#icon-arrow"></use>
                            </svg>
                        </button>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>