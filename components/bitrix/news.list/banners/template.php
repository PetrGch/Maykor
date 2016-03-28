<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div class="dots inn">
	<div class="center">
		<?for($i=1;$i<=count($arResult["ITEMS"]);$i++):?>
			<div class="dot" data-i="<?=$i;?>"></div>
		<?endfor;?>
		<div class="clear"></div>
	</div>
</div>

<div class="slider">

	<?foreach ($arResult['ITEMS'] as $arItem):?>
		<div class="slide-item hidden">
			<img
				class="preview"
				border="0"
				src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
				width="100%"
				height="auto"
				alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
				title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
			/>
		</div>
	<?endforeach;?>

</div>



