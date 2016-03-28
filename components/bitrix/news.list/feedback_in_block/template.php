<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?if (count($arResult["ITEMS"]) != 0):?>
<div class="opt-block">

	<div class="r-header">
		<a href="/clients/responses/">Отзывы</a>
	</div>

	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	/*if (!($companyID = $arItem['PROPERTIES']['FEEDBACK_CP']['VALUE']))
		$companyID = $arItem['PROPERTIES']['FEEDBACK_CP']['VALUE'];
	$company = CIBlockElement::GetByID($companyID)->Fetch();*/
	$companyID = $arItem['PROPERTIES']['FEEDBACK_CP']['VALUE'];
	$company = CIBlockElement::GetByID($companyID)->Fetch();
	?>

		<img
			class="preview_picture"
			border="0"
			src="<?=SITE_TEMPLATE_PATH?>/images/i-comments.png"
			/>
		<div class="r-comment">
			<a href="/clients/responses/<?=$company['CODE'];?>" class="a-quote"><?=$arItem['PREVIEW_TEXT'];?></a>
			<div class="r-author">
				<b><?=$arItem['NAME'];?></b>
				<br />
				<?=$arItem['PROPERTIES']['FEEDBACK_ROLE']['VALUE'];?>
			</div>
		</div>
	<?endforeach;?>
	<div class="r-all">
		<a href="/clients/responses/" class="a-green">Все отзывы</a>
	</div>
	
</div>
<?endif;?>