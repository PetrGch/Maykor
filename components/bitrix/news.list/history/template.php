<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>

<div>
	<div class="l-history">
		<div style="width: 100px;">
			<div class="grid-corner">
				<div class="grid-back"></div>
				<div class="grid-front" data-dir="-1"></div>
			</div>
			<div class="grid bordered">
				<div class="grid-text"><?=GetMessage('HISTORY_YEAR');?></div>

				<div class="grid-cursor">
					<div class="h"></div>
					<div class="y"></div>
				</div>

				<div class="grid-cont">
						<div class="grid-year selected" data-i="0"><?=$arResult["ITEMS"][0]["PROPERTIES"]['YEAR']['VALUE'];?></div>
						<?for ($i=1;$i<count($arResult["ITEMS"]);$i++):?>
							<div class="grid-lines"></div>
							<div class="grid-year " data-i="<?=$i;?>"><?=$arResult["ITEMS"][$i]["PROPERTIES"]['YEAR']['VALUE'];?></div>
						<?endfor;?>
				</div>
				<div class="grid-text"><?=GetMessage('HISTORY_YEAR');?></div>
			</div>
			<div class="grid-corner reverse">
				<div class="grid-back"></div>
				<div class="grid-front" data-dir="1"></div>
			</div>
		</div>
	</div>

	<div class="r-history">
		<?for ($i=0;$i<count($arResult["ITEMS"]);$i++):?>
		<div class="year-info">
			<div class="gy xl section-content-header"><?=$arResult["ITEMS"][$i]['NAME'];?></div>
			<?=$arResult["ITEMS"][$i]['DETAIL_TEXT'];?>
		</div>
		<?endfor;?>
	</div>

	<div class="clear"></div>

</div>