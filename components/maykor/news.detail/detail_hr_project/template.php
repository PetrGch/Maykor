<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-detail">
	

		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
			<img
				border="0"
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				width="50%"
				height="auto"
				style="float: left; margin: 0 10px 10px;0"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
				/>
		<?endif?>
		
		<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
			<div class="date-ind"><?=ShowMyDate($arResult["DISPLAY_ACTIVE_FROM"]);?></div>
		<?endif;?>

		<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
			<div class="gy l"><?=$arResult["NAME"];?></div>
		<?endif;?>

		<div class="m10">
			<?=$arResult["FIELDS"]["PREVIEW_TEXT"];?>
		</div>

		<div class="m10">
			<?=$arResult["FIELDS"]["DETAIL_TEXT"];?>
		</div>

		<div class="clear"></div>

</div>
