<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

	<div>
	<?=$arResult["DESCRIPTION"];?>
	</div>

<h2>Список всех запросов</h2>

<div class="news-list">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?><br />
	<?endif;?>
	<table>
		<thead>
		<tr>
			<td>Дата</td>
			<td>Номер и наименование запроса информации</td>
			<td>Организация и регионы</td>
			<td>Прием ответов</td>
			<td>Статус</td>
		</tr>
		</thead>
		<tbody>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<tr id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<td>
					<?=FormatDate("d M Y", $arItem["DISPLAY_PROPERTIES"]["INFO_DATE_START_TIMESTAMP"]["VALUE"]);?>
				</td>
				<td>
					<a href="<?=$arItem["DETAIL_PAGE_URL"];?>">
						<?=$arItem["DISPLAY_PROPERTIES"]["INFO_NUMBER"]["VALUE"];?>
						<br />
						<?=$arItem["NAME"];?>
					</a>
				</td>
				<td>
					<?=$arItem["DISPLAY_PROPERTIES"]["INFO_COMPANY"]["VALUE"];?>
					<br />
					<?=$arItem['REGIONS'];?>
				</td>
				<td>
					до <?=ConvertDateTime($arItem["DISPLAY_PROPERTIES"]["INFO_DATE_END"]["VALUE"], "HH:MI DD.MM.YYYY");?>
				</td>
				<td>
					<img src="<?=$arItem["STATE_ICON"];?>" />
				</td>
			</tr>
		<?endforeach;?>
		</tbody>
	</table>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>
