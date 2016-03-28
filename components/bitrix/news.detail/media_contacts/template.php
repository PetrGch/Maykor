<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<div class="w80 m">

	<?=$arResult['DETAIL_TEXT'];?>

	<div class="pdf-block">
		<?$arFile = CFile::GetFileArray($arResult['PROPERTIES']['PAGE_FILE']['VALUE']);?>
		<?$filesize = round($arFile['FILE_SIZE']/1048576, 1);?>
		<img src="<?=SITE_TEMPLATE_PATH?>/images/pdf.png">
		<div>
			<div class="text"><?=GetMessage("PRESS_KIT");?></div>
			<a class="a-green s" href="<?=$arFile['SRC'];?>" download><?=GetMessage("FEEDBACK_DOWNLOAD");?> (PDF <?=$filesize;?>Mb)</a>
		</div>
	</div>

	<?$arPage = $arResult;?>
</div>