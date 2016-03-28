<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
?>
<?global $filial_filter;?>

<?//=GetMessage("FEDERAL_STATE_DOT_DOT");
	//фильтр по федеральным округам?>
	<div class="c-filters m20">
		География:
		<div class="f-dd map-filter" name="federal_state" id="federal_filter" data-value="<?=$filial_filter[0][0]['=PROPERTY_FILIAL_FEDERAL_STATE.CODE'];?>" data-on-change="filterFederalState();">
			<div class="f-dd-head closed">
				<?if(!empty($filial_filter[0][0]['=PROPERTY_FILIAL_FEDERAL_STATE.CODE'])){
					$res_fs = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 42, 'CODE' => $filial_filter[0][0]['=PROPERTY_FILIAL_FEDERAL_STATE.CODE']))->Fetch();
					echo $res_fs['NAME'];
				}
				else
					echo GetMessage("ALL");
				?>
			</div>
			<div class="f-dd-list hidden">
				<div data-value=""><?=GetMessage("ALL");?></div>
				<?$res = CIBlockElement::GetList(array('property_FILIAL_FEDERAL_STATE.NAME' => 'asc'), array("IBLOCK_ID" => 33, "ACTIVE" => "Y"), false, false, array("ID", "PROPERTY_FILIAL_FEDERAL_STATE.NAME", "PROPERTY_FILIAL_FEDERAL_STATE.CODE", "PROPERTY_FILIAL_FEDERAL_STATE", "PROPERTY_FILIAL_FEDERAL_STATE.PROPERTY_FSTATE_ENG_NAME"));?>
				<?while ($item = $res->GetNext()):?>
				<?//echo '<pre>'; print_r($item); echo '<pre>';?>
					<?if (!in_array($item['PROPERTY_FILIAL_FEDERAL_STATE_CODE'], $arFilials)):?>
						<div data-value="<?=$item['PROPERTY_FILIAL_FEDERAL_STATE_CODE'];?>">
							<?=$item['PROPERTY_FILIAL_FEDERAL_STATE_NAME'];?>
						</div>
						<?$arFilials[] = $item['PROPERTY_FILIAL_FEDERAL_STATE_CODE'];?>
					<?endif;?>
				<?endwhile;?>
			</div>
		</div>
	</div>

<div class="counterparts">
	
<?foreach($arResult["ITEMS"] as $arItem):?>
	<div>
		<a href="<?=$arItem["CODE"];?>/" class="a-togreen gy">
			
			<img
			class="preview_picture bord-grad"
			border="0"
			src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
			width="100%"
			height="auto"
			alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
			title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
			/>

			<div class="m5 title">
				<?=$arItem['NAME'];?>
			</div>			

		</a>
	</div>

<?endforeach;?>

</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

<?if (!empty($_GET['bxajaxid'])):?>
<script>
	initDDs();
	calcResize();
</script>
<?endif;?>

<script>
	$(window).on( "ready", function () {

		/*$("#right-menu").hide();
		$(".keyphrases").css("margin-bottom", 90);

		setContentH();
		calcSideBar();	*/
	})
</script>