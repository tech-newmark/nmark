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
	<section class="faq">
		<? if ($arParams["IS_SUBSECTION"] !== "Y"): ?>
			<div class="container">
			<? endif; ?>
			<div class="base-section__header">
				<span class="base-text base-section__headline">
					<?= $arResult['NAME'] ?>
				</span>
				<h2 class="base-title">
					Частые <b class="strong">вопросы</b>
				</h2>
			</div>
			<div class="accordeon">
				<? foreach ($arResult["ITEMS"] as $arItem): ?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<div class="accordeon-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
						<div class="accordeon-header">
							<span><b><?= $arItem['NAME'] ?></b></span>
							<span class="accordeon-opener">
								<svg width="12" height="12" viewBox="0 0 12 12" role="img" aria-hidden="true" focusable="false">
									<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/sprite.svg#icon-cross"></use>
								</svg>
							</span>
						</div>
						<div class="accordeon-body">
							<div class="content">
								<?= $arItem['PREVIEW_TEXT'] ?>
							</div>
						</div>
					</div>

				<? endforeach; ?>
			</div>
			<? if ($arParams["IS_SUBSECTION"] !== "Y"): ?>
			</div>
		<? endif; ?>
	</section>
<? endif; ?>