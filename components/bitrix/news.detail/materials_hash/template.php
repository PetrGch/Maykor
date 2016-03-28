<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

	<div class="mat-list">
		<?//echo '<pre>'; print_r($arResult); echo '<pre>';?>
		<?switch ($arResult['IBLOCK_CODE']){
			case 'present':
				$arFile = CFile::GetFileArray($arResult['PROPERTIES']['MEDIA_FILE']['VALUE']);
				$title = $arResult["NAME"];
				$link = 'href="#pdf_content"'.
						'data-src="http://'.$_SERVER['SERVER_NAME'].$arFile['SRC'].'"'.
						'data-id="'.        $arResult['ID']                       .'"'.
						'data-img="'.       $arResult['PREVIEW_PICTURE']['SRC']   .'"'.
						'data-text="'.      HTMLToTxt($arResult['PREVIEW_TEXT'])  .'"'.
						'data-service="'.   $arParams['SERVICE']                  .'"'.
						'data-branch="'.    $arParams['BRANCH']                   .'"';

				$mat_type = 'PRESENTATION';
				$download_link = $arFile[SRC];
				$size = round($arFile['FILE_SIZE']/1048576, 1);
				$class = 'a-togreen gy pdf-view';
				$icon_class = "i-pdf";
				break;

			case 'video':
				$arFile = CFile::GetFileArray($arResult['PROPERTIES']['MEDIA_FILE']['VALUE']);
				$title = $arResult["NAME"];
				$link = 'data-href="/about/mediaplayer.php?path='.str_replace(' ', '%20', $arFile['SRC']).'&ID='.$arResult['ID'].'&service='.$arParams['SERVICE'].'&branch='.$arParams['BRANCH'].'" onclick="initVideo($(this));"';
				$mat_type = 'VIDEO';
				$download_link = $arFile[SRC];
				$size = round($arFile['FILE_SIZE']/1048576, 1);
				$class = 'a-togreen bk material hash-video';
				$icon_class="i-vid";
				break;
		}
		?>
		<a class="<?=$class;?>" <?=$link;?> data-code="<?=$arResult['CODE'];?>" title="<?=$title;?>">
			<div class="mat-head"><?=GetMessage('MATERIALS_TYPE_'.$mat_type);?></div>
			<div class="preview">
				<div class="<?=$icon_class;?>"></div>
				<img class="bord-grad" src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>"  alt="" />
			</div>
		</a>
	</div>

	<script type="text/javascript">
		$(document).on('ready', function(){
			$('.hash-video').click();
		});
	</script>
	