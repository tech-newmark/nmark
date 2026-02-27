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
	<section class="base-section top-banners">
		<div class="container">
			<div class="base-section__header">
				<h2 class="base-section__headline">
					<?= $arResult['NAME'] ?>
				</h2>
			</div>
			<div class="swiper autofill-slider">
				<div class="swiper-wrapper">
					<? foreach ($arResult["ITEMS"] as $arItem): ?>
						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>
						<div class="swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
							<div class="grid">
								<div class="grid-item grid-item--content">
									<h3 class="base-title"><?= $arItem["~NAME"] ?></h3>
									</h3>
									<? if ($arItem["PROPERTIES"]["SERVICES"]["VALUE"] || $arItem["PREVIEW_TEXT"]): ?>
										<div class="content">
											<? if ($arItem["PROPERTIES"]["SERVICES"]["VALUE"]): ?>
												<ul>
													<? foreach ($arItem["PROPERTIES"]["SERVICES"]["VALUE"] as $arService): ?>
														<li><?= $arService ?></li>
													<? endforeach; ?>
												</ul>
											<? endif; ?>
											<? if ($arItem["PREVIEW_TEXT"]): ?>
												<div>
													<?= $arItem["PREVIEW_TEXT"] ?>
												</div>
											<? endif; ?>
										</div>
									<? endif; ?>
									<a href="#">Читать подробнее
										<svg width="16" height="16" viewBox="0 0 16 16" role="img" aria-hidden="true" focusable="false">
											<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/sprite.svg#icon-arrow"></use>
										</svg>
									</a>
								</div>
								<div class="grid-item grid-item--img">
									<div>
										<? if ($arItem["PREVIEW_PICTURE"]["SRC"]): ?>
											<img class="top-banners__item-img" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="" width="708" height="500">
										<? endif; ?>
									</div>
								</div>
								<div class="grid-item grid-item--metric">
									<? if ($arItem["PROPERTIES"]["METRICS"]["VALUE"]): ?>
										<div class="animated-border">
											<ul>
												<? foreach ($arItem["PROPERTIES"]["METRICS"]["VALUE"] as $arMetric): ?>
													<li>
														<div aria-hidden="true">
															<img src="<?= CFile::GetPath($arMetric["SUB_VALUES"]["METRICS_VALUE"]["VALUE"]) ?>" alt="" width="48" height="48">
														</div>
														<div>
															<?= $arMetric["SUB_VALUES"]["METRICS_NAME"]["~VALUE"]; ?>
														</div>
													</li>
												<? endforeach; ?>
											</ul>
										</div>
									<? endif; ?>
								</div>
							</div>
						</div>
					<? endforeach; ?>
				</div>
			</div>
		</div>
	</section>
<? endif; ?>