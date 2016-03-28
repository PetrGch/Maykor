<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?global $feedback;?> 

<?if (count($arResult['ITEMS']) != 0 && !$feedback):?>
	<div class="m30 gy xl"><b><?=GetMessage("TITLE_CLIENT_FEEDBACKS");?>:</b></div>
<?endif;?>

<div class="m20 fback">

<?foreach($arResult["ITEMS"] as $arItem):?>
<?//echo '<pre>'; print_r($arItem); echo '<pre>';?>
<div class="m30">
	<div class="w25 s">
		<b class="gy"><?=$arItem['NAME'];?></b><br />
		<?=$arItem['PROPERTIES']['FEEDBACK_ROLE']['VALUE'];?>
		<?=$arItem['PROPERTIES']['FEEDBACK_COMPANY']['VALUE'];?>
		<br />
	</div>
	<div class="w75">
		<div class="a-quote w100">
			<?=$arItem['DETAIL_TEXT'];?>
		</div>
		<?if (!empty($arItem['PROPERTIES']['FEEDBACK_FILE']['VALUE'])):?>
		<?$filesize = round($arItem['DISPLAY_PROPERTIES']['FEEDBACK_FILE']['FILE_VALUE']['FILE_SIZE']/1048576, 1);?>
		<div class="pdf-block">
				<img src="<?=SITE_TEMPLATE_PATH;?>/images/pdf.png">
				<div>
					<div class="text"><?=GetMessage('FEEDBACK_INFORMATION');?></div>
					<a class="a-green" href="/viewer/<?=str_replace('iblock/', '', $arItem['DISPLAY_PROPERTIES']['FEEDBACK_FILE']['FILE_VALUE']['SUBDIR']).'/'.$arItem['DISPLAY_PROPERTIES']['FEEDBACK_FILE']['FILE_VALUE']['FILE_NAME'];?><?=(!empty($_REQUEST['branch']) ? '/branch='.$_REQUEST['branch'] : '');?><?=(!empty($_REQUEST['service']) ? '/service='.$_REQUEST['service'] : '');?>" target="_blank">
						<?=GetMessage('FEEDBACK_DOWNLOAD');?> (PDF <?=$filesize;?>Mb)
					</a>
				</div>
		</div>
		<?endif;?>
	</div>
	<div class="clear"></div>
</div>
<?endforeach;?>
	
</div>