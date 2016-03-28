<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<div class="m20 tile-cont">

<?foreach($arResult["ITEMS"] as $arItem):?>
			<div class="w50 tile pr10">
				<div>
					<div class="date-ind"><?=ShowMyDate($arItem["DISPLAY_ACTIVE_FROM"]);?></div>
					<a class="a-togreen gy" href="<?=$arItem["DETAIL_PAGE_URL"];?><?=$arItem['CODE'];?>/">
						<div class="m"><b><?=$arItem["NAME"];?></b></div>
					</a>
					<div class="m5">
						<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
						<img 
							onload="initTiles();"
							class="preview_picture"
							border="0"
							src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
							width="45%"
							height="auto"
							alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
							title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
							style="float:left; margin: 0 10px 10px 0;"
							/>
						<?endif;?>
						<?=$arItem["PREVIEW_TEXT"];?>

					</div>
					<div class="vac">
						<a class="a-green" href="<?=$arItem["DETAIL_PAGE_URL"];?><?=$arItem['CODE'];?>/"><?=GetMessage('LINK_READ_MORE');?></a>
					</div>
					<div class="clear"></div>
				</div>
			</div>

<?endforeach;?>

</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

<script>
	initTiles();
	calcSideBar();
</script>


