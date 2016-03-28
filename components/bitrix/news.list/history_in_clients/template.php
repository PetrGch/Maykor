<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div class="stories m20">

	<?$icon_class = "i-pdf";?>
	<?//echo '<pre>'; print_r($arResult); echo '<pre>';?>
	<?foreach($arResult["ITEMS"] as $arItem):?>

		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>

		<div class="fin">
			<a class="a-null" href="/viewer/<?=str_replace('iblock/', '', $arItem["DISPLAY_PROPERTIES"]['HISTORY_FILE']['FILE_VALUE']['SUBDIR']).'/'.$arItem["DISPLAY_PROPERTIES"]['HISTORY_FILE']['FILE_VALUE']['FILE_NAME'];?><?=(!empty($_REQUEST['branch']) ? '/branch='.$_REQUEST['branch'] : '');?><?=(!empty($_REQUEST['service']) ? '/service='.$_REQUEST['service'] : '');?>" target="_blank">
				<div class="zoom none">
					<div class="zone"></div>
					<div class="inner">
						<div class="<?=$icon_class;?>" style="z-index: 3"></div>
						<div class="c-logo"
							style="background-image: url('<?=$arItem["DISPLAY_PROPERTIES"]["HISTORY_PICTURE"]['FILE_VALUE']["SRC"]?>')"
							alt="<?=$arItem["DISPLAY_PROPERTIES"]["HISTORY_PICTURE"]['FILE_VALUE']["ALT"]?>"
							title="<?=$arItem["DISPLAY_PROPERTIES"]["HISTORY_PICTURE"]['FILE_VALUE']["TITLE"]?>"
							>
						</div>
						<div class="c-back"></div>
						<div class="c-text">
							<?=$arItem["PREVIEW_TEXT"];?>
						</div>
					</div>
					<div align="left" class="a-green  l clear title"><?=$arItem["NAME"];?></div>
				</div>
			</a>
		</div>

	<?endforeach;?>

</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

<?if (!empty($_GET['bxajaxid'])):?>
<script>
	initDDs();
	initZoom();
	calcResize();
	addSelectedDropdown();
</script>
<?else:?>
<script>
	addSelectedDropdown();
</script>
<?endif;?>