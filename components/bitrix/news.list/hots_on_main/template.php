	<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div class="section-header-ind"><a class="a-togreen gy" href="<?=$arResult["ITEMS"][0]["DETAIL_PAGE_URL"];?>"><?=GetMessage('HOTS_TITLE_ON_MAIN');?></a></div>

<?foreach($arResult["ITEMS"] as $arItem):?>

	<div class="hots-topic" id="<?=$this->GetEditAreaId($arItem['ID']);?>">


				<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
					<div class="date-ind"><?=ShowMyDateMin($arItem["DISPLAY_ACTIVE_FROM"]);?></div>
				<?endif?>
				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<a class="a-togreen m bk" href="<?=$arItem["DETAIL_PAGE_URL"];?><?=$arItem["CODE"]?>/">
							<?=$arItem["NAME"];?>
						</a>
					<?else:?>
						<?echo $arItem["NAME"]?>
					<?endif;?>
				<?endif;?>
				<img class="hots-preview" 
					src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
	     	 		title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />

				
				<!--<div class="m5">
					<a class="a-green" href="<?=$arItem["DETAIL_PAGE_URL"];?><?=$arItem["CODE"]?>/"><?=GetMessage('MORE_HOT_TEXT');?></a>
				</div>-->

	</div>
<?endforeach;?>
