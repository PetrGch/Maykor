<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
global $achieve_filter;
?>

<?foreach($arResult["ITEMS"] as $arItem):?>
<?//ввод ввод мета свойств
	if ( $arItem['CODE'] == $_GET['PAGE'] ){
		$APPLICATION->SetPageProperty("title", $arItem['IPROPERTY_VALUES']['ELEMENT_META_TITLE']);
		$APPLICATION->SetPageProperty("description", $arItem['IPROPERTY_VALUES']['ELEMENT_META_DESCRIPTION']);
		if ( !empty($arItem['IPROPERTY_VALUES']['ELEMENT_META_KEYWORDS']) )
			$APPLICATION->SetPageProperty("keywords", $arItem['IPROPERTY_VALUES']['ELEMENT_META_KEYWORDS']);
	}
?>


<div>
	<div hash-id="<?=$arItem['CODE'];?>/" class="page-section-header slide gy xl <?=($arItem['CODE'] == $_GET['PAGE']) ? 'opened to-anchor' : 'closed';?>">
		<?=$arItem['NAME'];?>
	</div>
	<div class="s-list <?=($arItem['CODE'] == $_GET['PAGE']) ? '' : 'hidden';?>">
			<div class="news-detail">
				<div class="page-text">
					<?=$arItem["DETAIL_TEXT"];?>
				</div>
				<div style="clear:both"></div>
			</div>
		<?if (is_array($arItem["DISPLAY_PROPERTIES"]["INFO_PAGE_FILES"]["FILE_VALUE"]) && count($arItem["DISPLAY_PROPERTIES"]["INFO_PAGE_FILES"]["FILE_VALUE"]) > 0):?>
			<div>
				<span>Документы</span>
					<?foreach($arItem["DISPLAY_PROPERTIES"]["INFO_PAGE_FILES"]["FILE_VALUE"] as $key => $arFile):?>
						<br />
						<a download href="<?=$arFile["SRC"];?>"><?=$arFile["ORIGINAL_NAME"];?></a>
					<?endforeach;?>
			</div>
		<?endif;?>
	</div>
</div>		

<?endforeach;?>