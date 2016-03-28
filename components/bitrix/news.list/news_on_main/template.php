<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div class="news-subscribe-ind">
	<a class="a-green" href="https://www.facebook.com/MAYKOR.official" target="_blank"><?=GetMessage("SUBSCRIBE");?></a>
</div>
<div class="section-header-ind"><a class="a-togreen gy" href="<?=$arResult["ITEMS"][0]["DETAIL_PAGE_URL"];?>"><?=GetMessage('NEWS_TITLE_ON_MAIN');?></a></div>

<?foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	
	<?if ($key == 0 || $key == 3):?>
	<div class="<?=($key == 0) ? 'left-news' : 'right-news';?> half-news">
	<?endif;?>

		<div class="news-item-ind" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

			<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
				<span class="date-ind">
					<?=ShowMyDateMin($arItem["DISPLAY_ACTIVE_FROM"]);?>
				</span>
			<?endif?>

			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<a class="a-togreen m bk" href="<?=$arItem["DETAIL_PAGE_URL"];?><?=$arItem["CODE"];?>/">
					<?=$arItem["NAME"];?>
				</a>
			<?endif;?>

		</div>

	<?if ($key == 2 || $key == 5):?>
	</div>
	<?endif;?>

<?endforeach;?>