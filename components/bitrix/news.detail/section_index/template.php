<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<?$text = trim($arResult['DETAIL_TEXT']);?>

<?if (!empty($text)):?>

<div>
	<?=$arResult['DETAIL_TEXT'];?>
</div>

<?endif;?>