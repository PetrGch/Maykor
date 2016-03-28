<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<?//=$arResult['IBLOCK']['NAME'];?>
<?//echo '<pre>'; print_r($arResult); echo '<pre>';?>
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>
	<div class="page-text">
	<?=$arResult["DETAIL_TEXT"];?>
	</div>

<div class="pdf-block">
	<?if (!empty($arResult['PROPERTIES']['ABOUT_FILE']['VALUE'])):?>
		<?$arFile = CFile::GetFileArray($arResult['PROPERTIES']['ABOUT_FILE']['VALUE']);?>
		<?$filesize = round($arFile['FILE_SIZE']/1048576, 1);?>
		<img src="<?=SITE_TEMPLATE_PATH?>/images/pdf.png">
		<div>
			<div class="text"><?=GetMessage("ETIC_CODEX");?></div>
			<a class="a-green" href="<?=$arFile['SRC'];?>" download><?=GetMessage("DOWNLOAD");?> (PDF <?=$filesize;?>Mb)</a>
		</div>
	<?endif;?>
</div>

<div class="clear"></div>