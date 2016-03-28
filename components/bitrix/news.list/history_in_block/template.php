<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?if (count($arResult["ITEMS"]) != 0):?>
<div class="opt-block">

	<div class="r-header" style="white-space: nowrap">
		<a href="/clients/stories/"><?=GetMessage("TITLE_SUCCES_HISTORY");?></a>
	</div>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<a href="/viewer/<?=str_replace('iblock/', '', $arItem["DISPLAY_PROPERTIES"]['HISTORY_FILE']['FILE_VALUE']['SUBDIR']).'/'.$arItem["DISPLAY_PROPERTIES"]['HISTORY_FILE']['FILE_VALUE']['FILE_NAME'];?>" class="a-bolder m bk" target="blank">
			<img
				class="preview_picture"
				border="0"
				src="<?=SITE_TEMPLATE_PATH?>/images/i-story.png"
			/>
		</a>
		<a href="/viewer/<?=str_replace('iblock/', '', $arItem["DISPLAY_PROPERTIES"]['HISTORY_FILE']['FILE_VALUE']['SUBDIR']).'/'.$arItem["DISPLAY_PROPERTIES"]['HISTORY_FILE']['FILE_VALUE']['FILE_NAME'];?>" class="a-quote" target="blank"><?=trim($arItem['DETAIL_TEXT']);?></a>
	<?endforeach;?>
	<div class="r-all">
		<a href="/clients/stories/" class="a-green">Все истории</a>
	</div>

</div>
<?endif;?>							