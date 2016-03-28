<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";

if($arResult[count($arResult)-1]["LINK"]!="" && $arResult[count($arResult)-1]["LINK"]!=$GLOBALS["APPLICATION"]->GetCurPage(false))
	$arResult[] = Array("TITLE"=>$GLOBALS["APPLICATION"]->GetTitle());

$strReturn = '<a class="a-togreen wgy" href="'.SITE_DIR.'" title="'.GetMessage("HDR_GOTO_MAIN").'">'.GetMessage("TITLE_MAIN_PAGE").'</a>';
for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
	if ($arResult[$index]["TITLE"] != 'union'){
		$strReturn .= " \\ ";

		$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
		if($arResult[$index]["LINK"] <> "" && $arResult[$index]["LINK"]!=$GLOBALS["APPLICATION"]->GetCurPage(false))
			$strReturn .= '<a class="a-togreen wgy" href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a>';
		else
			$strReturn .= '<span class="cur-bread">'.$title.'</span>';
	}
}

return $strReturn;
?>