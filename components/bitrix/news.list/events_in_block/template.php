<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?if (count($arResult["ITEMS"]) != 0):?>
<div class="opt-block">

	<div class="r-header">
		<a href="#">Мероприятия</a>
	</div>
	<?foreach($arResult["ITEMS"] as $arItem):?>
						<img
							class="preview_picture"
							border="0"
							src="<?=SITE_TEMPLATE_PATH?>/images/i-actions.png"
							/>

			<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
				<div class="date-ind"><?=ShowMyDate($arItem["DISPLAY_ACTIVE_FROM"]);?></div>
			<?endif?>
			<a href="<?=$arItem["DETAIL_PAGE_URL"];?><?=$arItem['CODE'];?>/" class="a-bolder m bk">
				<?=$arItem["NAME"];?>
			</a>

	<?endforeach;?>
	<div class="r-all">
		<a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="a-green">Все мероприятия</a>
	</div>

</div>
<?endif;?>