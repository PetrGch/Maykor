<?php
global $USER;
$obEl = New CIBlockElement();
$obSect = New CIBlockSection();


foreach($arResult["ITEMS"] as $key => $arItem){
    $arResult["ITEMS"][$key]["PURCHASE_MAX_PRICE"] = 0;


    //AddMessage2Log($arItem["DISPLAY_PROPERTIES"]["PURCHASE_REGIONS"]);
    //set max prices for purchase
    if (isset($arItem["DISPLAY_PROPERTIES"]["PURCHASE_LOT_PRICE"]["VALUE"]) && is_array($arItem["DISPLAY_PROPERTIES"]["PURCHASE_LOT_PRICE"]["VALUE"])) {

        foreach ($arItem["DISPLAY_PROPERTIES"]["PURCHASE_LOT_PRICE"]["VALUE"] as $lotPrice) {
            $arResult["ITEMS"][$key]["PURCHASE_MAX_PRICE"] += floatval($lotPrice);
        }

        switch ($arItem["DISPLAY_PROPERTIES"]["PURCHASE_CURRENCY"]["VALUE_XML_ID"]){
            case "PURCHASE_RUB":
                $currency = " Р";
                break;
            case "PURCHASE_USD":
                $currency = " &#x0024;";
                break;
            case "PURCHASE_EUR":
                $currency = " &#8364;";
                break;
            default:
                $currency = "";
        }

        $arResult["ITEMS"][$key]["PURCHASE_MAX_PRICE"] = SetMaxPriceString($arResult["ITEMS"][$key]["PURCHASE_MAX_PRICE"]) . $currency;
    }

    switch ($arItem["DISPLAY_PROPERTIES"]["PURCHASE_TYPE"]["VALUE_XML_ID"]){
        case "PURCH_TYPE_1":
            $arResult["ITEMS"][$key]["TYPE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        case "PURCH_TYPE_2":
            $arResult["ITEMS"][$key]["TYPE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        case "PURCH_TYPE_3":
            $arResult["ITEMS"][$key]["TYPE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        case "PURCH_TYPE_4":
            $arResult["ITEMS"][$key]["TYPE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        case "PURCH_TYPE_5":
            $arResult["ITEMS"][$key]["TYPE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        case "PURCH_TYPE_6":
            $arResult["ITEMS"][$key]["TYPE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        case "PURCH_TYPE_7":
            $arResult["ITEMS"][$key]["TYPE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        default:
            $arResult["ITEMS"][$key]["TYPE_ICON"] = "";
    }


    switch ($arItem["DISPLAY_PROPERTIES"]["PURCHASE_STATE"]["VALUE_XML_ID"]){
        case "PURCHASE_XML_ORDERS":
            $arResult["ITEMS"][$key]["STATE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        case "PURCHASE_XML_PROCESS":
            $arResult["ITEMS"][$key]["STATE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        case "PURCHASE_XML_CLOSE":
            $arResult["ITEMS"][$key]["STATE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        case "PURCHASE_XML_CANCELL":
            $arResult["ITEMS"][$key]["STATE_ICON"] = SITE_TEMPLATE_PATH . "/images/inPl.png";
            break;

        default:
            $arResult["ITEMS"][$key]["STATE_ICON"] = "";
    }

    $arResult["ITEMS"][$key]['REGIONS'] = "";
    if(is_array($arItem["DISPLAY_PROPERTIES"]["PURCHASE_REGIONS"]["LINK_SECTION_VALUE"])) {
        foreach ($arItem["DISPLAY_PROPERTIES"]["PURCHASE_REGIONS"]["LINK_SECTION_VALUE"] as $arSection) {
            $arResult["ITEMS"][$key]['REGIONS'] .= $arSection['NAME'].", ";
        }
    }
    $arResult["ITEMS"][$key]['REGIONS'] = (!empty($arResult["ITEMS"][$key]['REGIONS'])) ? substr($arResult["ITEMS"][$key]['REGIONS'], 0, -2) : "";
}

//set values to filter company
$arFilter = array(
    "REFERENCE" => array(""),
    "REFERENCE_ID" => array(""),
);

$property_enums = CIBlockPropertyEnum::GetList(array("sort" => "asc"), array("IBLOCK_ID"=>Constants::IBLOCK_PURCHASES_NUMBER, "CODE" => "PURCHASE_COMPANY"));
while($enum_fields = $property_enums->GetNext()) {
    $arFilter["REFERENCE"][] = $enum_fields["VALUE"];
    $arFilter["REFERENCE_ID"][] = $enum_fields["ID"];
}
$arResult["SELECT_FILTER_COMPANY"] = $arFilter;


//set values to filter state
$arFilter = array(
    "REFERENCE" => array(""),
    "REFERENCE_ID" => array(""),
);
$property_enums = CIBlockPropertyEnum::GetList(array("sort" => "asc"), array("IBLOCK_ID"=>Constants::IBLOCK_PURCHASES_NUMBER, "CODE" => "PURCHASE_STATE"));

while($enum_fields = $property_enums->GetNext()) {
    $arFilter["REFERENCE"][] = $enum_fields["VALUE"];
    $arFilter["REFERENCE_ID"][] = $enum_fields["ID"];
}
$arResult["SELECT_FILTER_STATE"] = $arFilter;


$arRegions = array();
$arFo = array();

$res = $obSect->GetList(array(), array("IBLOCK_ID" => Constants::IBLOCK_REGIONS_NUMBER));
while ($arSection = $res->Fetch()){

    if (!empty($arSection["IBLOCK_SECTION_ID"])){
        $arRegions[$arSection["IBLOCK_SECTION_ID"]][] = array("name" => $arSection["NAME"], "id" => $arSection["ID"]);
    }
    else {
        $arFo[] = array("name" => $arSection["DESCRIPTION"], "id" => $arSection["ID"]);
    }

}

$arFilter = array(
    "REFERENCE" => array(""),
    "REFERENCE_ID" => array(""),
);

foreach ($arFo as $federalO){
    $arFilter["REFERENCE"][] = $federalO["name"];
    $arFilter["REFERENCE_ID"][] = $federalO["id"];
}

$arResult["SELECT_FILTER_FO"] = $arFilter;

$arFilter = array(
    "REFERENCE" => array(""),
    "REFERENCE_ID" => array(""),
);

foreach ($arRegions as $foSection){
    foreach ($foSection as $arSectionRegion){
        $arFilter["REFERENCE"][] = $arSectionRegion["name"];
        $arFilter["REFERENCE_ID"][] = $arSectionRegion["id"];
    }
}

$arResult["SELECT_FILTER_REGION"] = $arFilter;

function SetMaxPriceString($number)
{
    $res = round($number, 2);
    $period = 1000000000000;

    $str = "";

    for ($i=1; $i<=4; $i++){
        $digits = intval($res/$period);
        if ($digits >= 1){
            $str .= strval($digits)." ";
            $res = $res - $digits*$period;
        }
        $period = $period/1000;
    }
    $string = $str . money_format("%i", $res);

    return str_replace(".", ",", $string);
}
