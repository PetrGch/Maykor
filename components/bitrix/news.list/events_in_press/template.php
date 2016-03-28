<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div class="m20 tile-cont">

<?foreach($arResult["ITEMS"] as $arItem):?>
			<div class="fin tile">
				<div>
					<div class="date-ind"><?=ShowMyDate($arItem["DISPLAY_ACTIVE_FROM"]);?></div>
						<a class="a-togreen gy m" href="<?=$arItem["DETAIL_PAGE_URL"];?><?=$arItem['CODE'];?>/"><b>
							<?=$arItem["NAME"];?>
						</b></a>
						<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["DETAIL_PICTURE"])):?>
						<img
							onload="initTiles();"
							class="m5"
							border="0"
							src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>"
							width="100%"
							height="240"
							alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"
							title="<?=$arItem["DETAIL_PICTURE"]["TITLE"]?>"
							/>
							<?endif;?>
					<div class="mini-content">
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