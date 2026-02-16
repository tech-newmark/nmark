<? global $stylesIncluded;

if (!isset($stylesIncluded['base-card']))
    echo '<link rel="stylesheet" href="/local/templates/nmark/site-blocks/partials/base-card/style.css">';
$stylesIncluded['base-card'] = true;
?>

<div class="base-card">
    <p class="base-card__name"><?= $arItem['NAME'] ?></p>
    <p class="base-card__desc">
        <strong class="strong"><?= $arItem['PREVIEW_TEXT'] ?></strong>
        <?= $arItem['DETAIL_TEXT'] ?>
    </p>
</div>