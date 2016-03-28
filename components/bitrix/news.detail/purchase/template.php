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
<div class="news-detail">

	<?
	//var_dump($arResult["DISPLAY_PROPERTIES"]["PURCHASE_DOCS"]);
	?>


	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>

	<div>
		Компания - <?=$arResult["DISPLAY_PROPERTIES"]["PURCHASE_COMPANY"]["VALUE"];?>
	</div>

	<div>
		Название закупки - <?=$arResult["NAME"];?>
	</div>

	<div>
		Номер закупки - <?=$arResult["DISPLAY_PROPERTIES"]["PURCHASE_NUMBER"]["VALUE"];?>
	</div>

	<div>
		Способ закупки - <?=$arResult["DISPLAY_PROPERTIES"]["PURCHASE_TYPE"]["VALUE"];?>
	</div>

	<div>
		Статус закупки - <?=$arResult["DISPLAY_PROPERTIES"]["PURCHASE_STATE"]["VALUE"];?>
	</div>

	<div>
		Дата начала приема заявок - <?=ConvertDateTime($arResult["DISPLAY_PROPERTIES"]["PURCHASE_DATE_START"]["VALUE"], "DD.MM.YYYY HH:MI");?>
	</div>

	<div>
		Дата окончания приема заявок - <?=ConvertDateTime($arResult["DISPLAY_PROPERTIES"]["PURCHASE_DATE_END"]["VALUE"], "DD.MM.YYYY HH:MI");?>
	</div>

	<div>
		Регионы - <?=$arResult["REGIONS"];?>
	</div>

	<div>
		Ссылка на ЭТП - <a href="<?=$arResult["DISPLAY_PROPERTIES"]["PURCHASE_LINK"]["VALUE"];?>"><?=$arResult["DISPLAY_PROPERTIES"]["PURCHASE_LINK"]["VALUE"];?></a>
	</div>

	<div>
		Предмет закупки:
		<?if (is_array($arResult["LOTS_INFO"])):?>
			<?foreach($arResult["LOTS_INFO"] as $key => $arLot):?>
				<br />
				<span>Лот №<?=$key+1;?></span>
				<div>
					<div>
						Начальная (максимальная) цена договора - <?=$arLot["price"];?>
					</div>
					<div>
						Валюта - <?=$arResult["DISPLAY_PROPERTIES"]["PURCHASE_CURRENCY"]["VALUE"];?>
					</div>
					<div>
						Предмет закупки - <?=$arLot["comment"];?>
					</div>
				</div>
			<?endforeach;?>
		<?endif;?>
	</div>

	<div>
		Документы по текущей закупке:
		<?if (is_array($arResult["DISPLAY_PROPERTIES"]["PURCHASE_DOCS"]["FILE_VALUE"])):?>
			<?foreach($arResult["DISPLAY_PROPERTIES"]["PURCHASE_DOCS"]["FILE_VALUE"] as $key => $arFile):?>
				<br />
				<a download href="<?=$arFile["SRC"];?>"><?=$arFile["ORIGINAL_NAME"];?></a>
			<?endforeach;?>
		<?endif;?>
	</div>

	<input class="f-button purchase_feedback" type="button" value="Отправить отзыв" data-purchase="<?=$arResult["DISPLAY_PROPERTIES"]["PURCHASE_SEARCH_NAME"]["VALUE"];?>" />

</div>