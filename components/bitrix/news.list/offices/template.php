<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $key => $arItem):?>

<div>
	<div hash-id="<?=$arItem['CODE'];?>/" class="unbind page-section-header gy xl slide <?=($arItem['CODE'] == $_GET['PAGE']) ? 'opened to-anchor' : 'closed';?>">
		<?=$arItem['NAME'];?>
	</div>
	<div class="s-list">
		<div class="fin">
			<?=$arItem['DETAIL_TEXT'];?>
		</div>
		<div class="fin">
			 <?//=$arItem['DISPLAY_PROPERTIES']['CONT_G_MAP']["DISPLAY_VALUE"];?>
			<?$arPos = explode(",", $arItem['DISPLAY_PROPERTIES']['CONT_G_MAP']["VALUE"]);?>
			<?$APPLICATION->IncludeComponent("bitrix:map.yandex.view",".default",Array(
					"INIT_MAP_TYPE" => "MAP",

					"MAP_DATA" => serialize(array(
					'yandex_lat' => $arPos[0],
					'yandex_lon' => $arPos[1],
					'yandex_scale' => 13,
					'PLACEMARKS' => array (
										array(
											'TEXT' => $arItem['NAME'],
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
					"MAP_ID" => $key,
				)
			);?>
		</div>
		<div class="clear"></div>
	</div>
</div>



<?endforeach;?>