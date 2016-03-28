<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?global $feedback_filter, $arBranches, $arServices, $arYears;?>

	<div class="c-filters m20" id="first_filter">
		Отрасль:
		<div class="f-dd" id="branch" data-value="<?=$_REQUEST['branch'];?>" data-on-change="filterFeedbacks($(this))" style="z-index: 11">
			<div class="f-dd-head closed"><?=GetMessage("ALL");?></div>
			<div class="f-dd-list hidden">
					<div data-value=""><?=GetMessage("ALL");?></div>
					<?$res = CIBlockElement::GetList(array('name' => 'asc'), array('IBLOCK_ID' => 34, 'ID' => $arBranches), false, false, array('ID', 'NAME', 'PROPERTY_BRANCH_ENG_NAME'));?>
					<?while($item = $res->GetNext()):?>
						<div data-value="<?=$item['ID'];?>"><?=$item['NAME'];?></div>
					<?endwhile;?>
			</div>
		</div>
	</div>
	<div class="c-filters m10">
		Год:
		<div class="f-dd" id="year" data-value="<?=$_REQUEST['year'];?>" data-on-change="filterFeedbacks($(this))" style="z-index: 10">
			<div class="f-dd-head closed"><?=GetMessage("ALL");?></div>
			<div class="f-dd-list hidden">
				<div data-value=""><?=GetMessage("ALL");?></div>
				<?foreach($arYears as $year):?>
					<div data-value="<?=$year;?>"><?=$year;?></div>
				<?endforeach;?>
			</div>
		</div>
	</div>
<?/*?>
<div class="c-filters m10">
	Услуга:
	<div class="f-dd" id="service" data-value="<?=$_REQUEST['service'];?>" data-on-change="filterFeedbacks(e)" style="z-index: 9">
		<div class="f-dd-head closed"><?=GetMessage("ALL");?></div>
		<div class="f-dd-list hidden">
				<div data-value=""><?=GetMessage("ALL");?></div>
				<?//сортировка по названиям услуг
				foreach ($arServices as $key => $value){
					$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 5, 'ID' => $key), false, false, array('ID', 'NAME', 'PROPERTY_SERVICE_ENG_NAME'))->Fetch();
					$arSortServ[$key] = $res['NAME'];
				}
				asort($arSortServ);
				?>
				<?foreach ($arSortServ as $key => $name):?>
					<b><div data-value="<?=$key;?>"><?=$name;?></div></b>
					<?if ($sub_service = $arServices[$key]):?>
						<?$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 5, 'ID' => $sub_service), false, false, array('ID', 'NAME', 'PROPERTY_SERVICE_ENG_NAME'));?>
						<?while($item = $res->GetNext()):?>
							<div data-value="<?=$item['ID'];?>"><?=$item['NAME'];?></div>
						<?endwhile;?>
					<?endif;?>
				<?endforeach;?>
		</div>
	</div>
</div>
<?*/?>

<?
$arFilterYear = array();
if (!empty($_REQUEST['year'])){
	$arFilterYear['><DATE_ACTIVE_FROM'] = array('01.01.'.$_REQUEST['year'].' 00:00:00', '31.12.'.$_REQUEST['year'].' 23:59:59');
}?>

<?foreach ($arResult['ITEMS'] as $key => $arItem):?>

<div class="w100 <?=($arItem['CODE'] == $_REQUEST['COMPANY'] ? 'to-anchor' : '');?>">
	<a class="a-togreen gy xl" href="/clients/<?=$arItem['CODE'];?>/">
		<div class="fback-client">	
			<div class="photo bord-grad">
				<img src="<?=$arItem['DETAIL_PICTURE']['SRC']?>">
			</div>
			<span class="text">
				<?=$arItem['NAME'];?>
			</span>
		</div>
	</a>
</div>

<div class="m30">

	<?
	$arFilter = array('IBLOCK_ID' => 30, 'PROPERTY_FEEDBACK_CP' => $arItem['ID'], 'PROPERTY_FEEDBACK_BRANCH' => $_REQUEST['branch'], 'PROPERTY_FEEDBACK_SERVICES' => $_REQUEST['service']);
	$arFilter = array_merge($arFilter, $arFilterYear);
	$obFeedback = CIBlockElement::GetList(array('sort' => 'asc', 'active_from' => 'desc'), $arFilter, false, false, array('NAME', 'PROPERTY_FEEDBACK_ROLE', 'DETAIL_TEXT', 'PROPERTY_FEEDBACK_FILE'));?>

	<div class="m20 fback">
		<?while( $arFeedback = $obFeedback->GetNext() ):?>
		<?//echo '<pre>'; print_r($arFeedback); echo '<pre>';?>
		<div class="m30">
			<div class="w25 s">
				<b class="gy"><?=$arFeedback['NAME'];?></b><br />
				<?=$arFeedback['PROPERTY_FEEDBACK_ROLE_VALUE'];?>
				<br />
			</div>
			<div class="w75">
				<div class="a-quote w100">
					<?=$arFeedback['DETAIL_TEXT'];?>
				</div>
				<?if (!empty($arFeedback['PROPERTY_FEEDBACK_FILE_VALUE'])):
					$arFile = CFile::GetFileArray($arFeedback['PROPERTY_FEEDBACK_FILE_VALUE']);
					$filesize = round($arFile['FILE_SIZE']/1048576, 1);?>
					<div class="pdf-block">
							<img src="<?=SITE_TEMPLATE_PATH;?>/images/pdf.png">
							<div>
								<div class="text"><?=GetMessage('FEEDBACK_INFORMATION');?></div>
								<a class="a-green" href="/viewer/<?=str_replace('iblock/', '', $arFile['SUBDIR']).'/'.$arFile['FILE_NAME'];?><?=(!empty($_REQUEST['branch']) ? '/branch='.$_REQUEST['branch'] : '');?><?=(!empty($_REQUEST['service']) ? '/service='.$_REQUEST['service'] : '');?>" target="_blank">
									<?=GetMessage('FEEDBACK_DOWNLOAD');?> (PDF <?=$filesize;?>Mb)
								</a>
							</div>
					</div>
				<?endif;?>
			</div>
			<div class="clear"></div>
		</div>
		<?endwhile;?>
	</div>

</div>

<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

<?if (!empty($_GET['bxajaxid'])):?>
<script>
	initDDs();
	calcSideBar();
	addSelectedDropdown();
</script>
<?else:?>
<script>
	addSelectedDropdown();
</script>
<?endif;?>