<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->SetTitle($arResult["NAME"]);?>
<div class="news-detail m30">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="50%"
			height="auto"
			float: "left"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif;?>

		<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
			<div class="date-ind"><?=ShowMyDate($arResult["DISPLAY_ACTIVE_FROM"]);?></div>
		<?endif;?>

		<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
			<div class="gy l m20"><?=$arResult["NAME"];?></div>
		<?endif;?>

		<div class="m30">
			<?=$arResult["FIELDS"]["DETAIL_TEXT"];?>
		</div>

		<div class="BEHOLD">
			Самые яркие и значимые события в жизни MAYKOR отслеживайте на 
			<a href="https://www.facebook.com/MAYKOR.official" target="_blank">Facebook</a>, 
			<a href="https://www.linkedin.com/company/maykor/" target="_blank">Linkedin</a>
		</div>

		<div class="clear"></div>
</div>
