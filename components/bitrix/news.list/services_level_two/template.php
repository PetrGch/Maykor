<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?global $arBlockFilter;?>

<?foreach($arResult["ITEMS"] as $arItem):?>

<?//ввод мета свойств текущей услуги второго уровня
if ($arItem['CODE'] == $_GET['PAGE']){
	$arMetaProps = GetMetaProperties(5, $arItem['ID']);
	(!empty($arMetaProps['ELEMENT_META_TITLE'])       ? $APPLICATION->SetPageProperty('title', $arMetaProps['ELEMENT_META_TITLE']) : '');
	(!empty($arMetaProps['ELEMENT_META_KEYWORDS'])    ? $APPLICATION->SetPageProperty('keywords', $arMetaProps['ELEMENT_META_KEYWORDS']) : '');
	(!empty($arMetaProps['ELEMENT_META_DESCRIPTION']) ? $APPLICATION->SetPageProperty('description', $arMetaProps['ELEMENT_META_DESCRIPTION']) : '');

	$APPLICATION->SetTitle($arItem['NAME']);
}
?>

<div>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div hash-id="<?=$arItem['CODE'];?>/" class="page-section-header slide gy xl <?=($arItem['CODE'] == $_GET['PAGE']) ? 'opened to-anchor' : 'closed';?>">
		<?=$arItem['NAME'];?>
	</div>
	<div class="s-list <?=($arItem['CODE'] == $_GET['PAGE']) ? '' : 'hidden';?>">
		<div class="service-head" data-code="<?=$arItem['CODE'];?>">
			<?=$arItem['DETAIL_TEXT'];?>
		</div>
	
		<?//Вывод Материалов
		$mat = CIBlockElement::GetList(array('DATE_CREATE' => 'DESC'), array('IBLOCK_TYPE' => 'content', 'ACTIVE' => 'Y', 'PROPERTY_SERVICE_LINK' => $arItem['ID']))->Fetch();?>
		<?//echo '<pre>'; print_r($mat); echo '<pre>';?>

		<div class="m30 serv-mat">
			<?if (!empty($mat)):?>
				<?$APPLICATION->IncludeComponent("bitrix:news.detail", "material_service", Array(
						"SERVICE" => $arItem['ID'],
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "N",
						"IBLOCK_TYPE" => "content",
						//"IBLOCK_ID" => "4",
						"ELEMENT_ID" => $mat['ID'],
						"ELEMENT_CODE" => "",
						"CHECK_DATES" => "Y",
						"FIELD_CODE" => Array("DETAIL_PICTURE", ),
						"PROPERTY_CODE" => Array("MEDIA_ENG_TEXT"),
						"IBLOCK_URL" => "",
						"META_KEYWORDS" => "KEYWORDS",
						"META_DESCRIPTION" => "DESCRIPTION",
						"BROWSER_TITLE" => "BROWSER_TITLE",
						"DISPLAY_PANEL" => "Y",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "Y",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "3600",
						"CACHE_GROUPS" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N"
					)
				);?>
			<?endif;?>

			<?//Вывод Историй успеха
			$history = CIBlockElement::GetList(array('DATE_CREATE' => 'DESC'), array('IBLOCK_ID' => 6, 'ACTIVE' => 'Y', 'PROPERTY_HISTORY_SERVICE' => $arItem['ID']))->Fetch();?>
			<?if (!empty($history)):?>
				<?$APPLICATION->IncludeComponent("bitrix:news.detail", "history_service", Array(
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "N",
						"IBLOCK_TYPE" => "clients",
						"IBLOCK_ID" => "6",
						"ELEMENT_ID" => $history['ID'],
						"ELEMENT_CODE" => "",
						"CHECK_DATES" => "Y",
						"FIELD_CODE" => Array("PREVIEW_PICTURE"),
						"PROPERTY_CODE" => Array("HISTORY_ENG_ANOUNCE", "HISTORY_FILE"),
						"IBLOCK_URL" => "",
						"META_KEYWORDS" => "KEYWORDS",
						"META_DESCRIPTION" => "DESCRIPTION",
						"BROWSER_TITLE" => "BROWSER_TITLE",
						"DISPLAY_PANEL" => "Y",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "Y",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "3600",
						"CACHE_GROUPS" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N"
					)
				);?>
			<?endif;?>


			<?//Вывод Новостей
			$news = CIBlockElement::GetList(array('DATE_CREATE' => 'DESC'), array('IBLOCK_ID' => 1, 'ACTIVE' => 'Y', 'PROPERTY_NEWS_SERVICE' => $arItem['ID']))->Fetch();?>
			<?//echo '<pre>'; print_r($history); echo '<pre>';?>

			<?if (!empty($news)):?>
				<?$APPLICATION->IncludeComponent("bitrix:news.detail", "news_service", Array(
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "N",
						"IBLOCK_TYPE" => "news",
						"IBLOCK_ID" => "1",
						"ELEMENT_ID" => $news['ID'],
						"ELEMENT_CODE" => "",
						"CHECK_DATES" => "Y",
						"FIELD_CODE" => Array("PREVIEW_PICTURE", "ACTIVE_FROM"),
						"PROPERTY_CODE" => Array("NEWS_ENG_ANOUNCE"),
						"IBLOCK_URL" => "",
						"META_KEYWORDS" => "KEYWORDS",
						"META_DESCRIPTION" => "DESCRIPTION",
						"BROWSER_TITLE" => "BROWSER_TITLE",
						"DISPLAY_PANEL" => "Y",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "Y",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"ACTIVE_DATE_FORMAT" => "",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "3600",
						"CACHE_GROUPS" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N"
					)
				);?>
			<?endif;?>
		</div>

		<div class="clear"></div>

	</div>
</div>

<?endforeach;?>