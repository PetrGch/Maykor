<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?//echo '<pre>'; print_r($arResult); echo '<pre>';
$service = ( $arParams["SERVICE_TO_LINK"]) ? 'service='.$arParams["SERVICE_TO_LINK"].'&' : '';
$branch = ( $arParams["BRANCH_TO_LINK"]) ? 'branch='.$arParams["BRANCH_TO_LINK"].'&' : '';
$params = trim($service.$branch, "&");
?>

<div class="m40 recommen_slider">
		<div class="m20 xl gy">
			<a class="a-togreen gy" href="/clients/<?=($params) ? '?'.$params : '';?>"><?=GetMessage('MAYKOR_RECOMMEND');?></a>
			<a class="a-green a-arr" href="/clients/<?=($params) ? '?'.$params : '';?>"><?=GetMessage('ALL_CLIENTS_LINK');?></a>
		</div>

	<div class=" rec-slider serv-recom">
		<div class="c_arrow_left rec-arr arr-l on" dir="-"></div>
		
		<div class="hidden">
			
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<a href="/clients/<?=$arItem["CODE"];?>/" class="rec-it">
					<? if( $arItem["DETAIL_PICTURE"]["SRC"] ): ?>
						<div class="rec-item h-s-item img-centered" title="<?=$arItem['NAME'];?>" style='background-image: url("<?=$arItem["DETAIL_PICTURE"]["SRC"]?>") '></div>
					<?else:?>
						<div class="rec-item h-s-item img-centered" style='background-image: url("<?=SITE_TEMPLATE_PATH;?>/images/no-logo.png")'></div>
					<?endif;?>
				</a>
			<?endforeach;?>
			
		</div>

		<div class="ach-list">
			<div class="falcrum"></div>
		</div>

		<div class="c_arrow_right rec-arr arr-r on" dir="+"></div>
		<div class="clear"></div>
	</div>

</div>