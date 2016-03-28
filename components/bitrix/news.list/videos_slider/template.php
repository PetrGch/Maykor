<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div class="c_arrow_left rec-arr h-s-right on" dir="-"></div>

<div class="hidden">

	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?$arFile = CFile::GetFileArray($arItem['PROPERTIES']['MEDIA_FILE']['VALUE']);?>

		<div class="mat-list rec-it">
			<a class="a-togreen bk" data-code="<?=$arItem['CODE'];?>" data-href="/about/mediaplayer.php?path=<?=str_replace(' ', '%20', $arFile['SRC']);?>&ID=<?=$arItem['ID'];?>&branch=<?=$_REQUEST['branch'];?>&service=<?=$_REQUEST['service'];?>" title="<?=$arItem['NAME'];?>" onclick="initVideo($(this));">
				<div class="preview">
					<div class="i-vid"></div>
					<img
						class="preview_picture"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					/>
				</div>
			</a>
		</div>

	<?endforeach;?>

</div>

<div class="ach-list">
	<div class="falcrum"></div>
</div>

<div class="c_arrow_right rec-arr h-s-right on" dir="+"></div>
<div class="clear"></div>

<script>
	initRecSlider()
</script>


