<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
	<?//echo '<pre>'; print_r($arResult); echo '<pre>';?>
	<?switch ($arResult['IBLOCK_CODE']){
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
				<a class="my_fancy a-bolder m bk" id="<?=$arFile['ID'];?>" href="<?=$arFile['SRC'];?>" title="<?=$arFile['ORIGINAL_NAME'];?>" data-img="http://<?=$_SERVER['SERVER_NAME'];?><?=$arFile['SRC'];?>" data-title="<?=$arResult["NAME"];?>"></a>
			<?	
			}
			?>
			</div>
			<script>initMagnific('#<?=$arResult[ID];?>', '<?=$arEvent[CODE];?>');</script>
			<?$mat_type = 'PHOTO_REPORT';
			$title = $arResult["NAME"];
			$link = 'data-id="'.$arResult['ID'].'"';
			$class = 'photo a-bolder m bk';
			$icon_class="";
			break;
		
		case 'present':
			$arFile = CFile::GetFileArray($arResult['PROPERTIES']['MEDIA_FILE']['VALUE']);
			$title = $arResult["NAME"];
			$link = 'href="/viewer/'.str_replace('iblock/', '', $arFile['SUBDIR']).'/'.$arFile['FILE_NAME'].'" target="_blank"';
			$mat_type = 'PRESENTATION';
			$download_link = $arFile[SRC];
			$size = round($arFile['FILE_SIZE']/1048576, 1);
			$class = 'a-bolder m bk';
			$icon_class="i-pdf";	
		break;

		case 'video':
			$arFile = CFile::GetFileArray($arResult['PROPERTIES']['MEDIA_FILE']['VALUE']);
			$title = $arResult["NAME"];
			$link = 'data-href="/about/mediaplayer.php?path='.str_replace(' ', '%20', $arFile['SRC']).'&ID='.$arResult['ID'].'" onclick="initVideo($(this));"';
			$mat_type = 'VIDEO';
			$download_link = $arFile[SRC];
			$class = 'a-bolder m bk';
			$icon_class="i-vid";
			break;
	}
	?>

	<div class="r-header">
		<a href="/about/medialibrary/">Материалы</a>
	</div>

	<?if ($icon_class == 'i-vid'):?>
		<a class="a-togreen bk HTMLvid material" href="http://<?=$_SERVER['SERVER_NAME'];?><?=$arFile[SRC];?>">
			<div class="preview">
			<img
				class="preview_picture"
				border="0"
				src="<?=SITE_TEMPLATE_PATH?>/images/i-pdf.png"
				/>
			</div>
		</a>
	<? endif ;?>

	<a class="<?=$class;?> material" data-code="<?=$arResult['CODE'];?>" <?=$link;?> title="<?=$title;?>">
		<div class="preview">
			<img
				style = "width: 109px"
				class="preview_picture"
				border="0"
				src="<?=SITE_TEMPLATE_PATH?>/images/i-pdf.png"
			/>
		</div>

		<?=$arResult['NAME'];?>
	</a>

	<div class="r-all">
		<a href="/about/medialibrary/" class="a-green">Все материалы</a>
	</div>
