<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<div class="inline-form <?= (($arParams['CUSTOM_CLASS']) ? $arParams['CUSTOM_CLASS'] : "") ?>">
	<?= $arResult["FORM_HEADER"] ?>
	<? if ($arResult["FORM_NOTE"]): ?>
		<div class="inline-form__note">
			<div class="base-title"><b class="strong">Спасибо!</b></div>
			<div class="base-text">Мы скоро свяжемся с вами!</div>
		</div>
	<? else : ?>
		<div class="inline-form__header base-section__header">
			<h2 class="base-title"><?= (($arParams['CUSTOM_TITLE']) ? (htmlspecialcharsback($arParams['CUSTOM_TITLE'])) : "Проверь <b class='strong'>подрядчика</b>") ?></h2>
			<? if (!empty($arResult["FORM_DESCRIPTION"])) : ?>
				<div class="base-text"><?= $arResult["FORM_DESCRIPTION"] ?></div>
			<? endif; ?>
		</div>
		<div class="inline-form__body">
			<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
				<? if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden'): ?>
					<?= $arQuestion["HTML_CODE"]; ?>
				<? endif; ?>
				<? if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "text"): ?>
					<div class="main-input-wrapper <?= ($arResult["FORM_ERRORS"][$FIELD_SID] ? 'invalid-fld' : '') ?>">
						<label>
							<?= $arQuestion["HTML_CODE"] ?>
						</label>
					</div>
				<? endif; ?>
				<? if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "textarea"): ?>
					<div class="main-textarea-wrapper <?= ($arResult["FORM_ERRORS"][$FIELD_SID] ? 'invalid-fld' : '') ?>">
						<label>
							<?= $arQuestion["HTML_CODE"] ?>
						</label>
					</div>
				<? endif; ?>
				<? if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "checkbox"): ?>
					<div class="main-checkbox-wrapper <?= ($arResult["FORM_ERRORS"][$FIELD_SID] ? 'invalid-fld' : '') ?>">
						<input type="checkbox" id="<?= $arQuestion["STRUCTURE"][0]["ID"] ?>" name="form_checkbox_<?= $FIELD_SID ?>[]" value="<?= $arQuestion["STRUCTURE"][0]["ID"] ?>">
						<label class="main-checkbox" for="<?= $arQuestion["STRUCTURE"][0]["ID"] ?>">
							<span><?= $arQuestion["CAPTION"] ?></span>
						</label>
					</div>
				<? endif; ?>
			<? endforeach; ?>

			<? if ($arResult["isUseCaptcha"] == "Y"): ?>
				<div class="captcha-block <?= ($arResult["FORM_ERRORS"][0] ? 'invalid-fld' : '') ?>">
					<input type="hidden" name="captcha_sid" value="<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>" />
					<div class="main-input-wrapper">
						<input type="text" placeholder="Введите символы с картинки" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />
					</div>
					<div class="captcha-block__img-wrapper">
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>" width="180" height="40" alt="" />
					</div>
				</div>
			<? endif; ?>

			<input class="main-btn main-btn--secondary" <?= (intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : ""); ?> type="submit" name="web_form_submit" value="<?= htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]); ?>" />
			<?= $arResult["FORM_FOOTER"] ?>
		</div>
	<? endif; ?>
</div>