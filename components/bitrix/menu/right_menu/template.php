<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?global $menu_item;?>
<?$arSelLink = array(
	'/about/top-management/board_of_directors',
	'/about/contacts/offices_and_units/',
	'/about/contacts/feedback/',
	'/about/contacts/branch_network.php',
);?>

<?
if (preg_match('/^.*\/press\/(news|activity|press_about_us)\/.+$/', $APPLICATION->GetCurPage(false)) != 0)
	$linked = true;
else
	$linked = false;
?>

<div class="right-block bordered">

<?if (!empty($arResult)):?>
	<?
	$previousLevel = 0;
	foreach($arResult as $key => $arItem):?>
		<?if (is_int($key)):?>
			<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
				<?=str_repeat("</ul></div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
			<?endif?>

			<?//для контроля посещенных страниц
			if ($arItem["SELECTED"]):?>
				<?$menu_item = $arItem;?>
			<?endif;?>
			
			<?if ($arItem["DEPTH_LEVEL"] == 1):?>

				<div class="r-menu-item">
					<a class="a-bolder m a-null <?=($arItem['PARAMS']['SERVICE_ID'] == 10) ? 'service-first' : '';?> <?=($arItem['SELECTED']) ? 'selected' : '';?>" <?=($arItem['PARAMS']['URL'] != '' && !$linked) ? "data-page='".$arItem['PARAMS']['URL']."'" : 'href="'.$arItem["LINK"].'"';?>>
						<?=$arItem["TEXT"]?>
					</a>
				<?if ($arItem["IS_PARENT"]):?>
					<ul class="r-menu-list <?if (!$arItem["SELECTED"]):?>hidden<?endif?>">
				<?else:?>
					</div>
				<?endif?>	

			<?else:?>

				<li>
					<a <?=($arItem['PARAMS']['URL'] != '') ? "data-page='".$arItem['PARAMS']['URL']."'" : 'href="'.$arItem["LINK"].'"';?> class="a-bolder <?=(in_array($arItem["LINK"], $arSelLink) && $arItem["SELECTED"]) ? 'selected' : '';?>">
						<?=$arItem["TEXT"]?>
					</a>
				</li>

			<?endif?>

			<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
		<?endif;?>
	<?endforeach?>


	<?if($previousLevel > 1):?>
		</div>
	<?endif;?>

<?endif?>
<?//echo '<pre>'; print_r($arResult); echo '<pre>';?>
</div>