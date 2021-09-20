<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<div class="wrapper-news">
<?php foreach ($arResult['ITEMS'] as $arItem): ?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$temporary = $arItem["~TIMESTAMP_X"];
	preg_match('#\d\d.\d\d.\d\d\d\d#', $temporary, $matches);
	$date = $matches[0];
	?>
		<div class="eachNewzz" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<h2><?= $arItem['NAME'] ?></h2>
			<div class="general">
				<img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="">
				<p><?= $arItem['PREVIEW_TEXT'] ?></p>
			</div>
			<div class="time"><?= $date ?></div>
	    </div>
	
<? endforeach; ?>
</div>
