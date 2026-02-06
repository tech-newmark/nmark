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

<section class="base-section faq">
	<div class="container">
		<div class="base-section__header">
			<span class="base-text base-section__headline">
				Наши преимущества
			</span>
			<h2 class="base-title">
				Почему <strong>выбирают</strong> нас
			</h2>
		</div>



				<? foreach ($arResult["ITEMS"] as $arItem): ?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<? if (!empty($arItem['PREVIEW_PICTURE'])) : ?>
						<div class="swiper-slide">
							<div class="advantages__item advantages__item--image"
								style="background-image: url(<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>)">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="advantages__item">
								<span class="advantages__item-name"><?= $arItem['NAME'] ?></span>
								<span class="advantages__item-value"><strong><?= $arItem['PREVIEW_TEXT'] ?></strong></span>
								<span class="advantages__item-desc"><?= $arItem['DETAIL_TEXT'] ?></span>
							</div>
						</div>

			</div>
		</div>
		<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
			<br /><?= $arResult["NAV_STRING"] ?>
		<? endif; ?>

	</div>
</section>