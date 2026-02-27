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
	<section class="base-section price">
		<div class="container">
			<div class="base-section__header">
				<div class="base-section__header-main">
					<span class="base-section__headline">
						<?= $arResult['NAME'] ?>
					</span>
					<h2 class="base-title">
						Наши <b class="strong">тарифные</b> планы
					</h2>
					<? if ($arResult['DESCRIPTION']): ?>
						<p class="base-text"><?= $arResult['DESCRIPTION'] ?></p>
					<? endif; ?>
				</div>
			</div>
			<? if (count($arResult['SECTIONS']) === 2): ?>
				<div class="price__toggle">
					<? foreach ($arResult['SECTIONS'] as $arSection) : ?>
						<span><?= $arSection["NAME"] ?></span>
					<? endforeach; ?>
					<div class="main-toggle-wrapper">
						<label>
							<input type="checkbox">
							<span></span>
						</label>
					</div>
				</div>
			<? endif; ?>
			<div class="swiper atofill-slider">
				<div class="swiper-wrapper">
					<? foreach ($arResult['SECTIONS'] as $i => $arSection) : ?>
						<? foreach ($arSection['ITEMS'] as $index => $arItem): ?>
							<?
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							?>
							<div class="swiper-slide<?= ($index % 2 !== 0) ? ' swiper-slide--odd' : null ?> <?= ($i === 0) ? ' active' : 'visualli-hidden' ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
								<div class="price-card">
									<div class="price-card__content">
										<h3><?= $arItem["NAME"] ?></h3>
										<? if ($arItem["PREVIEW_TEXT"]): ?>
											<div class="content">
												<?= $arItem["PREVIEW_TEXT"] ?>
											</div>
										<? endif; ?>
										<? if ($arItem["PROPERTIES"]["PRICE"]["VALUE"]): ?>
											<b class="strong"><?= $arItem["PROPERTIES"]["PRICE"]["VALUE"] ?></b>
										<? endif; ?>
										<? if ($arItem["DETAIL_TEXT"]): ?>
											<div class="content">
												<?= $arItem["DETAIL_TEXT"] ?>
											</div>
										<? endif; ?>
									</div>
									<button class="main-btn" type="button">Заказать сейчас</button>
								</div>
							</div>
						<? endforeach; ?>
					<? endforeach; ?>
				</div>
			</div>
		</div>
	</section>
<? endif; ?>