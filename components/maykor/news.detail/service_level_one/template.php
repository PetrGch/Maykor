<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div class="page-header wgy"><?=$arResult['NAME'];?></div>

<div class="page-content service-head" data-code="<?=$arResult['CODE'];?>">
	<?=$arResult['DETAIL_TEXT'];?>
</div>
