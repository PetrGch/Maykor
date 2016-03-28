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
		Компания - <?=$arResult["DISPLAY_PROPERTIES"]["INFO_COMPANY"]["VALUE"];?>
	</div>

	<div>
		Название запроса информации - <?=$arResult["NAME"];?>
	</div>

	<div>
		Номер запроса информации - <?=$arResult["DISPLAY_PROPERTIES"]["INFO_NUMBER"]["VALUE"];?>
	</div>

	<div>
		Статус запроса информации - <?=$arResult["DISPLAY_PROPERTIES"]["INFO_STATE"]["VALUE"];?>
	</div>

	<div>
		Дата начала приема ответов - <?=ConvertDateTime($arResult["DISPLAY_PROPERTIES"]["INFO_DATE_START"]["VALUE"], "DD.MM.YYYY HH:MI");?>
	</div>

	<div>
		Дата окончания приема ответов - <?=ConvertDateTime($arResult["DISPLAY_PROPERTIES"]["INFO_DATE_END"]["VALUE"], "DD.MM.YYYY HH:MI");?>
	</div>

	<div>
		Контактное лицо - <?=$arResult["DISPLAY_PROPERTIES"]["INFO_OPERATOR"]["VALUE"];?>
	</div>

	<div>
		E-mail для ответов - <?=$arResult["DISPLAY_PROPERTIES"]["INFO_EMAIL"]["VALUE"];?>
	</div>

	<div>
		Ссылка на ЭТП - <a href="<?=$arResult["DISPLAY_PROPERTIES"]["INFO_LINK"]["VALUE"];?>"><?=$arResult["DISPLAY_PROPERTIES"]["INFO_LINK"]["VALUE"];?></a>
	</div>

	<div>
		Комментарий - <?=$arResult["DISPLAY_PROPERTIES"]["INFO_COMMENT"]["VALUE"];?>
	</div>

	<div>
		Документы :
		<?if (is_array($arResult["DISPLAY_PROPERTIES"]["INFO_DOCS"]["FILE_VALUE"])):?>

			<?if (count($arResult["DISPLAY_PROPERTIES"]["INFO_DOCS"]["VALUE"]) == 1):?>
				<br />
				<a download href="<?=$arResult["DISPLAY_PROPERTIES"]["INFO_DOCS"]["FILE_VALUE"]["SRC"];?>"><?=$arResult["DISPLAY_PROPERTIES"]["INFO_DOCS"]["FILE_VALUE"]["ORIGINAL_NAME"];?></a>
			<?else:?>

				<?foreach($arResult["DISPLAY_PROPERTIES"]["INFO_DOCS"]["FILE_VALUE"] as $key => $arFile):?>
					<br />
					<a download href="<?=$arFile["SRC"];?>"><?=$arFile["ORIGINAL_NAME"];?></a>
				<?endforeach;?>

			<?endif;?>
		<?endif;?>
	</div>

</div>