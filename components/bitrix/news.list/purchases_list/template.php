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

<div><?=$arResult["DESCRIPTION"];?></div>

<h2>Список всех закупок</h2>


<div id="purchase_filters" style="display: <?=(!empty($_GET)) ? 'block' : 'none';?>;">
	<form id="purchase_filters" name="purchase_filters" method="get" enctype="multipart/form-data">

		<div>
			<label for="purchase_number_name">Номер или наименование закупки</label>
			<input type="text" name="purchase_number_name" id="purchase_number_name" value="<?=(isset($_REQUEST["purchase_number_name"])) ? $_REQUEST["purchase_number_name"] : "";?>" />
		</div>

		<div>
			<label for="purchase_federal">Федеральные округа</label>
			<?=SelectBoxMFromArray("purchase_federal[]", $arResult["SELECT_FILTER_FO"], $_REQUEST["purchase_federal"], "", "class=\"typeselect\"");?>
		</div>

		<div>
			<label for="purchase_region">Области</label>
			<?=SelectBoxMFromArray("purchase_region[]", $arResult["SELECT_FILTER_REGION"], $_REQUEST["purchase_region"], "", "class=\"typeselect\"");?>
		</div>

		<div>
			<label for="purchase_company">Компания</label>
			<?=SelectBoxFromArray("purchase_company", $arResult["SELECT_FILTER_COMPANY"], $_REQUEST["purchase_company"], "", "class=\"typeselect\"");?>
		</div>

		<div>
			<label for="purchase_state">Статус</label>
			<?=SelectBoxFromArray("purchase_state", $arResult["SELECT_FILTER_STATE"], $_REQUEST["purchase_state"], "", "class=\"typeselect\"");?>
		</div>

		<div>
			<label>Период публикации от:</label>
			<?$APPLICATION->IncludeComponent(
				'bitrix:main.calendar',
				'purchases',
				array(
					'SHOW_INPUT' => 'Y',
					'INPUT_NAME' => 'active-from-date',
					'INPUT_VALUE' => $_REQUEST["active-from-date"],
					'INPUT_NAME_FINISH' => 'active-to-date',
					'INPUT_VALUE_FINISH' =>$_REQUEST["active-to-date"],
					'INPUT_ADDITIONAL_ATTR' => 'size="9" onchange="changeCalendar($(this));"',
				),
				null,
				array('HIDE_ICONS' => 'Y')
			);?>
		</div>

		<div>
			<label>Период окончания приема заявок от:</label>
			<?$APPLICATION->IncludeComponent(
				'bitrix:main.calendar',
				'purchases',
				array(
					'SHOW_INPUT' => 'Y',
					'INPUT_NAME' => 'closed-from-date',
					'INPUT_VALUE' => $_REQUEST["closed-from-date"],
					'INPUT_NAME_FINISH' => 'closed-to-date',
					'INPUT_VALUE_FINISH' =>$_REQUEST["closed-to-date"],
					'INPUT_ADDITIONAL_ATTR' => 'size="9" onchange="changeCalendar($(this));"',
				),
				null,
				array('HIDE_ICONS' => 'Y')
			);?>
		</div>

		<div>
			<input class="f-button" type="submit" value="Применить фильтр" />
		</div>

	</form>
</div>

<input class="f-button" type="button" value="Раскрыть форму поиска по закупкам" onclick="$('#purchase_filters').css('display', 'block');" />

<div class="news-list">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?><br />
	<?endif;?>
	<table>
		<thead>
		<tr>
			<td>Дата</td>
			<td>Номер и наименование закупки</td>
			<td>Цена</td>
			<td>Организация и регион</td>
			<td>Прием заявок</td>
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
					<?=FormatDate("d M Y", $arItem["DISPLAY_PROPERTIES"]["PURCHASE_DATE_START_TIMESTAMP"]["VALUE"]);?>
					<br />
					<img src="<?=$arItem["TYPE_ICON"];?>" />
				</td>

				<td>
					<a href="<?=$arItem["DETAIL_PAGE_URL"];?>">
						<?=$arItem["DISPLAY_PROPERTIES"]["PURCHASE_NUMBER"]["VALUE"];?>
						<br />
						<?=$arItem["NAME"];?>
					</a>
				</td>

				<td>
					<?=$arItem["PURCHASE_MAX_PRICE"];?>
				</td>

				<td>
					<?=$arItem["DISPLAY_PROPERTIES"]["PURCHASE_COMPANY"]["VALUE"];?>
					<br />
					<?=$arItem['REGIONS'];?>
				</td>

				<td>
					до <?=ConvertDateTime($arItem["DISPLAY_PROPERTIES"]["PURCHASE_DATE_END"]["VALUE"], "HH:MI DD.MM.YYYY");?>
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
