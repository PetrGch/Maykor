<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

	<h1>Закупки</h1>

<?if (!empty($arResult)):?>
<ul>

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1 || empty($arItem["LINK"]))
		continue;
?>
	<?
	if (!empty($arItem["SELECTED"])){
		$selected = ($arItem["LINK"] == "/about/zakupki/" && $APPLICATION->GetCurPage() != "/about/zakupki/") ? false : true;
	}
	else{
		$selected = false;
	}
	?>

	<?if($selected):?>
		<li><a href="<?=(!empty($arItem["LINK"])) ? $arItem["LINK"] : "";?>" class="selected"><?=(!empty($arItem["TEXT"])) ? $arItem["TEXT"] : "";?></a></li>
	<?else:?>
		<li><a href="<?=(!empty($arItem["LINK"])) ? $arItem["LINK"] : "";?>"><?=(!empty($arItem["TEXT"])) ? $arItem["TEXT"] : "";?></a></li>
	<?endif?>
	
<?endforeach?>

</ul>
<?endif?>