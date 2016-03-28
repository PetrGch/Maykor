<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
	<div class="mat-list">
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
				<script>initMagnific('#<?=$arResult[ID];?>', "<?=$arEvent['CODE'];?>");</script>
				<?$mat_type = 'PHOTO_REPORT';
				$title = $arResult["NAME"];
				$link = 'data-id="'.$arResult['ID'].'"';
				$class = 'photo a-togreen gy';
				$icon_class="";
				break;
			
			case 'present':
				$arFile = CFile::GetFileArray($arResult['PROPERTIES']['MEDIA_FILE']['VALUE']);
				$title = $arResult["NAME"];
				$link = 'href="/viewer/'.str_replace('iblock/', '', $arFile['SUBDIR']).'/'.$arFile['FILE_NAME'].'" target="_blank"';

				$mat_type = 'PRESENTATION';
				$download_link = $arFile[SRC];
				$size = round($arFile['FILE_SIZE']/1048576, 1);
				$class = 'a-togreen gy';
				$icon_class = "i-pdf";
				break;

			case 'video':
				$arFile = CFile::GetFileArray($arResult['PROPERTIES']['MEDIA_FILE']['VALUE']);
				$title = $arResult["NAME"];
				$link = 'data-href="/about/mediaplayer.php?path='.str_replace(' ', '%20', $arFile['SRC']).'&ID='.$arResult['ID'].'&service='.$arParams['SERVICE'].'&branch='.$arParams['BRANCH'].'" onclick="initVideo($(this));"';
				$mat_type = 'VIDEO';
				$download_link = $arFile[SRC];
				$class = 'a-togreen gy material';
				$icon_class = "i-vid";
				$noHTML_class = "notHTMLvid";
				break;
		}
		if ($icon_class == 'i-vid'): ?>
			<a class="a-togreen bk HTMLvid material" href="http://<?=$_SERVER['SERVER_NAME'];?><?=$arFile[SRC];?>">
				<div class="mat-head">
					<?=$arResult['NAME'];?>
				</div>
				<div class="preview">
					<div class="<?=$icon_class;?>"></div>
					<img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>"  alt="" />
				</div>
			</a>
		<?endif;?>

		<a class="<?=$class;?> <?=$noHTML_class;?>" <?=$link;?> title="<?=$title;?>" data-code="<?=$arResult['CODE'];?>">
			<div class="mat-head"><?=$arResult['NAME'];?></div>
			<div class="preview">
				<div class="<?=$icon_class;?>"></div>
				<img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>"  alt="" />
			</div>
		</a>

		<div class="txt">
			<?=$arResult['PREVIEW_TEXT'];?>
		</div>

		<div class="m5">	
			<?if ($mat_type == 'PRESENTATION'):?>
				<a class="a-green" <?=$link;?>><?=GetMessage("DOWNLOAD");?> (PDF <?=$size;?>Mb)</a>
			<?endif;?>
		</div>
	</div>
