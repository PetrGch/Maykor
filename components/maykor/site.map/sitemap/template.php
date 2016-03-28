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

<?//echo '<pre>'; print_r($arResult["arMap"]); echo '<pre>';?>

<div class="general-map">

	<?
	$previousLevel = -1;
	$counter = 0;
	foreach($arResult["arMap"] as $index => $arItem):?>

		<a class="a-serv" href="<?=$arItem["FULL_PATH"]?>"><?=mb_strtoupper($arItem["NAME"])?> <?//=$arItem["STRUCT_KEY"]?></a>

	<?endforeach?>

</div>

<div class="clear"></div>

<script>
	$(document).on("ready", function () {
		$("#right-menu").hide();
		$(".right-optional").css("margin-top", "100px");
	})
</script>


