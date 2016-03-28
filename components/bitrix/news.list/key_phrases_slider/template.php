<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="slider">
	<?foreach($arResult["ITEMS"] as $arItem):?>

		<div class="slide-item hidden" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<?=(!empty($arItem['PROPERTIES']['SLIDES_LINK_URL']['VALUE'])) ? '<a href="http://'.$_SERVER['SERVER_NAME'].$arItem['PROPERTIES']['SLIDES_LINK_URL']['VALUE'].'" class="a-null">' : '';?>
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
					<img
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="100%"
						height="425"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
						/>
			<?endif?>

			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div class="number"><?=$arItem['PROPERTIES']['FIGURE_PARAMETER']['VALUE'];?></div>
				<div class="text"><?=$arItem["PREVIEW_TEXT"];?></div>
			<?endif;?>
			<?=(!empty($arItem['PROPERTIES']['SLIDES_LINK_URL']['VALUE'])) ? '</a>' : '';?>
		</div>

	<?endforeach;?>

</div>

<div class="dots content">
	<?for($i=1;$i<=count($arResult["ITEMS"]);$i++):?>
		<div class="dot" data-i="<?=$i;?>"></div>
	<?endfor;?>
</div>

<?global $soclinks_filter;
$soclinks_filter = array('PROPERTY_IN_KEY_PHRASES_VALUE' => 'Да', 'ACTIVE' => 'Y');?>
	<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"soclinks_on_slider",
			Array(
				"IBLOCK_TYPE" => "tools",
				"IBLOCK_ID" => "3",
				"NEWS_COUNT" => "3",
				"SORT_BY1" => "SORT",
				"SORT_ORDER1" => "ASC",
				"SORT_BY2" => "ACTIVE_FROM",
				"SORT_ORDER3" => "DESC",
				"FILTER_NAME" => "soclinks_filter",
				"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"",),
				"PROPERTY_CODE" => array(0=>"URL",1=>"",),
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_SHADOW" => "Y",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "N",
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
				"AJAX_OPTION_ADDITIONAL" => "",
				"SLIDE_TITLE" => $arItem['NAME'],
				"SLIDE_IMG" => $arItem["PREVIEW_PICTURE"]["SRC"],
				"SLIDE_TEXT" => $arItem['PROPERTIES']['FIGURE_PARAMETER']['VALUE'].$arItem["PREVIEW_TEXT"],
			)
		);?>