<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->SetTitle($arResult["NAME"]);?>


<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
	<div class="date-ind m30"><?=ShowMyDate($arResult["DISPLAY_ACTIVE_FROM"]);?></div>
<?endif;?>

<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
	<div class="gy l m20"><?=$arResult["NAME"];?></div>
<?endif;?>

<div class="m30 active-content" data-id="<?=$arResult['ID'];?>">
	<?=$arResult["FIELDS"]["DETAIL_TEXT"];?>
</div>	

<div class="BEHOLD">
	Самые яркие и значимые события в жизни MAYKOR отслеживайте на 
	<a href="https://www.facebook.com/MAYKOR.official" target="_blank">Facebook</a>, 
	<a href="https://www.linkedin.com/company/maykor/" target="_blank">Linkedin</a>
</div>

	<div class="m30">
	<?global $foto_filter;
	$foto_filter = array('PROPERTY_EVENT_LINK' => $arResult['ID']);
	//фотоотчеты
				$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"photos",
					Array(
						"IBLOCK_TYPE" => "content",
						"IBLOCK_ID" => "32",
						"NEWS_COUNT" => "8",
						"SORT_BY1" => "ACTIVE_FROM",
						"SORT_ORDER1" => "DESC",
						"SORT_BY2" => "SORT",
						"SORT_ORDER2" => "ASC",
						"FILTER_NAME" => "foto_filter",
						"FIELD_CODE" => array(0=>"",1=>"",),
						"PROPERTY_CODE" => array("MEDIA_FILE", "MEDIA_ENG_TEXT"),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_SHADOW" => "Y",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N",
						"CACHE_TYPE" => "N",
						"CACHE_TIME" => "36000000",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "",
						"DISPLAY_PANEL" => "N",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "Y",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"PARENT_SECTION_CODE" => "",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_OPTION_ADDITIONAL" => ""
					)
				);?>
	</div>