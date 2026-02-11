<? global $stylesIncluded;

if (!isset($stylesIncluded['base-card']))
    echo '<link rel="stylesheet" href="/local/templates/nmark/site-blocks/partials/base-card/style.css">';
$stylesIncluded['base-card'] = true;
?>

<div class="base-card">
    <span class="base-card__name"><?= $arItem['NAME'] ?></span>
    <span class="base-card__value"><strong class="strong"><?= $arItem['PREVIEW_TEXT'] ?></strong></span>
    <span class="base-card__desc"><?= $arItem['DETAIL_TEXT'] ?></span>
</div>