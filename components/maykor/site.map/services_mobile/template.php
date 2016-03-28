<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!is_array($arResult["arMap"]) || count($arResult["arMap"]) < 1)
	return;?>

<ul class="b-dot services-iphone">
	<?foreach($arResult["arMap"] as $arItem):?>
		<?if ($arItem["LEVEL"] == 0):?>
		<a class="a-null" href="<?=$arItem['FULL_PATH'];?>">
			<li><?=$arItem['NAME'];?></li>
		</a>
		<?endif;?>
	<?endforeach;?>
</ul>