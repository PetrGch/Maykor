<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="m30">
		<? $class="w100";

		if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
		<div class="w20">
			<img
				class="center"
				border="0"
				src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
				width="95"
				height="60"
				alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
				title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
			/>
			<div class="s"><?=$arItem["PROPERTIES"]['ABOUT_SOURCE']['VALUE'];?></div>
		</div>
		<?$class="w80"?>
		<?endif;?>
		<div class="<?=$class?>">
			<div class="date-ind"><?=ShowMyDate($arItem["DISPLAY_ACTIVE_FROM"]);?></div>
			<a class="a-togreen gy m" href="<?=$arItem["DETAIL_PAGE_URL"];?><?=$arItem['CODE'];?>/"><b>
				<?=$arItem["NAME"];?>
			</b></a>
			<div class="mini-content">
				<?=$arItem["PREVIEW_TEXT"];?>
			</div>
			<div class="m5">
				<a class="a-green" href="<?=$arItem["DETAIL_PAGE_URL"];?><?=$arItem['CODE'];?>/"><?=GetMessage('LINK_READ_MORE');?></a>
			</div>
		</div>
		<div class="clear"></div>
	</div>

<?endforeach;?>	


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

<script>calcSideBar();</script>
