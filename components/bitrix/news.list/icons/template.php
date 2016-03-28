<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?//заголовок для страницы партнера
$section = $APPLICATION->GetCurDir();
if(preg_match('/^.*\/partners\/.*$/', $section) != 0 && count($arResult["ITEMS"]) != 0):?>
	<div class="m40 xl gy">
		<?=GetMessage('MAYKOR_PARTNERS_ICON_TITLE');?>
	</div>
<?endif;?>

<div class="serv-three">
<?foreach($arResult["ITEMS"] as $arItem):?>

		<div class="w33">
			<?if (!empty($arItem['PROPERTIES']['ICON_LINK']['VALUE'])):?>
			<a class="a-grey" href="http://<?=$_SERVER['SERVER_NAME'].$arItem['PROPERTIES']['ICON_LINK']['VALUE'];?>">
			<?endif;?>
				<div style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>')" 
					 class="img-centered img-square"
				/></div>
				<div class="m10">
					<?=$arItem['PREVIEW_TEXT'];?>
				</div>
			<?if (!empty($arItem['PROPERTIES']['ICON_LINK']['VALUE'])):?>
			</a>
			<?endif;?>
		</div>
<?endforeach;?>
</div>