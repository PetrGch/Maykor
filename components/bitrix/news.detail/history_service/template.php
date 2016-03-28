<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div class="w33">

	<div class="l gy"><?=mb_strtoupper(GetMessage('TITLE_SUCCES_HISTORY'));?></div>

	<a class="a-null" href="/viewer.php?file=<?=$arItem["DISPLAY_PROPERTIES"]['HISTORY_FILE']['FILE_VALUE']['SRC'];?>" target="_blank">
		<div class="zoom none serv-s m10">
			<div class="zone"></div>
			<div class="inner">
				<div class="<?=$icon_class;?>" style="z-index: 3"></div>
				<div class="c-logo" style="background-image: url('<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>')"></div>
				<div class="c-back"></div>
				<div class="c-text">
					<?=$arResult["NAME"];?>
				</div>

			</div>
			<div class="clear l title a-green"><?=$arResult["NAME"];?></div>
		</div>
	</a>

	<div class="m5">
		<?=$arResult['PREVIEW_TEXT'];?>
	</div>
</div>