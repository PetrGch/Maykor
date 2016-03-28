<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<form action="<?=$arResult["FORM_ACTION"]?>">
	<input class="search-box" type="text" name="q" />
	<input class="search-button" type="submit" name="s" id="search-submit-button" value="" onfocus="this.blur()" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/search.png);" />
</form>