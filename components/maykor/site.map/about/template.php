<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!is_array($arResult["arMap"]) || count($arResult["arMap"]) < 1)
	return;

$arRootNode = Array();
foreach($arResult["arMap"] as $index => $arItem)
{
	if ($arItem["LEVEL"] == 0)	
		$arRootNode[] = $index;
}

$allNum = count($arRootNode);
$colNum = ceil($allNum / $arParams["COL_NUM"]);

?>

<div>
	<?
	$previousLevel = -1;
	$counter = 0;
	$column = 1;
	foreach($arResult["arMap"] as $index => $arItem):?>

		<?if ( $arItem["LEVEL"] == 0 ):?>	
			<div class="map-level-0">
				<div class="map-head">
					<a class="a-h-serv" href="<?=$arItem["FULL_PATH"]?>"><?=mb_strtoupper($arItem["NAME"])?></a>
				</div>
			</div>
		<?endif;?>
			
	<?endforeach?>
	

	<div class="clear"></div>
</div>