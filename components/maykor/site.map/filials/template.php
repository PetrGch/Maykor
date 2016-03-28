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
<?$arNames = array();?>
<?foreach($arResult["arMap"] as $index => $arItem):?>

	<?if ( !in_array($arItem["NAME"], $arNames) ):?>

	<div class="map-level-0">
		<a class="a-h-serv" href="<?=$arItem["FULL_PATH"]?>"><?=mb_strtoupper($arItem["NAME"])?></a>
	</div>
	<?$arNames[] = $arItem["NAME"];?>
	<?endif;?>

<?endforeach?>

</div>

<?unset($arNames);?>