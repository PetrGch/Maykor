<?php
global $USER;
$obEl = New CIBlockElement();
/*
//set values to filter company
$arFilter = array(
    "REFERENCE" => array(""),
    "REFERENCE_ID" => array(""),
);

$property_enums = CIBlockPropertyEnum::GetList(array("sort" => "asc"), array("IBLOCK_ID"=>Constants::IBLOCK_INFO_ORDERS_NUMBER, "CODE" => "INFO_COMPANY"));
while($enum_fields = $property_enums->GetNext()) {
    $arFilter["REFERENCE"][] = $enum_fields["VALUE"];
    $arFilter["REFERENCE_ID"][] = $enum_fields["ID"];
}
$arResult["SELECT_FILTER_COMPANY"] = $arFilter;


//set values to filter state
$arFilter = array(
    "REFERENCE" => array("Открыт", "Завершен"),
    "REFERENCE_ID" => array("opened", "closed"),
);

$arResult["SELECT_FILTER_STATE"] = $arFilter;
*/

foreach($arResult["ITEMS"] as $key => $arItem) {

    switch ($arItem["DISPLAY_PROPERTIES"]["INFO_STATE"]["VALUE_XML_ID"]){
        case "INFO_STATE_OPEN":
            $arResult["ITEMS"][$key]["STATE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        case "INFO_STATE_CLOSE":
            $arResult["ITEMS"][$key]["STATE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        case "INFO_STATE_CANCEL":
            $arResult["ITEMS"][$key]["STATE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        default:
            $arResult["ITEMS"][$key]["STATE_ICON"] = "";
    }

    $arResult["ITEMS"][$key]['REGIONS'] = "";
    if(is_array($arItem["DISPLAY_PROPERTIES"]["INFO_REGIONS"]["LINK_SECTION_VALUE"])) {
        foreach ($arItem["DISPLAY_PROPERTIES"]["INFO_REGIONS"]["LINK_SECTION_VALUE"] as $arSection) {
            $arResult["ITEMS"][$key]['REGIONS'] .= $arSection['NAME'].", ";
        }
    }
    $arResult["ITEMS"][$key]['REGIONS'] = (!empty($arResult["ITEMS"][$key]['REGIONS'])) ? substr($arResult["ITEMS"][$key]['REGIONS'], 0, -2) : "";
}
