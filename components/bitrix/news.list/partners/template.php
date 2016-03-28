<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?global $partner_filter;?>

<div class="c-filters m20" id="first_filter">
	Сфера:
	<div class="f-dd" id="branch" name="partner-sfere" data-value="<?=$partner_filter['PROPERTY_CP_SFERE'];?>" data-on-change="filterPartners(e)" style="z-index: 17;">
		<div class="f-dd-head closed">
			<?if(!empty($partner_filter['PROPERTY_CP_SFERE'])){
				$res_partner = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 40, 'ID' => $partner_filter['PROPERTY_CP_SFERE']))->Fetch();
				echo $res_partner['NAME'];
			}
			else
				echo GetMessage("ALL");
			?>
		</div>
		<div class="f-dd-list hidden">
			<div data-value=""><?=GetMessage("ALL");?></div>
			<?$arSferes = array();?>
			<?$sfere = CIBlockElement::GetList(array('PROPERTY_CP_SFERE.SORT' => 'ASC'), array('IBLOCK_ID' => 36), false, false, array('ID', 'PROPERTY_CP_SFERE'));?>
			<?while ($arItem = $sfere->GetNext()):?>
				<?$value = $arItem['PROPERTY_CP_SFERE_VALUE'];?>
				<?if (!in_array($value, $arSferes) && !empty($value)):?>
					<?$arSferes[] = $value;?>
					<?$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 40, 'ID' => $value), false, false, array('ID', 'NAME', 'PROPERTY_SFERE_ENG_NAME'))->Fetch();?>
					<div data-value="<?=$value;?>"><?=$res['NAME'];?></div>
				<?endif;?>
			<?endwhile;?>
		</div>
	</div>
</div>

<div id="clients" class="clients">

<?foreach($arResult["ITEMS"] as $arItem):?>

	<a href="<?echo $arItem["DETAIL_PAGE_URL"].$arItem["CODE"]?>/" class="a-zoom">
		<div class="zoom partner">
			<div class="zone"></div>
			<div class="inner bord-grad" style="height: 200px;">
				<div class="c-logo cli"
					style="background-image: url(<?=$arItem["DETAIL_PICTURE"]["SRC"]?>)"
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

</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

<?if (!empty($_GET['bxajaxid'])):?>
<script>
	initDDs();
	initZoom();
	calcResize();
	calcSideBar();
	addSelectedDropdown();
</script>
<?endif;?>

<script>
	flipClients();
	clearInterval(_flipInterval)
	_flipInterval = setInterval( flipClients, 10000);
</script>
