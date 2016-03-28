<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<?//=$arResult['IBLOCK']['NAME'];?>
<?//echo '<pre>'; print_r($arResult); echo '<pre>';?>
<div class="person-detailed">
	
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["PREVIEW_PICTURE"])):?>
	<div class="photo">
		<img
			border="0"
			src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>"
			width="100%"
			height="100%"
			alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
			title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
			/>
	</div>
	<?endif?>


	<div class="text">
		<div class="xl gy"><?=$arResult['NAME'];?></div>
		<div class="m gy"><i><?=$arResult['PROPERTIES']['TOP_POST']['VALUE'];?></i></div>

		<div class="m10">
			<?=$arResult["PREVIEW_TEXT"];?>
		</div>

		<div class="m10">
			<?=$arResult["DETAIL_TEXT"];?>
		</div>
	</div>
</div>

<div class="clear"></div>

<div class="detailed-materials">
	<?if(!empty($arResult['PROPERTIES']['TOP_PRESS_ANONS']['VALUE'])):?>
		<?foreach($arResult['PROPERTIES']['TOP_PRESS_ANONS']['VALUE'] as $anonsID):?>
			<?$arAnons = CIBLockElement::GetByID($anonsID)->GetNext();?>
			<?$arFile = CFile::GetFileArray($arAnons['PREVIEW_PICTURE']);?>
			<div>
				<a class="gy a-togreen" href="" title="<?=$arFile['ORIGINAL_NAME'];?>">
					<img src="<?=$arFile['SRC'];?>"  alt="" />
					<?=$arAnons['NAME'];?>
				</a>
			</div>
		<?endforeach;?>
	<?endif;?>

	<?if(!empty($arResult['PROPERTIES']['TOP_VIDEO']['VALUE'])):?>
		<?foreach($arResult['PROPERTIES']['TOP_VIDEO']['VALUE'] as $fileID):?>
			<?$arFile = CFile::GetFileArray($fileID);?>
			<div>

				<a class="gy a-togreen" class="various fancybox.ajax material" data-code="<?=$fileID;?>" href="/about/mediaplayer.php?path=<?=$arFile['SRC'];?>" title="<?=$arFile['ORIGINAL_NAME'];?>">
					<div class="preview">
						<div class="i-vid"></div>
						<img src="<?=SITE_TEMPLATE_PATH;?>/images/video_icon.png"  alt="" />
					</div>
					<?=$arFile['ORIGINAL_NAME'];?>

				</a>
			</div>

			
		<?endforeach;?>
	<?endif;?>

	<?if(!empty($arResult['PROPERTIES']['TOP_INTERVIEW']['VALUE'])):?>
		<?$arFile = CFile::GetFileArray($arResult['PROPERTIES']['TOP_INTERVIEW']['VALUE']);?>
		<?$src = GetImageToPDF($arFile['ID'], $arFile['SRC']);?>
		<div>

			<a class="gy a-togreen material" data-code="<?=$arResult['PROPERTIES']['TOP_INTERVIEW']['VALUE'];?>" href="<?=$arFile['SRC'];?>" target="_blank">
				<div class="preview">
					<div class="i-pdf"></div>
					<img src="<?=$src;?>"  alt="" />
				</div>

				<?=$arFile['ORIGINAL_NAME'];?>
			</a>
		</div>
	<?endif;?>
</div>

<?$arPage = $arResult;?>