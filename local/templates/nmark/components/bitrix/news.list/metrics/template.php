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

<section class="base-section metrics">
	<div class="container">
		<div class="base-section__header">
			<div class="base-section__header-main">
				<span class="base-text base-section__headline">
					<?= $arResult['NAME'] ?>
				</span>
				<h2 class="base-title">
					Наши <b class="strong">показатели</b> в цифрах
				</h2>
			</div>
			<button class="double-btn">
				<span>Получить консультацию</span>
				<span><svg width="24" height="24" role="img" aria-hidden="true" focusable="false">
						<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/sprite.svg#icon-arrow"></use>
					</svg>
				</span>
			</button>
		</div>
		<div class="metrics__grid">
			<? foreach ($arResult["ITEMS"] as $arItem): ?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<? if (!empty($arItem['PREVIEW_PICTURE'])) : ?>
					<div class="base-card"
						style="background-image: url(<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>)">
					</div>
				<? else: ?>
					<? include($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/site-blocks/partials/base-card/base-card.php"); ?>
				<? endif; ?>
			<? endforeach; ?>
		</div>
	</div>
</section>