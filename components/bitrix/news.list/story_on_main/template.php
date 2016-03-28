<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div class="section-header-ind"><a class="a-togreen gy" href="/clients/stories/"><?=mb_strtoupper(GetMessage("TITLE_SUCCES_HISTORY"));?></a></div>

<?$icon_class = "i-pdf";?>

<?foreach($arResult["ITEMS"] as $arItem):?>

	<?$arFile = CFile::GetFileArray($arItem['PROPERTIES']['HISTORY_FILE']['VALUE']);?>
	<?//if ($arFile['CONTENT_TYPE'] == 'application/pdf'):?>
		<a class="a-null" href="/viewer/<?=str_replace('iblock/', '', $arFile['SUBDIR']).'/'.$arFile['FILE_NAME'];?>" target="_blank">
			<div class="zoom none">
				<div class="zone"></div>
				<div class="inner">
					<div class="<?=$icon_class;?>" style="z-index: 3"></div>
					<div class="c-logo" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')"></div>
					<div class="c-back"></div>
					<div class="c-text">
						<?=$arItem["PREVIEW_TEXT"];?>
					</div>

				</div>
				<div class="clear l title a-green"><?=$arItem["NAME"];?></div>
			</div>
		</a>
		<?break;?>
	<?//endif;?>
<?endforeach;?>