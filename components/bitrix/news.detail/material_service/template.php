<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
	<div class="w33">
		<?//echo '<pre>'; print_r($arResult); echo '<pre>';?>
		<?switch ($arResult['IBLOCK_CODE']) {
			case 'photo':
				if (!empty($arResult['PROPERTIES']['EVENT_LINK']['VALUE'])){
					$arEvent = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 7, 'ID' => $arResult['PROPERTIES']['EVENT_LINK']['VALUE']), false, false, array('ID', 'NAME', 'CODE'))->Fetch();
				}
				else{
					$arEvent['CODE'] = '';
				}
				?>
				<div class="hidden popup-gallery" id="<?=$arResult['ID'];?>">
				<?foreach ($arResult['PROPERTIES']['MEDIA_FILE']['VALUE'] as $key => $value){
					$arFile = CFile::GetFileArray($value);?>
					<a class="my_fancy a-togreen gy" id="<?=$arFile['ID'];?>" href="<?=$arFile['SRC'];?>" title="<?=$arFile['ORIGINAL_NAME'];?>" data-img="http://<?=$_SERVER['SERVER_NAME'];?><?=$arFile['SRC'];?>" data-title="<?=$arResult["NAME"];?>"></a>
				<?	
				}
				?>
				</div>
				<script>initMagnific('#<?=$arResult[ID];?>', '$arEvent[CODE]');</script>
				<?$mat_type = 'PHOTO_REPORT';
				$title = $arResult["NAME"];
				$link = 'data-id="'.$arResult['ID'].'"';
				$class = 'photo a-togreen bk';
				$icon_class="";
				break;
			
			case 'present':
				$arFile = CFile::GetFileArray($arResult['PROPERTIES']['MEDIA_FILE']['VALUE']);
				$title = $arResult["NAME"];
				$link = 'href="/viewer/'.str_replace('iblock/', '', $arFile['SUBDIR']).'/'.$arFile['FILE_NAME'].'&service'.$arParams['SERVICE'].'" target="_blank"';
				
				$mat_type = 'PRESENTATION';
				$download_link = $arFile[SRC];
				$size = round($arFile['FILE_SIZE']/1048576, 1);
				$class = 'a-togreen gy';
				$icon_class="i-pdf";
				break;

			case 'video':
				$arFile = CFile::GetFileArray($arResult['PROPERTIES']['MEDIA_FILE']['VALUE']);
				$title = $arResult["NAME"];
				$link = 'data-href="/about/mediaplayer.php?path='.str_replace(' ', '%20', $arFile['SRC']).'&ID='.$arResult['ID'].'&service='.$arParams['SERVICE'].'&branch='.$arParams['BRANCH'].'" onclick="initVideo($(this));"';
				$mat_type = 'VIDEO';
				$download_link = $arFile[SRC];
				$size = round($arFile['FILE_SIZE']/1048576, 1);
				$class = 'a-togreen bk material';
				$icon_class="i-vid";
				break;
		}
		?>
		
		<a class="a-togreen gy" href="/about/medialibrary/" >
			<div class="l gy"><?=mb_strtoupper(GetMessage('NAME_BLOCK_MATERIALS'));?></div>
		</a>

		<?if ($icon_class == 'i-vid'):?>
			<a class="a-togreen bk HTMLvid material" href="http://<?=$_SERVER['SERVER_NAME'];?><?=$arFile[SRC];?>">
				<div class="preview">
				<div class="<?=$icon_class;?>"></div>
				<img
					border="0"
					width= "100%"
					height= "auto"
					src="<?=$arResult['DETAIL_PICTURE']['SRC']?>"
					title="<?=$arResult["NAME"];?>"
				/>
			</div>
			<div class="m10"><?=$arResult["NAME"];?></div>
			</a>
		<? endif ;?>
		
		<a class="<?=$class;?>" <?=$link;?> data-code="<?=$arResult['CODE'];?>" title="<?=$title;?>">
		<div class="m10"></div>
			<div class="preview">
				<div class="<?=$icon_class;?>"></div>
				<img
					border="0"
					width= "100%"
					height= "auto"
					src="<?=$arResult['DETAIL_PICTURE']['SRC']?>"
					title="<?=$arResult["NAME"];?>"
				/>
			</div>
			<div class="m10"><?=$arResult["NAME"];?></div>
		</a>
		<div class="m5">
			<?=$arResult['PREVIEW_TEXT'];?>
		</div>
		<?if ($mat_type == 'PRESENTATION'):?>	
			<a class="a-green" <?=$link;?>><?=GetMessage("DOWNLOAD");?> (PDF <?=$size;?>Mb)</a>
		<?endif;?>
	</div>
