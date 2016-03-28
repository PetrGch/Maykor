<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?global $clients_filter;?>

<?//echo '<pre>'; print_r($clients_filter); echo '<pre>';?>
<?if($clients_filter[0][0]['=PROPERTY_CP_FEDERAL_STATES.CODE'] != 'europe'):?>
	<div class="c-filters map-filter m20" id="first_filter">
		География:
		<div class="f-dd" id="fstate" data-value="<?=$clients_filter[0][0]['=PROPERTY_CP_FEDERAL_STATES.CODE'];?>" data-on-change="filterClients($(this))" style="z-index: 21">
			<div class="f-dd-head closed">
				<?if(!empty($clients_filter[0][0]['=PROPERTY_CP_FEDERAL_STATES.CODE'])){
					$res_fs = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 42, 'CODE' => $clients_filter[0][0]['=PROPERTY_CP_FEDERAL_STATES.CODE']))->Fetch();
					echo $res_fs['NAME'];
				}
				else
					echo GetMessage("ALL");
				?>
			</div>
			<div class="f-dd-list hidden">
					<div data-value=""><?=GetMessage("ALL");?></div>
					<?asort($arResult['MY']['FstatesRu']);?>
					<?foreach ($arResult['MY']['FstatesRu'] as $key => $value):?>
						<div data-value="<?=$key;?>"><?=$value;?></div>
					<?endforeach;?>
			</div>
		</div>
	</div>

	<div class="c-filters m10">
		Отрасль:
		<div class="f-dd" id="branch" data-value="<?=$clients_filter['PROPERTY_CP_BRANCH'];?>" data-on-change="filterClients($(this))" style="z-index: 20">
			<div class="f-dd-head closed"><?=GetMessage("ALL");?></div>
			<div class="f-dd-list hidden">
					<div data-value=""><?=GetMessage("ALL");?></div>
					<?$res = CIBlockElement::GetList(array('name' => 'asc'), array('IBLOCK_ID' => 34, 'ID' => $arResult['MY']['BRANCHES']), false, false, array('ID', 'NAME', 'PROPERTY_BRANCH_ENG_NAME'));?>
					<?while($item = $res->GetNext()):?>
						<div data-value="<?=$item['ID'];?>"><?=$item['NAME'];?></div>
					<?endwhile;?>
			</div>
		</div>
		<div class="clear"></div>
	</div>


	<div class="c-filters m10">
		Услуга:
		<div class="f-dd"  id="service" data-value="<?=(!empty($_REQUEST['service'])) ? intval($_REQUEST['service']) : '';?>" data-on-change="filterClients($(this))" style="z-index: 19">
			<div class="f-dd-head closed"><?=GetMessage("ALL");?></div>
			<div class="f-dd-list hidden">
					<div data-value=""><?=GetMessage("ALL");?></div>

					<?//сортировка услуг
					$arFirstServ = array();
					foreach ($arResult['MY']['SERVICES'] as $key => $value){
						$arFirstServ[] = $key;
					}
					$obFirstService = CIBlockElement::GetList(array('property_SERVICE_FILTER_SORT' => 'asc'), array('IBLOCK_ID' => 5, 'ID' => $arFirstServ), false, false, array('ID', 'NAME'));
					?>

					<?while ($arServ = $obFirstService->GetNext()):?>

						<b><div data-value="<?=$arServ['ID'];?>"><?=$arServ['NAME'];?></div></b>

						<?if ($sub_service = $arResult['MY']['SERVICES'][$arServ['ID']]):?>
							<?$obSecondService = CIBlockElement::GetList(array('property_SERVICE_FILTER_SORT' => 'asc'), array('IBLOCK_ID' => 5, 'ID' => $sub_service), false, false, array('ID', 'NAME'));?>

							<?while($item = $obSecondService->GetNext()):?>
								<div data-value="<?=$item['ID'];?>"><?=$item['NAME'];?></div>
							<?endwhile;?>

						<?endif;?>

					<?endwhile;?>
			</div>
		</div>
		<div class="clear"></div>
	</div>

	<?//ввод массива услуг "Внедрение и поддержка бизнес-приложений"
	$arIDServ = array(146);
	$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 5, 'SECTION_ID' => 32));
	while($service = $res->GetNext()){
		$arIDServ[] = $service['ID'];
	}
	?>

	<?//if (in_array($_REQUEST['service'], $arIDServ) || $_REQUEST['solution'] != ''):?>
	<div class="c-filters m10">
		Платформа:
		<div class="f-dd" id="solution" data-value="<?=$clients_filter['PROPERTY_CP_SOLUTIONS'];?>" data-on-change="filterClients($(this))" style="z-index: 17">
			<div class="f-dd-head closed"><?=GetMessage("ALL");?></div>
			<div class="f-dd-list hidden">
				<div data-value=""><?=GetMessage("ALL");?></div>
				<?$res = CIBlockElement::GetList(array('name' => 'asc'), array('IBLOCK_ID' => 23, 'ID' => $arResult['MY']['SOLUTIONS']), false, false, array('ID', 'NAME', 'PROPERTY_SOLUTION_ENG_NAME'));?>
				<?while($item = $res->GetNext()):?>
					<div data-value="<?=$item['ID'];?>"><?=$item['NAME'];?></div>
				<?endwhile;?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?//endif;?>
<?endif;?>
<?//echo '<pre>'; print_r($clients_filter); echo '<pre>';
//global $myFilter;
//echo '<pre>'; print_r($myFilter); echo '<pre>';
?>
<div class="clients">
<?foreach($arResult["ITEMS"] as $arItem):?>

<?//echo '<pre>'; print_r($arItem); echo '<pre>';?>
	<a class="a-zoom" href="/clients/<?=$arItem['CODE'];?>/" >
		<div class="zoom">
			<div class="zone"></div>
			<div class="inner bord-grad" style="height: 200px;">
				<div class="c-logo cli"
					style="background-image: url('<?=$arItem["DETAIL_PICTURE"]["SRC"]?>')"
					alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"
					title="<?=$arItem["DETAIL_PICTURE"]["TITLE"]?>"
				>
				</div>
				<div class="c-back"></div>
				<div class="c-text">
					<?=$arItem["PREVIEW_TEXT"];?>
				</div>
			</div>
			<div align="center" class="clear title"><?=$arItem['NAME'];?></div>
		</div>
	</a>

<?endforeach;?>

	<div class="clear"></div>

</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

<?if (!empty($_GET['bxajaxid'])):?>
	<script>
		initDDs();
		initZoom();
		calcResize();
		addSelectedDropdown();
	</script>
<?else:?>
	<script>
		addSelectedDropdown();
	</script>
<?endif;?>

<script>
	flipClients();
	clearInterval(_flipInterval)
	_flipInterval = setInterval( flipClients, 10000);

	setTimeout(function () { calcSideBar() }, 500);
</script>
