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
				<span class="base-section__headline">
					<?= $arResult['NAME'] ?>
				</span>
				<h2 class="base-title">
					Почему <b class="strong">выбирают</b> нас
				</h2>
			</div>
			<button class="double-btn">
				<span>Связаться с нами</span>
				<span><svg width="24" height="24" role="img" aria-hidden="true" focusable="false">
						<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/sprite.svg#icon-arrow"></use>
					</svg>
				</span>
			</button>
		</div>

		<div class="advantages__list">
			<div class="swiper autofill-slider">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<img src="<?= CFile::GetPath($arResult['PICTURE']) ?>" alt="" width="240" height="198">
					</div>
					<? foreach ($arResult["ITEMS"] as $index => $arItem): ?>
						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>
						<div class="swiper-slide<?= ($index % 2 !== 0) ? ' swiper-slide--odd' : null ?>">
							<? include($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/site-blocks/partials/base-card/base-card.php"); ?>
						</div>
					<? endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>