<?php 
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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
<?php if ($arParams["FILTER_ON"] == "Y") { ?>
	<h3>Фильтр кастомный</h3>
	<form name="filter_form" method="POST" class="form-filter">
		<?php foreach($arParams["FIELD_CODE"] as $field) { ?>
			<div class="form-div">
				<?php if (!empty($field)) { ?>
					<label><?=$field ?>:</label>
					<input type="string" name="<?=$field ?>">
				<?php } ?>
			</div>
		<?php } ?>
		<input type="submit" name="btn-filter" value="Фильтр" class="btn-fl">
		<input type="submit" name="btn-del" value="Сброс" class="btn-dl">
	</form>
<?php } ?>

<ul>
	<?php foreach($arResult["ITEMS"] as $arItem) { ?>
	<li><?=$arItem["NAME"] ?>
		<p><i>Анонс:</i> <?=$arItem["PREVIEW_TEXT"] ?></p>
		<p><i>Дата создания:</i> <?=$arItem["DATE_CREATE"] ?></p>
	</li>
	<?php } ?>
</ul>