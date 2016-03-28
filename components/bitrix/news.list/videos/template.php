<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<?foreach($arResult["ITEMS"] as $arItem):?>
<?$arFile = CFile::GetFileArray($arItem['PROPERTIES']['MEDIA_FILE']['VALUE']);?>

	<div class="mat-list">
			<a class="a-togreen bk HTMLvid video" data-code="<?=$arItem['CODE'];?>" href="http://<?=$_SERVER['SERVER_NAME'];?><?=str_replace(' ', '%20', $arFile['SRC']);?>" title="<?=$arItem['NAME'];?>" >
				<div class="mat-head">
					<?=$arItem["NAME"];?>
				</div>
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


			<a class="notHTMLvid a-togreen bk" data-code="<?=$arItem['CODE'];?>" data-href="/about/mediaplayer.php?path=<?=str_replace(' ', '%20', $arFile['SRC']);?>&ID=<?=$arItem['ID'];?>&branch=<?=$_REQUEST['branch'];?>&service=<?=$_REQUEST['service'];?>" title="<?=$arItem['NAME'];?>" onclick="initVideo($(this));">
				<div class="mat-head">
					<?=$arItem["NAME"];?>
				</div>
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

			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div class="txt">
					<?=$arItem["PREVIEW_TEXT"];?>
				</div>
			<?endif;?>
	</div>

<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<div class="pages m20 m">
		<?=$arResult["NAV_STRING"]?>
	</div>
<?endif;?>

<div class="clear"></div>

<script>calcSideBar();</script>