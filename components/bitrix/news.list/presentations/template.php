<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<?foreach($arResult["ITEMS"] as $arItem):?>
<?$arFile = CFile::GetFileArray($arItem['PROPERTIES']['MEDIA_FILE']['VALUE']);?>
	<div class="mat-list">
		<a 
			class=" a-togreen gy" 
			href="/viewer/<?=str_replace('iblock/', '', $arFile['SUBDIR']).'/'.$arFile['FILE_NAME'];?><?=(!empty($arParams['BRANCH']) ? '/branch='.$arParams['BRANCH'] : '');?><?=(!empty($arParams['SERVICE']) ? '/service='.$arParams['SERVICE'] : '');?>"
			title="<?=$arItem['NAME'];?>"
			target="_blank"
			>
			<div class="mat-head">
				<?=$arItem["NAME"];?>
			</div>

			<div class="preview">

				<div class="i-pdf"></div>
				<img
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