<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
global $vacancy_filter, $pageNo;
?>
				<table class="m-filters">
					<tr> 
						<td><?=GetMessage("CITY_DOT_DOT");?></td>
						<td>

							<div class="f-dd" id="city" name="vacancy_city" data-value="<?=$vacancy_filter['PROPERTY_TARGET_CITY'];?>" data-on-change="filterVacancy($(this));" style="z-index: 11">
								<div class="f-dd-head closed">
								<?if(!empty($vacancy_filter['PROPERTY_TARGET_CITY'])){
									$res_city = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 17, 'ID' => $vacancy_filter['PROPERTY_TARGET_CITY']))->Fetch();
									echo $res_city['NAME'];
								}
								else
									echo GetMessage("ALL");
								?>
								</div>
								<div class="f-dd-list hidden">
									<div data-value=""><?=GetMessage("ALL");?></div>
									<?foreach($arResult['MY']['CITY'] as $city):?>
										<?$res = CIBlockElement::GetList(array('NAME' => 'ASC'), array("IBLOCK_ID" => 17, "ID" => $city, "ACTIVE" => "Y"), false, false, array("ID", "NAME", "PROPERTY_ENG_NAME"))->Fetch();?>
										<div data-value="<?=$res['ID'];?>">
											<?=$res['NAME'];?>
										</div>
									<?endforeach;?>
								</div>
							</div>

						</td>
					</tr>
					<tr>
						<td><?=GetMessage("SCOPE_DOT_DOT");?></td>

						<td>
							<div class="f-dd vac-scope" id="scope" name="vacancy_scope" data-value="<?=$vacancy_filter['PROPERTY_SCOPE_ACTIVITY'];?>" data-on-change="filterVacancy($(this));" style="z-index: 10">
								<div class="f-dd-head closed">
									<?if(!empty($vacancy_filter['PROPERTY_SCOPE_ACTIVITY'])){
										$res_scope = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 18, 'ID' => $vacancy_filter['PROPERTY_SCOPE_ACTIVITY']))->Fetch();
										echo $res_scope['NAME'];
									}
									else
										echo GetMessage("ALL");
									?>
								</div>
								<div class="f-dd-list hidden">
									<div data-value=""><?=GetMessage("ALL");?></div>
									<?foreach($arResult['MY']['SCOPE'] as $scope):?>
										<?$res = CIBlockElement::GetList(array('NAME' => 'ASC'), array("IBLOCK_ID" => 18, "ACTIVE" => "Y", "ID" => $scope), false, false, array("ID", "NAME", "PROPERTY_ENG_SCOPE_NAME"))->Fetch();?>
										<div data-value="<?=$res['ID'];?>"><?=$res['NAME'];?></div>
									<?endforeach;?>
								</div>
							</div>
						</td>

					</tr>
				</table>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?foreach($arItem['PROPERTIES']['TARGET_CITY']['VALUE'] as $cityID):?>
	<?$res = CIBlockElement::GetList(array(), array("IBLOCK_ID" => 17, "ID" => $cityID, "ACTIVE" => "Y"), false, false, array("ID", "PROPERTY_FEDERAL_STATE.CODE"))->Fetch();?>
		<?if ((empty($vacancy_filter['PROPERTY_TARGET_CITY']) || $cityID == $vacancy_filter['PROPERTY_TARGET_CITY']) && ($vacancy_filter['PROPERTY_VACANCY_STATE'] == $res['PROPERTY_FEDERAL_STATE_CODE'] || empty($vacancy_filter['PROPERTY_VACANCY_STATE']))):?>
			<?$create_adminID = $arItem['CREATED_BY'];?>
			<?$city = CIBlockElement::GetList(array(), array('ID' => $cityID), false, false, array('NAME', 'PROPERTY_ENG_NAME'))->Fetch();?>
			<div class="vac">

				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>

				<div class="vac-left" onclick="onCityClick($(this));">
					<?=GetMessage("CITY_DOT_DOT");?> 
					<b data-value="<?=$cityID;?>"><?=$city['NAME'];?></b>
				</div>
				<div class="vac-right">
					<div class="gy head">
						<?=$arItem["NAME"];?>
					</div>
					<div>
						<div class="hidden s-list">
							<div class="text">
								<?=$arItem["DETAIL_TEXT"];?>
							</div>
							<a class="f-button" href="mailto:hr@maykor.com" tooltip="Отправить резюме на hr@maykor.com"><?=GetMessage("VACANCY_APPLY_NOW");?></a>
						</div>
						<div class="vac-tgl gy slide closed"><?=GetMessage("VACANCY_GET_MORE");?></div>
					</div>
				</div>

				<div class="clear"></div>
			</div>
		<?endif;?>
	<?endforeach;?>
<?endforeach;?>
<?//echo '<pre>'; print_r($vacancy_filter); echo '<pre>';?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?$APPLICATION->IncludeComponent(
			"maykor:my.pagenavigation",
			"my_nav",
			array(
				"RECORD_COUNT" => $arResult["RECORD_COUNT"],
				"NAV_TITLE" => $arParams["PAGER_TITLE"],
				"SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
				"NEWS_COUNT" => $arParams["NEWS_COUNT"],
				"PAGE_NO" => $pageNo,
				"NAV_NUM" => 3,
			),
			$parentComponent,
			array(
				"HIDE_ICONS" => "Y"
			)
		);?>
<?endif;?>

<script>//calcSideBar();</script>
<?if (!empty($_GET['bxajaxid'])):?>
<script>
	initSubmenu('#vacancies_filter');
	feedbackVacancy();
	initDDs();
	calcResize();
	calcSideBar();
</script>
<?endif;?>