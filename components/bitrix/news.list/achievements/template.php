<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="ach" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="left-ach">
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<img
							class="bord-grad"
							border="0"
							src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
							alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
							title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
							/>
				<?else:?>
					<img
						class="bord-grad"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
				<?endif;?>
			<?endif?>

		</div>

		<div class="right-ach">
			<?=$arItem['DETAIL_TEXT'];?>
				<?if (!empty($arItem['PROPERTIES']['ACHIEVE_FILE']['VALUE'])):?>
				<div class="pdf-block">
					<?$arFile = CFile::GetFileArray($arItem['PROPERTIES']['ACHIEVE_FILE']['VALUE']);?>
					<?$filesize = round($arFile['FILE_SIZE']/1048576, 1);?>
					<img src="<?=SITE_TEMPLATE_PATH?>/images/pdf.png">
					<div>
						<div class="text"><?=GetMessage("ACHIEVE_PRESENTATION");?></div>
						<a class="a-green" href="<?=$arFile['SRC'];?>" target="_blank"><?=GetMessage("DOWNLOAD");?> (PDF <?=$filesize;?>Mb)</a>
					</div>
				</div>
				<?endif;?>
		</div>
		
		<div class="clear"></div>	
	</div>
	
	
<?endforeach;?>


