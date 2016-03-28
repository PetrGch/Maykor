<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!is_array($arResult["arMap"]) || count($arResult["arMap"]) < 1)
	return;
//echo '<pre>'; print_r($arResult); echo '<pre>';
$arRootNode = Array();
foreach($arResult["arMap"] as $index => $arItem)
{
	if ($arItem["LEVEL"] == 0)
		$arRootNode[] = $index;
}
	

	foreach($arResult["arMap"] as $index => $arItem):?>

		<?if ($arItem["LEVEL"] == 0):?>
			<?if ( $index != 0 ):?>
				</div>
			</div>
			<?endif;?>

			<div class="map-level-0 <?=($arItem['SERVICE_ID'] == 8) ? 'service-first' : '';?>">
				<div class="map-head">
					<a class="a-h-serv" href="<?=$arItem["FULL_PATH"]?>"><?=mb_strtoupper($arItem["NAME"])?></a>
				</div>
				<div class="serv-list">
		<?else:?>

					<div class="map-item">
						<a class="a-serv" href="<?=$arItem["FULL_PATH"]?>"><?=$arItem["NAME"]?></a>
					</div>
		<?endif?>

	<?endforeach?>

	<?if ( !empty($arResult["arMap"]) ):?>
				</div>
			</div>
	<?endif;?>

<a class="devil_link pop-ctrl">
	<span class="uppercase">Требуется помощь в выборе услуги?</span><br />
	Отправьте запрос нашим специалистам
</a>