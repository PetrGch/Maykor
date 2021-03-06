<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//подключение языковых файлов
__IncludeLang(str_replace('template.php', 'lang/ru/template.php', __FILE__));
$APPLICATION->SetTitle($arResult["NAME"]);
?>
<?global $arBlockFilter;
$arBlockFilter['CP'] = $arResult['ID'];?>

<div class="person-detailed">
	<div class="w33 part">
		<div class="c-logo bord-grad">
			<img
				border="0"
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
				/>
		</div>

		<div class="m20">
			<?/*?>
				<div>
					<div class="w40">
						<b><?=GetMessage("PARTNER_FEDERAL_STATE");?>:</b>
					</div>
					<div class="w60">
						<?if(!empty($arResult['PROPERTIES']['CP_FEDERAL_ZONE']['VALUE'])):?>
							<?foreach ($arResult['PROPERTIES']['CP_FEDERAL_ZONE']['VALUE'] as $ID):?>
								<?$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 28, 'ID' => $ID), false, false, array('ID', 'NAME', 'PROPERTY_FSTATE_ENG_NAME'))->Fetch();?>
								<?=$res['NAME'];?>
								<br />
							<?endforeach;?>
						<?else:?>
							<?$res = CIBlockElement::GetList(array('NAME' => 'ASC'), array('IBLOCK_ID' => 28), false, false, array('ID', 'NAME', 'PROPERTY_FSTATE_ENG_NAME'));?>
							<?while($FS = $res->GetNext()):?>
								<?=$FS['NAME'];?>
								<br />
							<?endwhile;?>
						<?endif;?>
					</div>
					<div class="clear"></div>
				</div>
				<?*/?>
	
			<?if(!empty($arResult['PROPERTIES']['CP_BRANCH']['VALUE'])):?>
				<div class="m10">
					<div class="w40">
						<b><?=GetMessage("PARTNER_BRANCH");?>:</b>
					</div>
					<div class="w60">
						<?foreach ($arResult['PROPERTIES']['CP_BRANCH']['VALUE'] as $ID):?>
							<?$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 34, 'ID' => $ID), false, false, array('ID', 'NAME', 'PROPERTY_BRANCH_ENG_NAME'))->Fetch();?>
							<a class="a-grey" href="/clients/?branch=<?=$res['ID'];?>" target="_blank">
								<?=$res['NAME'];?>
							</a>
							<br />
						<?endforeach;?>
					</div>
					<div class="clear"></div>
				</div>
			<?endif;?>			

			<?if(!empty($arResult['PROPERTIES']['CP_SERVICES']['VALUE'])):?>
				<div class="m10">
					<div class="w40">
						<b><?=GetMessage("PARTNER_SERVICE");?>:</b>
					</div>
					<div class="w60">
						<?foreach ($arResult['PROPERTIES']['CP_SERVICES']['VALUE'] as $ID):?>
							<?$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 5, 'ID' => $ID), false, false, array('ID', 'NAME', 'PROPERTY_SERVICE_ENG_NAME'))->Fetch();?>
							<a class="a-grey" href="/clients/?service=<?=$res['ID'];?>" target="_blank">
							<?=$res['NAME'];?>
							</a>
							<br />
						<?endforeach;?>
					</div>
					<div class="clear"></div>
				</div>
			<?endif;?>

			<?if(!empty($arResult['PROPERTIES']['CP_SOLUTIONS']['VALUE'])):?>
				<div class="m10">
					<div class="w40">
						<b><?=GetMessage("PARTNER_VENDOR");?>:</b>
					</div>
					<div class="w60">
						<?foreach ($arResult['PROPERTIES']['CP_SOLUTIONS']['VALUE'] as $ID):?>
							<?$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 23, 'ID' => $ID), false, false, array('ID', 'NAME', 'PROPERTY_SOLUTION_ENG_NAME'))->Fetch();?>
							<a class="a-grey" href="/clients/?solution=<?=$res['ID'];?>" target="_blank">
							<?=$res['NAME'];?>
							</a>
							<br />
						<?endforeach;?>
					</div>
					<div class="clear"></div>
				</div>
			<?endif;?>
		</div>
	
	</div>

	<div class="w66 part-info">

		<div class="xxl gy"><?=$arResult["NAME"];?></div>

		<div class="m20">
			<?=$arResult["DETAIL_TEXT"];?>
		</div>

	</div>

</div>

<div class="clear"></div>

