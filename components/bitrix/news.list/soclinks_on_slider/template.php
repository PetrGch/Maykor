<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<script src="<?=SITE_TEMPLATE_PATH?>/js/devs/social.js"></script>

<div class="soc-slider">

<?$count = count($arResult["ITEMS"]);?>
<?for($i=0;$i<=$count;$i++):
	$arItem = $arResult["ITEMS"][$i];

	switch ($arItem['ID']){
		case '7' :
			$onclick = "Share('vk', true)";
			break;
		case '48' :
			$onclick = "Share('fb', true)";
			break;
		case '49' :
			$onclick = "Share('tw', true)";
			break;
		case '46':
			$onclick = "Share('in', true)";
			break;
		case '99':
			$onclick = "Share('pi', true)";
			break;
		default:
			$href = 'href="'.$arItem["PROPERTIES"]["URL"]["VALUE"].'"';
			break;
	}

	?>
		<a onclick="<?=$onclick;?>" <?=$href;?>>
			<img
				border="0"
				src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>"
				alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arItem["PREVIEW_TEXT"];?>"
				/>
		</a>
<?endfor;?>
	
</div>
