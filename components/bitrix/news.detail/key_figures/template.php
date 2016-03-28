<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div class="page-header wgy"><?=$arResult["NAME"];?></div>

<div class="key-index">
	<img class="w100" src="background-image: url(<?=$arResult["DETAIL_PICTURE"]["SRC"];?>)" />
	<div>
		<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
			<?=$arResult["DETAIL_TEXT"];?>
		<?else:?>
			<?echo $arResult["PREVIEW_TEXT"];?>
		<?endif?>
	</div>
</div>