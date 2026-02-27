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

<? if ($arResult["ITEMS"]): ?>
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
							<div class="swiper-slide<?= ($index % 2 !== 0) ? ' swiper-slide--odd' : null ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
								<? $APPLICATION->IncludeComponent(
									"bitrix:news.detail",
									"base-card",
									array(
										"ACTIVE_DATE_FORMAT" => "d.m.Y",
										"ADD_ELEMENT_CHAIN" => "N",
										"ADD_SECTIONS_CHAIN" => "N",
										"AJAX_MODE" => "N",
										"AJAX_OPTION_ADDITIONAL" => "",
										"AJAX_OPTION_HISTORY" => "N",
										"AJAX_OPTION_JUMP" => "N",
										"AJAX_OPTION_STYLE" => "Y",
										"BROWSER_TITLE" => "-",
										"CACHE_GROUPS" => "Y",
										"CACHE_TIME" => "36000000",
										"CACHE_TYPE" => "A",
										"CHECK_DATES" => "Y",
										"DETAIL_URL" => "",
										"DISPLAY_BOTTOM_PAGER" => "Y",
										"DISPLAY_DATE" => "Y",
										"DISPLAY_NAME" => "Y",
										"DISPLAY_PICTURE" => "Y",
										"DISPLAY_PREVIEW_TEXT" => "Y",
										"DISPLAY_TOP_PAGER" => "N",
										"ELEMENT_CODE" => "",
										"ELEMENT_ID" => $arItem["ID"],
										"FIELD_CODE" => array(
											0 => "NAME",
											1 => "PREVIEW_TEXT",
											2 => ""
										),
										"IBLOCK_ID" => $arResult["ID"],
										"IBLOCK_TYPE" => "site_content",
										"IBLOCK_URL" => "",
										"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
										"MESSAGE_404" => "",
										"META_DESCRIPTION" => "-",
										"META_KEYWORDS" => "-",
										"PAGER_BASE_LINK_ENABLE" => "N",
										"PAGER_SHOW_ALL" => "N",
										"PAGER_TEMPLATE" => ".default",
										"PAGER_TITLE" => "Страница",
										"PROPERTY_CODE" => array("", ""),
										"SET_BROWSER_TITLE" => "N",
										"SET_CANONICAL_URL" => "N",
										"SET_LAST_MODIFIED" => "N",
										"SET_META_DESCRIPTION" => "Y",
										"SET_META_KEYWORDS" => "N",
										"SET_STATUS_404" => "N",
										"SET_TITLE" => "N",
										"SHOW_404" => "N",
										"STRICT_SECTION_CHECK" => "N",
										"USE_PERMISSIONS" => "N",
										"USE_SHARE" => "N"
									),
									$component
								); ?>
							</div>
						<? endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<? endif; ?>