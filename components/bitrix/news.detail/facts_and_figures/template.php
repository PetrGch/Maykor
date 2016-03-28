<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<?//=$arResult['IBLOCK']['NAME'];?>
<?//echo '<pre>'; print_r($arResult); echo '<pre>';?>
	<div class="right-contact">
		<?=$arResult["DETAIL_TEXT"];?>
	</div>