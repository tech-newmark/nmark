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

<div class="base-card">
	<p class="base-card__name"><?= $arResult['NAME'] ?></p>
	<? if ($arResult['PREVIEW_TEXT']) : ?>
		<p class="base-card__desc"><?= $arResult['PREVIEW_TEXT'] ?></p>
	<? endif; ?>
</div>