<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
global $achieve_filter;
?>

<?foreach($arResult["ITEMS"] as $arItem):?>

<div>
	<div hash-id="<?=$arItem['CODE'];?>/" class="page-section-header slide gy xl <?=($arItem['CODE'] == $_GET['CODE']) ? 'opened to-anchor' : 'closed';?>">
		<?=$arItem['NAME'];?>
	</div>

<?//ввод ввод мета свойств
	if ( $arItem['CODE'] == $_GET['CODE'] ){
		$APPLICATION->SetPageProperty("title", $arItem['IPROPERTY_VALUES']['ELEMENT_META_TITLE']);
		$APPLICATION->SetPageProperty("description", $arItem['IPROPERTY_VALUES']['ELEMENT_META_DESCRIPTION']);
		if ( !empty($arItem['IPROPERTY_VALUES']['ELEMENT_META_KEYWORDS']) )
			$APPLICATION->SetPageProperty("keywords", $arItem['IPROPERTY_VALUES']['ELEMENT_META_KEYWORDS']);

		$APPLICATION->AddChainItem($arItem['NAME'], "");
	}
?>

	<div class="s-list <?=($arItem['CODE'] == $_GET['CODE']) ? '' : 'hidden';?>">
		<?if($arItem['ID'] != 1220):?>
			<div class="news-detail">
				<div class="page-text">
					<?=$arItem["DETAIL_TEXT"];?>
				</div>
				<div style="clear:both"></div>
			</div>
		<?else:?>
			<?$arYears = array();?>
			<?$res = CIBlockElement::GetList(array('property_YEAR' => 'desc'), array("IBLOCK_ID" => 9, "ACTIVE" => "Y"), false, false, array("ID", "PROPERTY_YEAR"));?>
			<?while ($item = $res->GetNext()):?>
				<?if (!in_array($item['PROPERTY_YEAR_VALUE'], $arYears)):?>
					<?$arYears[] = $item['PROPERTY_YEAR_VALUE'];?>
				<?endif;?>
			<?endwhile;?>

			<table class="m-filters">
				<td>
					<?=GetMessage("YEAR_DOT_DOT");?>
				</td>
				<td>
					<div class="f-dd" name="achieve_year" data-value="" data-on-change="filterAchieve();">
						<div class="f-dd-head closed"><?=$arYears[0];?></div>
						<div class="f-dd-list hidden">
							<?foreach ($arYears as $year):?>
								<div data-value="<?=$year;?>"><?=$year;?></div>
							<?endforeach;?>
						</div>
					</div>
				</td>
			</table>
		<div id="achieve_result">
		<?$achieve_filter = array('=PROPERTY_YEAR' => $arYears[0]);?>
		<?//достижения и рейтинги
		$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"achievements",
				Array(
					"IBLOCK_TYPE" => "about",
					"IBLOCK_ID" => "9",
					"NEWS_COUNT" => "",
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_ORDER1" => "DESC",
					"SORT_BY2" => "SORT",
					"SORT_ORDER2" => "ASC",
					"FILTER_NAME" => "achieve_filter",
					"FIELD_CODE" => array(0=>"PREVIEW_PICTURE",1=>"",),
					"PROPERTY_CODE" => array("ACHIEVE_FILE", "YEAR"),
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
					"CACHE_GROUPS" => "Y",
					"PREVIEW_TRUNCATE_LEN" => "",
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
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
		<?endif;?>
	</div>
</div>		

<?endforeach;?>