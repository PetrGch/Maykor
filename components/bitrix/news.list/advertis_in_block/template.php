<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?//echo '<pre>'; print_r($arResult); echo '<pre>';?>
<?if (count($arResult["ITEMS"]) != 0):?>
<div class="adv-block">
	<div class="dia-border tr"></div>

	<div class="right-block bordered">

		<?foreach($arResult["ITEMS"] as $arItem):?>
			<div class="adv">
				<a href="<?=$arItem['PROPERTIES']['BANNER_LINK']['VALUE'];?>">
				<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
						<img
								border="0"
								src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
								width="100%"
								height="auto"
								alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
								title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
								/>
				<?endif?>
				</a>
			</div>
		<?endforeach;?>
	
	</div>

	<div class="dia-border br"></div>
</div>
<?endif;?>