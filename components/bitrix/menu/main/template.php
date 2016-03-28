<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?global $top_item;?>
<?
$pops = array('about-pop', 'serv-pop', 'branch-pop', 'clients-pop', 'filials-pop', 'press-pop');
?>
<?if (!empty($arResult)):?>
	<ul id="top-menu">
	<?for($i=count($arResult);$i>0;$i--):?>
		<?$arItem = $arResult[$i-1];?>
				<?//для контроля посещенных страниц
				if ($arItem["SELECTED"]):?>
					<?$top_item = $arItem;?>
				<?endif;?>
		<?$data = $pops[$i-1]; ?>
		<?if($arItem["SELECTED"]):?>
			<li><b><a class="a-bolder bk <?=($arItem['PARAMS']['CLASS'] != '') ? $arItem['PARAMS']['CLASS'] : '';?>" href="<?=$arItem["LINK"]?>" data-pop="<?=$data?>"><?=$arItem["TEXT"]?></a></b></li>
		<?else:?>
			<li><a class="a-bolder bk <?=($arItem['PARAMS']['CLASS'] != '') ? $arItem['PARAMS']['CLASS'] : '';?>" href="<?=$arItem["LINK"]?>" data-pop="<?=$data?>"><?=$arItem["TEXT"]?></a></li>
		<?endif?>
		
	<?endfor;?>
	</ul>		
<?endif?>