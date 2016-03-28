<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?if (count($arResult["ITEMS"]) != 0):?>
<div id="more-slider">
    <b class="xl gn" style="line-height: 40px">Посмотреть похожие материалы:</b>
    <div class="m10 vid-gallery rec-slider">
		<div class="ach-left rec-arr arr-l on" dir="-"></div>
		<div class="hidden">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?if ($arResult['ID'] == 6){
					$fileID = $arItem['PROPERTIES']['HISTORY_FILE']['VALUE'];
					$arImg = $arItem["PREVIEW_PICTURE"];
					$classCont = "suc-suc";
				}
				elseif ($arResult['ID'] == 30){
					$fileID = $arItem['PROPERTIES']['FEEDBACK_FILE']['VALUE'];
					$obElem = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 20, 'ID' => $arItem['PROPERTIES']['FEEDBACK_CP']['VALUE']), false, false, array('ID', 'DETAIL_PICTURE'))->Fetch();
					$arImg = CFile::GetFileArray($obElem['DETAIL_PICTURE']);
					$class = 'white-back';
				}
				else{
					$fileID = $arItem['PROPERTIES']['MEDIA_FILE']['VALUE'];
					$arImg = $arItem["PREVIEW_PICTURE"];
				}

				$arFile = CFile::GetFileArray($fileID);?>

				<div class="mat-list rec-it <?=$classCont;?>">
					<a 
						class=" a-togreen gy" 
						href="/viewer/<?=str_replace('iblock/', '', $arFile['SUBDIR']).'/'.$arFile['FILE_NAME'];?><?=(!empty($arParams['BRANCH']) ? '/branch='.$arParams['BRANCH'] : '');?><?=(!empty($arParams['SERVICE']) ? '/service='.$arParams['SERVICE'] : '');?>"
						title="<?=$arItem['NAME'];?>"
						>
						<div class="preview <?=$class;?>">
							<div class="i-pdf"></div>
							<img
								border="0"
								src="<?=$arImg["SRC"]?>"
								width="<?=$arImg["WIDTH"]?>"
								height="<?=$arImg["HEIGHT"]?>"
								alt="<?=$arImg["ALT"]?>"
								title="<?=$arImg["TITLE"]?>"
							/>

						</div>
					</a>
				</div>
			<?endforeach;?>
		</div>

		<div class="ach-list">
			<div class="falcrum"></div>
		</div>

		<div class="ach-right rec-arr arr-r on" dir="+"></div>
		<div class="clear"></div>

	</div>
</div>	
<?endif?>