<?//вывод историй успеха
$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 6, 'PROPERTY_HISTORY_CLIENT' => $arResult["ID"]), false, false, array('NAME', 'PROPERTY_HISTORY_FILE', 'PREVIEW_TEXT', 'DETAIL_PICTURE', 'PROPERTY_HISTORY_ENG_ANOUNCE', 'PROPERTY_HISTORY_ENG_NAME'));?>
<?if ($item = $res->Fetch()):?>
	<div>
		<a class="a-togreen gy" href="/clients/succes_history/">
			<div class="m30 xl"><b><?=GetMessage("TITLE_SUCCES_HISTORY");?>:</b></div>
		</a>
		<div class="m20">
			<?$arFile = CFile::GetFileArray($item['PROPERTY_HISTORY_FILE_VALUE']);?>
				<?$arPicture = CFile::GetFileArray($item['DETAIL_PICTURE']);?>
				<?if (preg_match('/^video.*/', $arFile['CONTENT_TYPE']) != 0):?>
					<?$link = '/about/mediaplayer.php?path='.$arFile['SRC'];?>
					<?$class = "i-vid various fancybox.ajax";?>
				<?else:?>
					<?$class = "i-pdf";?>
					<?$link = "/viewer/".str_replace('iblock/', '', $arFile['SUBDIR'])."/".$arFile['FILE_NAME'];?>
				<?endif;?>
				<div class="s-story">
					<a class="a-null" href="<?=$link;?>" target="_blank">
						<div class="zoom none">
							<div class="zone"></div>
							<div class="inner">
								<div class="<?=$class;?>" style="z-index: 3"></div>
								<div class="c-logo"
									style="background-image: url('<?=$arPicture["SRC"];?>')"
									alt="<?//=$item["DETAIL_PICTURE"]["ALT"]?>"
									title="<?//=$item["DETAIL_PICTURE"]["TITLE"]?>"
									>
								</div>
								<div class="c-back"></div>
								<div class="c-text">
								
									<?=$item["PREVIEW_TEXT"];?>
								</div>
							</div>
							<div align="left" class="a-green l clear title">
								<?=$item["NAME"];?>
							</div>
						</div>
					</a>
				</div>
			<?while ($item = $res->GetNext()):?>
				<?$arFile = CFile::GetFileArray($item['PROPERTY_HISTORY_FILE_VALUE']);?>
				<?$arPicture = CFile::GetFileArray($item['DETAIL_PICTURE']);?>
				<?if (preg_match('/^video.*/', $arFile['CONTENT_TYPE']) != 0):?>
					<?$link = '/about/mediaplayer.php?path='.$arFile['SRC'];?>
					<?$class = "i-vid various fancybox.ajax";?>
				<?else:?>
					<?$class = "i-pdf";?>
					<?$link = "/viewer/".str_replace('iblock/', '', $arFile['SUBDIR'])."/".$arFile['FILE_NAME'];?>
				<?endif;?>
				<div class="s-story m20">
					<a class="a-null" href="<?=$link;?>" target="_blank">
						<div class="zoom none">
							<div class="zone"></div>
							<div class="inner">
								<div class="<?=$class;?>" style="z-index: 3"></div>
								<div class="c-logo"
									style="background-image: url('<?=$arPicture["SRC"];?>')"
									alt="<?//=$item["DETAIL_PICTURE"]["ALT"]?>"
									title="<?//=$item["DETAIL_PICTURE"]["TITLE"]?>"
									>
								</div>
								<div class="c-back"></div>
								<div class="c-text">
									<?=$item["PREVIEW_TEXT"];?>
								</div>
							</div>
							<div align="left" class="clear title a-green l">
								<?=$item["NAME"];?>
							</div>
						</div>
					</a>
				</div>
			<?endwhile;?>
		</div>
	</div>

	<div class="clear"></div>
<?endif;?>


<?global $feedback_filter;?>
<?$feedback_filter = array('PROPERTY_FEEDBACK_CP' => $arResult['ID']);?>

	<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"feedback_in_clients",
			Array(
				"IBLOCK_TYPE" => "clients",
				"IBLOCK_ID" => "30",
				"NEWS_COUNT" => "10",
				"SORT_BY1" => "SORT",
				"SORT_ORDER1" => "ASC",
				"SORT_BY2" => "ACTIVE_FROM",
				"SORT_ORDER3" => "DESC",
				"FILTER_NAME" => "feedback_filter",
				"FIELD_CODE" => array(0=>"DETAIL_TEXT",1=>"DATE_ACTIVE_FROM",),
				"PROPERTY_CODE" => array(0=>"FEEDBACK_COMPANY",1=>"FEEDBACK_ROLE", 2=>"FEEDBACK_ENG_TEXT", 2=>"FEEDBACK_FILE"),
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_SHADOW" => "Y",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"PREVIEW_TRUNCATE_LEN" => "",
				"ACTIVE_DATE_FORMAT" => "",
				"DISPLAY_PANEL" => "N",
				"SET_TITLE" => "N",
				"SET_STATUS_404" => "Y",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"AJAX_OPTION_ADDITIONAL" => ""
			)
		);?>

<?/*?>
<div>
	

	<?$res = CIBlockElement::GetList(array(), array('IBLOCK_TYPE' => 'content', 'PROPERTY_MEDIA_PARTNERS' => $arResult["ID"]));?>
	<?while ($item = $res->GetNext()):?>
		<?$arItems[] = $item['ID'];?>
	<?endwhile;?>
	<?if (count($arItems) != 0):?>
	<div class="m30 gy xl"><b><?=GetMessage("NAME_BLOCK_MATERIALS");?></b></div>
		<div class="m20">
		<?foreach($arItems as $ID){
				$APPLICATION->IncludeComponent("bitrix:news.detail", "materials", Array(
							"DISPLAY_DATE" => "Y",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "Y",
							"DISPLAY_PREVIEW_TEXT" => "Y",
							"AJAX_MODE" => "N",
							"IBLOCK_TYPE" => "content",
							//"IBLOCK_ID" => "4",
							"ELEMENT_ID" => $ID,
							"ELEMENT_CODE" => "",
							"CHECK_DATES" => "Y",
							"FIELD_CODE" => Array("PREVIEW_PICTURE"),
							"PROPERTY_CODE" => Array("MEDIA_ENG_TEXT"),
							"IBLOCK_URL" => "",
							"META_KEYWORDS" => "KEYWORDS",
							"META_DESCRIPTION" => "DESCRIPTION",
							"BROWSER_TITLE" => "BROWSER_TITLE",
							"DISPLAY_PANEL" => "Y",
							"SET_TITLE" => "N",
							"SET_STATUS_404" => "Y",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"ADD_SECTIONS_CHAIN" => "N",
							"ACTIVE_DATE_FORMAT" => "d.m.Y",
							"CACHE_TYPE" => "N",
							"CACHE_TIME" => "3600",
							"CACHE_GROUPS" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "Y",
							"AJAX_OPTION_HISTORY" => "N"
						)
					);
		}
		?>
		</div>
	<?endif;?>
</div>
<?*/?>

<div class="clear"></div>