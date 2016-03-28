<?php

foreach ($arResult["ITEMS"] as $key => $arItem){
    if (count($arItem["DISPLAY_PROPERTIES"]["INFO_PAGE_FILES"]["VALUE"]) == 1){
        $arFile = $arItem["DISPLAY_PROPERTIES"]["INFO_PAGE_FILES"]["FILE_VALUE"];
        $arResult["ITEMS"][$key]["DISPLAY_PROPERTIES"]["INFO_PAGE_FILES"]["FILE_VALUE"] = [$arFile];
    }
}
