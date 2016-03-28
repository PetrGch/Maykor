<?php
global $USER;
$obEl = New CIBlockElement();

//set lots info
$arResult["LOTS_INFO"] = array();

if (isset($arResult["DISPLAY_PROPERTIES"]["PURCHASE_LOT_PRICE"]["VALUE"]) && is_array($arResult["DISPLAY_PROPERTIES"]["PURCHASE_LOT_PRICE"]["VALUE"])) {

    foreach ($arResult["DISPLAY_PROPERTIES"]["PURCHASE_LOT_PRICE"]["VALUE"] as $key => $price) {
        $arResult["LOTS_INFO"][] = array(
            "price" => $price,
            "comment" => (isset($arResult["DISPLAY_PROPERTIES"]["PURCHASE_LOT_COMMENT"]["VALUE"][$key]) && !empty($arResult["DISPLAY_PROPERTIES"]["PURCHASE_LOT_COMMENT"]["VALUE"][$key])) ? $arResult["DISPLAY_PROPERTIES"]["PURCHASE_LOT_COMMENT"]["VALUE"][$key] : "",
        );
    }

}

if (count($arResult["DISPLAY_PROPERTIES"]["PURCHASE_DOCS"]["VALUE"]) == 1){
    $arFile = $arResult["DISPLAY_PROPERTIES"]["PURCHASE_DOCS"]["FILE_VALUE"];
    $arResult["DISPLAY_PROPERTIES"]["PURCHASE_DOCS"]["FILE_VALUE"] = [$arFile];
}

$arResult['REGIONS'] = "";
if(is_array($arResult["DISPLAY_PROPERTIES"]["PURCHASE_REGIONS"]["LINK_SECTION_VALUE"])) {
    foreach ($arResult["DISPLAY_PROPERTIES"]["PURCHASE_REGIONS"]["LINK_SECTION_VALUE"] as $arSection) {
        $arResult['REGIONS'] .= $arSection['NAME'].", ";
    }
}
$arResult['REGIONS'] = (!empty($arResult['REGIONS'])) ? substr($arResult['REGIONS'], 0, -2) : "";
