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

<section class="base-section video-reviews">
	<div class="container">
		<div class="base-section__header">
			<div class="base-section__header-main">
				<span class="base-text base-section__headline">
					<?= $arResult['NAME'] ?>
				</span>
				<h2 class="base-title">
					Наш <b class="strong">RUTUBE</b> канал
				</h2>
			</div>
			<a class="double-btn" href="#" target="_blank" rel="nofollow noopener noreferrer">
				<span>Перейти</span>
				<span><svg width="24" height="24" role="img" aria-hidden="true" focusable="false">
						<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/sprite.svg#icon-arrow"></use>
					</svg>
				</span>
			</a>
		</div>
		<div class="swiper autofill-slider">
			<div class="swiper-wrapper">

				<? foreach ($arResult["ITEMS"] as $arItem): ?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<div class="swiper-slide">

						<a
							href="<?= $arItem["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"]["SRC"] ?>"
							data-fancybox="video-reviews">
							<? if (!empty($arItem["PREVIEW_PICTURE"]["SRC"])): ?>
								<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="Видео-превью" width="350" height="280" loading="lazy">
							<? endif; ?>
						</a>

						<div class="video-reviews__item-content">
							<ul>
								<? if (!empty($arItem["PROPERTIES"]["CATEGORY"]["VALUE"])): ?>
									<? foreach ($arItem["PROPERTIES"]["CATEGORY"]["VALUE"] as $arCategory) : ?>
										<li><span><?= $arCategory ?></span></li>
									<? endforeach; ?>
								<? endif; ?>
							</ul>
							<h3><?= $arItem["NAME"] ?></h3>
						</div>

					</div>
				<? endforeach; ?>
			</div>
		</div>
	</div>
</section>