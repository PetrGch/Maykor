<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="tile fin">
		<div class="m20">
			<div class="date-ind"><?=ShowMyDate($arItem["DISPLAY_ACTIVE_FROM"]);?></div>
			<a class="a-togreen m gy" href="/about/career/<?=$arItem['CODE'];?>/">
				<?=$arItem["NAME"];?>
			</a>

			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["DETAIL_PICTURE"])):?>
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<a href="/about/career/<?=$arItem['CODE'];?>/">
						<img
							onload="initTiles()"
							class="m5"
							border="0"
							src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>"
							width="100%"
							height="auto"	
							alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"
							title="<?=$arItem["DETAIL_PICTURE"]["TITLE"]?>"
							/></a>
				<?else:?>
					<img
						onload="initTiles()"
						class="m5"
						border="0"
						src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>"
						width="100%"
						height="auto"
						alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"
						title="<?=$arItem["DETAIL_PICTURE"]["TITLE"]?>"
						/>
				<?endif;?>
			<?endif?>

			<div class="m5">
				<?=$arItem["PREVIEW_TEXT"];?>
			</div>
			<div class="m20">
				<a class="a-green" href="/about/career/<?=$arItem['CODE'];?>/"><?=GetMessage("MORE_INFO");?></a>
			</div>
		</div>
	</div>
<?endforeach;?>

<script>
	initTiles();
	calcSideBar();
</script>
