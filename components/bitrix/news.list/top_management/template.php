<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<div class="page-header wgy"><?=GetMessage('TITLE_TOP_MANAGEMENT');?></div>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<a class="a-togreen gy" href="<?=str_replace($_SERVER['SERVER_NAME'], '', $APPLICATION->GetCurPage()).$arItem['CODE'];?>/">
	<div class="person" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		
		<div class="photo" style="background: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)">
			<img
				class="preview_picture"
				border="0"
				src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
				width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
				height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
				alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
				title="<?=$arItem["NAME"];?>"
				style="float:left"
			/>
		</div>
		<div class="l"><?=$arItem["NAME"];?></div>
		<div><i><?=$arItem["PROPERTIES"]["TOP_POST"]["VALUE"];?></i></div>
			
	</div>
	</a>

<?endforeach;?>

<div class="clear"></div>