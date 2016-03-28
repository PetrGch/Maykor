<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<?foreach($arResult["ITEMS"] as $arItem):?>
<?$file = CFile::GetFileArray($arItem['PROPERTIES']['STATEMENT_FILE']['VALUE']);?>

<div class="fin">
	<a href="<?=$file['SRC'];?>" target="_blank" class="a-togreen gy">

		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div class="preview">
				<div class="i-pdf"></div>
				<img
					border="0"
					src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					width="100%"
					height="auto"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
				/>
			</div>
		<?endif?>

		<div class="m10">
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<?=$arItem["NAME"];?>
				<?else:?>
					<?echo $arItem["NAME"]?>
				<?endif;?>
			<?endif;?>
		</div>
	</a>
</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
