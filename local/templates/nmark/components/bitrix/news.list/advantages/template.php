<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<section class="base-section advantages">
	<div class="container">
		<div class="base-section__header">
			<div class="base-section__header-main">
				<span class="base-text base-section__headline">
					Наши преимущества
				</span>
				<h2 class="base-title">
					Почему <strong>выбирают</strong> нас
				</h2>
			</div>
			<button class="doubled-btn">
				<span>Связаться с нами</span>
				<span><svg width="24" height="24" role="img" aria-hidden="true" focusable="false">
						<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/sprite.svg#icon-arrow"></use>
					</svg>
				</span>
			</button>
		</div>
	</div>

	<div class="autofill-slider">
		<? foreach ($arResult["ITEMS"] as $arItem): ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="swiper-slide">
				<div class="advantage">
					<span class="advantage__name"><?= $arItem['NAME'] ?></span>
					<span class="advantage__value"><strong><?= $arItem['PREVIEW_TEXT'] ?></strong></span>
					<span class="advantage__desk"><?= $arItem['DETAIL_TEXT'] ?></span>
				</div>
			</div>
		<? endforeach; ?>
		<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
			<br /><?= $arResult["NAV_STRING"] ?>
		<? endif; ?>
	</div>
	</div>

	<ul>
		<li>Пункт 1</li>
		<li>Пункт 1</li>
		<li>Пункт 1</li>
	</ul>
</section>