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
			<span class="base-text base-section__headline">
				Наши преимущества
			</span>
			<h2 class="base-title">
				Почему <strong>выбирают</strong> нас
			</h2>
			<button class="main-btn main-btn--double">Связаться с нами</button>
		</div>

		<div class="swiper autofill-slider ">
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
</section>