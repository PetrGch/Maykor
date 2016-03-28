<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div class="section-header-ind ratings_main"><a class="a-togreen gy" href="/about/key_facts/dostizheniya-i-reytingi/"><?=GetMessage('ACHIEVEMENTS_TITLE_ON_MAIN');?></a></div>

<div class="c_arrow_left h-s-left"></div>

<div class="ach-list">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="ach-item-ind h-s-item" style="display: block">

			<img id="<?=$this->GetEditAreaId($arItem['ID']);?>"
			 	 src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
				 alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
				 class="ach-img"
				 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
			/>
			
		</a>
	<?endforeach;?>
</div>

<div class="c_arrow_right h-s-right"></div>