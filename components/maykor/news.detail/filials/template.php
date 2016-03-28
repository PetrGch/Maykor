<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
$APPLICATION->SetTitle($arResult["NAME"]);
?>

<div class="person-detailed">
	<div class="w33 part">
		<div class="c-logo bord-grad">
			<img
				border="0"
				src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>"
				alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
				title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
				/>
		</div>

		<div class="m20">

			<div class="m10">
				<div class="w40">
					<b><?=GetMessage("FILIAL_CONTACTS");?>:</b>
				</div>
				<div class="w60">
					<?=$arResult['DISPLAY_PROPERTIES']['FILIAL_PHONE']['DISPLAY_VALUE'];?>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="m10">
				<div class="w40">
					<b><?=GetMessage("FILIAL_ADRES");?>:</b>
				</div>
				<div class="w60">
					<?=$arResult['DISPLAY_PROPERTIES']['FILIAL_CONTACTS']['DISPLAY_VALUE'];?>
				</div>
				<div class="clear"></div>
			</div>
	
			<div class="m10">
				<div class="w40">
					<b><?=GetMessage("FILIAL_MODE_OF_OPERATIONS");?>:</b>
				</div>
				<div class="w60">
					<?=$arResult['DISPLAY_PROPERTIES']['FILIAL_WORK_TIME']['DISPLAY_VALUE'];?>
				</div>
				<div class="clear"></div>
			</div>			

			<div class="m10 priem">
				<div class="w40">
					<b><?=GetMessage("FILIAL_APPLICATION_MODE");?>:</b>

				</div>
				<div class="w60">
					<?=$arResult['DISPLAY_PROPERTIES']['FILIAL_REQUEST_TIME']['DISPLAY_VALUE'];?>
				</div>
				<div class="clear"></div>
			</div>

		</div>
	
	</div>

	<div class="w66 part-info">

		<div class="xxl gy"><?=$arResult["NAME"];?></div>
		<div class="m20">
			<?=$arResult["DETAIL_TEXT"];?>
		</div>

	</div>

</div>

<div class="clear"></div>

<?$arPos = explode(",", $arResult['PROPERTIES']['FILIAL_GMAP']["VALUE"]);?>
<?if(!empty($arPos[0])):?>
<?//echo '<pre>'; print_r($arPos); echo '<pre>';?>
	<div class="w100 m20">
				<?$APPLICATION->IncludeComponent("bitrix:map.yandex.view",".default",Array(
					"INIT_MAP_TYPE" => "MAP",
					"CACHE_TYPE" => "N",
					"MAP_DATA" => serialize(array(
					'yandex_lat' => $arPos[0],
					'yandex_lon' => $arPos[1],
					'yandex_scale' => 13,
					'PLACEMARKS' => array (
										array(
											'TEXT' => $arResult['NAME'].'<br />'.$arResult['DISPLAY_PROPERTIES']['FILIAL_CONTACTS']['DISPLAY_VALUE'],
											'LON'  => $arPos[1],
											'LAT'  => $arPos[0],
										),
						),
					)),

					"MAP_WIDTH" => "100%",
					"MAP_HEIGHT" => "300",

					"CONTROLS" => array(
						"TOOLBAR",
						"ZOOM",
						"SMALLZOOM",
						"MINIMAP",
						"TYPECONTROL",
						"SCALELINE"
					),
					"OPTIONS" => array(
						"ENABLE_SCROLL_ZOOM",
						"ENABLE_DBLCLICK_ZOOM",
						"ENABLE_DRAGGING"
					),
					"MAP_ID" => 1,
				)
			);?>
	</div>
<?endif;?>

		<?/*$res = CIBlockElement::GetList(array(), array('IBLOCK_TYPE' => 'content', 'PROPERTY_FILIAL_LINK' => $arResult['ID']));?>
		<?while ($item = $res->GetNext()):?>
			<?$arItems[] = $item['ID'];?>
		<?endwhile;?>
		<?if (count($arItems != 0)):?>
		<!--div class="m30">
			<div class="l gy"><?=mb_strtoupper(GetMessage('NAME_GALERY'));?></div>
			<?foreach($arItems as $ID){
					$APPLICATION->IncludeComponent("bitrix:news.detail", "materials", Array(
								"DISPLAY_DATE" => "Y",
								"DISPLAY_NAME" => "Y",
								"DISPLAY_PICTURE" => "Y",
								"DISPLAY_PREVIEW_TEXT" => "Y",
								"AJAX_MODE" => "N",
								"IBLOCK_TYPE" => "content",
								//"IBLOCK_ID" => "4",
								"ELEMENT_ID" => $ID,
								"ELEMENT_CODE" => "",
								"CHECK_DATES" => "Y",
								"FIELD_CODE" => Array("PREVIEW_PICTURE"),
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
								"CACHE_TYPE" => "N",
								"CACHE_TIME" => "3600",
								"CACHE_GROUPS" => "N",
								"AJAX_OPTION_JUMP" => "N",
								"AJAX_OPTION_STYLE" => "Y",
								"AJAX_OPTION_HISTORY" => "N"
							)
						);
			}
			?>
		</div-->
		<?endif*/?>

<div class="clear"></div>
