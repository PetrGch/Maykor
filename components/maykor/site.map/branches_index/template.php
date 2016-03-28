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

	<div class="imap-level-0">

	<?
	$previousLevel = -1;
	$counter = 0;
	$column = 1;
	foreach($arResult["arMap"] as $index => $arItem):?>

	

		<?if ($arItem["LEVEL"] < $previousLevel):?>
			</div>
			<div class="imap-level-0">
		<?endif?>

			<?$code = str_replace('/branches/', '', $arItem["FULL_PATH"]);?>
			<?$code = trim($code, '/');?>
			<?$icon_id = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 34, 'CODE' => $code))->Fetch()['PREVIEW_PICTURE'];?>
			<?$arIcon = CFile::GetFileArray($icon_id);?>
			<?//echo '<pre>'; print_r($icon_id); echo '<pre>';?>

			<div class="map-head">
				<img src="<?=$arIcon['SRC'];?>" />
				<a class="a-serv x" href="<?=$arItem["FULL_PATH"]?>">
					<b><?=mb_strtoupper($arItem["NAME"])?></b>
				</a>
			</div>

		<?
			$previousLevel = $arItem["LEVEL"];
			if($arItem["LEVEL"] == 0)
				$counter++;
		?>

	<?endforeach?>

	<?if ($previousLevel > 1)://close last item tags?>
		</div>
	<?endif?>

	</div>

	<div class="clear"></div>
</div>