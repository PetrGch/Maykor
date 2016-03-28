<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
global $foto_filter;
?>

<?foreach($arResult["ITEMS"] as $arItem):

	if (!empty($arItem['PROPERTIES']['EVENT_LINK']['VALUE'])){
		$arEvent = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 7, 'ID' => $arItem['PROPERTIES']['EVENT_LINK']['VALUE']), false, false, array('ID', 'NAME', 'CODE'))->Fetch();
	}
	else{
		$arEvent['CODE'] = '';
	}
	$arFile = CFile::GetFileArray($arItem['PROPERTIES']['MEDIA_FILE']['VALUE'][0]);?>

	<div class="mat-list">
		<a class="a-togreen gy photo" data-id="<?=$arItem['ID'];?>" title="">
			<div class="mat-head"><?=$arItem["NAME"];?></div>
			<div class="preview">
				<img
					class="preview_picture"
					border="0"
					src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>"
					title="<?=$arItem["NAME"];?>"
				/>
			</div>
		</a>
			
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div class="txt">
					<?=$arItem["PREVIEW_TEXT"];?>
				</div>
			<?endif;?>

			<?i/*f($APPLICATION->GetCurPage(true) != '/about/medialibrary/index.php'):?>
				<div class="m5">
					<a href="/press/activity/<?=$arItem['PROPERTIES']['EVENT_LINK']['VALUE'];?>/" class="a-green">Подробнее</a>
				</div>
			<?endif;*/?>

			<div class="hidden popup-gallery" id="<?=$arItem['ID'];?>">
				<?foreach($arItem['PROPERTIES']['MEDIA_FILE']['VALUE'] as $key => $img):?>
					<?$arIMG = CFile::GetFileArray($img);?>
					<a class="my_fancy a-togreen gy source" id="<?=$img;?>" data-img="http://<?=$_SERVER['SERVER_NAME'];?><?=$arIMG['SRC'];?>" href="<?=$arIMG['SRC'];?>" data-title="<?=$arItem["NAME"];?>"></a>
				<?endforeach;?>
			</div>
			<script type="text/javascript">
				initMagnific("#<?=$arItem['ID'];?>", "<?=$arEvent['CODE'];?>");
			</script>
	</div>

<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<div class="pages m20 m">
		<?=$arResult["NAV_STRING"]?>
	</div>
<?endif;?>

<div class="clear"></div>

<script>calcSideBar();</script>
