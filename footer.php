<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
							</div>
						<div class="clear"></div>
						</div>
						<?if ($APPLICATION->GetCurPage(true) != '/index.php'):?>	
							<div class="back"><a href='javascript:history.go(-1)' class="a-togreen m bk">Назад</a></div>
						<div class="visited-block">
								<div class="dia-border tl"></div>

								<div class="right-block bordered">

									<div class="visited">
										Недавно <br /> 
										просмотренные
									</div>
									<div class="visited-list hidden">
										<?foreach($_SESSION['RECENT_PAGES'] as $key => $value):?>
											<div class="visited-item"><a href="<?=$value;?>" class="a-togreen wgy"><?=$key;?></a></div>
										<?endforeach;?>
									 </div>

									<div class="visited active">
										Самые <br /> 
										популярные
									</div>
									 <div class="visited-list">
									 <?$res = CIBlockElement::GetList(array('sort' => 'asc'), array('IBLOCK_ID' => 35, 'ACTIVE' => 'Y'), false, false, array('NAME', 'PROPERTY_POPULAR_LINK'));?>
									 <?for($i=1;$i<=3;$i++):?>
										 <?if ($item = $res->Fetch()):?>
										 	<div class="visited-item">
										 		<a href="<?=$item['PROPERTY_POPULAR_LINK_VALUE'];?>" class="a-togreen wgy">
										 		<?=$item['NAME'];?>
											 	</a>
											 </div>
									 	 <?endif?>
									 <?endfor;?>
									  </div>
								</div>

								<div class="dia-border bl"></div>
						</div>
						<?endif;?>
			</div>

			<?if ($APPLICATION->GetCurPage(true) != '/index.php'):?>
				<div id="sidebar">

					<div class="keyphrases">
						<?global $slider_filter;?>
						<?//получение свойств главного раздела
						$section = $top_item['TEXT'];?>

						<?if (!empty($arBlockFilter['SERVICE'])):?>
							<?$slider_filter['PROPERTY_SLIDES_SERVICE'] = $arBlockFilter['SERVICE'];?>
						<?elseif (!empty($arBlockFilter['BRANCH'])):?>
							<?$slider_filter['PROPERTY_SLIDES_BRANCH'] = $arBlockFilter['BRANCH'];?>
						<?else:?>
							<?$slider_filter['PROPERTY_SECTIONS_VALUE'] = $section;?>
						<?endif;?>

						<?$APPLICATION->IncludeComponent(
								"bitrix:news.list",
								"key_phrases_slider",
								Array(
									"IBLOCK_TYPE" => "tools",
									"IBLOCK_ID" => "16",
									"NEWS_COUNT" => "5",
									"SORT_BY1" => "SORT",
									"SORT_ORDER1" => "ASC",
									"SORT_BY2" => "ACTIVE_FROM",
									"SORT_ORDER3" => "DESC",
									"FILTER_NAME" => "slider_filter",
									"FIELD_CODE" => array(0=>"",1=>"",),
									"PROPERTY_CODE" => array(0=>"FIGURE_PARAMETER",1=>"SLIDES_URL_LINK", 2=>"SLIDES_ENG_TEXT"),
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
									"CACHE_GROUPS" => "N",
									"PREVIEW_TRUNCATE_LEN" => "",
									"ACTIVE_DATE_FORMAT" => "",
									"DISPLAY_PANEL" => "N",
									"SET_TITLE" => "N",
									"SET_STATUS_404" => "Y",
									"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
									"ADD_SECTIONS_CHAIN" => "N",
									"HIDE_LINK_WHEN_NO_DETAIL" => "N",
									"PARENT_SECTION_CODE" => "",
									"DISPLAY_TOP_PAGER" => "N",
									"DISPLAY_BOTTOM_PAGER" => "N",
									"DISPLAY_DATE" => "Y",
									"DISPLAY_NAME" => "Y",
									"DISPLAY_PICTURE" => "Y",
									"DISPLAY_PREVIEW_TEXT" => "Y",
									"AJAX_OPTION_ADDITIONAL" => ""
								)
							);?>

						<div class="dia-border-base"> </div>
					</div>

					<div class="sidebar-inner">
						<div id="right-menu">
							<div class="dia-border tr"></div>

							<?$APPLICATION->IncludeComponent("bitrix:menu", "right_menu", array(
								"ROOT_MENU_TYPE" => "right",
								"CHILD_MENU_TYPE" => "sub",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_TIME" => "36000000",
								"MENU_CACHE_GET_VARS" => array(
								),
								"MAX_LEVEL" => "2",
								"USE_EXT" => "Y",
								"ALLOW_MULTI_SELECT" => "Y",
								"SHOW_LAST_LEVEL_BUTTONS" => "Y"
									),
								false
							);?>
							<div class="dia-border br"></div>
						</div>

						<!--div class="right-optional"-->
						<div class="right-optional">
							<?
							//ввод раздела для определения количества блоков
							if(empty($menu_item))
								$page = $top_item['LINK'];
							else
								$page = $menu_item['LINK'];
							if (!in_array($page, array('/about/history.php', '/about/contacts/feedback.php')))
								$page = preg_replace('/\/[a-z_0-9-]*\.php$/', '/', $page);
							if(in_array($top_item['LINK'], array('/services/', '/about/'))){
								$page = preg_replace('/(\/(about|services)\/[a-z_0-9-]+\/).*$/', '$1', $page);
								//echo $page;
							}
							?>
							
							<?
							$block_option = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 24, 'CODE' => $page), false, false, array('PROPERTY_BLOCK_NEWS', 'PROPERTY_BLOCK_FEEDBACK', 'PROPERTY_BLOCK_STORY', 'PROPERTY_BLOCK_EVENT', 'PROPERTY_BLOCK_HOTS', 'PROPERTY_BLOCK_MATERIALS', 'PROPERTY_BLOCK_ADVERTIS'))->Fetch();
							$findDates = array(FormatDate("d.m.Y H:i:s", mktime(date("H"), date("i"), date("s"), date("m")-6, date("d"),   date("Y"))), FormatDate("d.m.Y H:i:s", time()));
							?>
						<?if($block_option['PROPERTY_BLOCK_NEWS_VALUE'] == 'Выводить'):?>
							<?$news_block_filter = array(array('LOGIC' => 'OR', array('PROPERTY_NEWS_FEDERAL_STATE.CODE' => $_SESSION['REGION']), array('=PROPERTY_NEWS_FEDERAL_STATE' => false)), 'PROPERTY_NEWS_CP' => $arBlockFilter['CP'], 'PROPERTY_NEWS_PARTNERS' => $arBlockFilter['PARTNER'], 'PROPERTY_NEWS_BRANCH' => $arBlockFilter['BRANCH'], 'PROPERTY_NEWS_SERVICE' => $arBlockFilter['SERVICE'], "><DATE_ACTIVE_FROM" => $findDates);?>
								<?// блок Новости
								$APPLICATION->IncludeComponent(
									"bitrix:news.list",
									"news_in_block",
									Array(
										"IBLOCK_TYPE" => "news",
										"IBLOCK_ID" => "1",
										"NEWS_COUNT" => "1",
										"SORT_BY1" => "RAND",
										"SORT_ORDER1" => "ASC",
										"SORT_BY2" => "SORT",
										"SORT_ORDER2" => "ASC",
										"FILTER_NAME" => "news_block_filter",
										"FIELD_CODE" => array("DATE_CREATE"),
										"PROPERTY_CODE" => array(0=>"",1=>"",),
										"CHECK_DATES" => "Y",
										"DETAIL_URL" => "/press/news/",
										"AJAX_MODE" => "N",
										"AJAX_OPTION_SHADOW" => "Y",
										"AJAX_OPTION_JUMP" => "N",
										"AJAX_OPTION_STYLE" => "Y",
										"AJAX_OPTION_HISTORY" => "N",
										"CACHE_TYPE" => "A",
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
										"PARENT_SECTION_CODE" => "",
										"DISPLAY_TOP_PAGER" => "N",
										"DISPLAY_BOTTOM_PAGER" => "N",
										"DISPLAY_DATE" => "Y",
										"DISPLAY_NAME" => "Y",
										"DISPLAY_PICTURE" => "Y",
										"DISPLAY_PREVIEW_TEXT" => "Y",
										"AJAX_OPTION_ADDITIONAL" => ""
									)
								);?>
						
						<?endif;?>

						<?if($block_option['PROPERTY_BLOCK_FEEDBACK_VALUE'] == 'Выводить'):?>
							<?
							if(in_array($top_item['LINK'], array('/services/', '/branches/')) && !empty($menu_item['LINK'])){
								$feedback_block_filter = array(array('LOGIC' => 'OR', array('PROPERTY_FEEDBACK_FEDERAL_STATE.CODE' => $_SESSION['REGION']), array('=PROPERTY_FEEDBACK_FEDERAL_STATE' => false)), 'PROPERTY_FEEDBACK_BRANCH' => $arBlockFilter['BRANCH'], 'PROPERTY_FEEDBACK_SERVICES' => $arBlockFilter['SERVICE']);
							}
							$feedback_block_filter["><DATE_ACTIVE_FROM"] = $findDates;
								// блок Отзывы
								$APPLICATION->IncludeComponent(
									"bitrix:news.list",
									"feedback_in_block",
									Array(
										"IBLOCK_TYPE" => "clients",
										"IBLOCK_ID" => "30",
										"NEWS_COUNT" => "1",
										"SORT_BY1" => "RAND",
										"SORT_ORDER1" => "ASC",
										"SORT_BY2" => "SORT",
										"SORT_ORDER2" => "ASC",
										"FILTER_NAME" => "feedback_block_filter",
										"FIELD_CODE" => array("DATE_CREATE"),
										"PROPERTY_CODE" => array("FEEDBACK_ENG_ANOUNCE", "FEEDBACK_CP", "FEEDBACK_PARTNERS"),
										"CHECK_DATES" => "Y",
										"DETAIL_URL" => "",
										"AJAX_MODE" => "N",
										"AJAX_OPTION_SHADOW" => "Y",
										"AJAX_OPTION_JUMP" => "N",
										"AJAX_OPTION_STYLE" => "Y",
										"AJAX_OPTION_HISTORY" => "N",
										"CACHE_TYPE" => "A",
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
										"PARENT_SECTION_CODE" => "",
										"DISPLAY_TOP_PAGER" => "N",
										"DISPLAY_BOTTOM_PAGER" => "N",
										"DISPLAY_DATE" => "Y",
										"DISPLAY_NAME" => "Y",
										"DISPLAY_PICTURE" => "Y",
										"DISPLAY_PREVIEW_TEXT" => "Y",
										"AJAX_OPTION_ADDITIONAL" => ""
									)
								);?>
							
						<?endif;?>

						<?if($block_option['PROPERTY_BLOCK_STORY_VALUE'] == 'Выводить'):?>
							<?$history_block_filter = array(array('LOGIC' => 'OR', array('PROPERTY_HISTORY_FEDERAL_STATE.CODE' => $_SESSION['REGION']), array('=PROPERTY_HISTORY_FEDERAL_STATE' => false)), 'PROPERTY_HISTORY_CLIENT' => $arBlockFilter['CP'], 'PROPERTY_HISTORY_PARTNER' => $arBlockFilter['PARTNER'], 'PROPERTY_HISTORY_BRANCH' => $arBlockFilter['BRANCH'], 'PROPERTY_HISTORY_SERVICE' => $arBlockFilter['SERVICE']);?>
						
								<?// блок История успеха
								$APPLICATION->IncludeComponent(
									"bitrix:news.list",
									"history_in_block",
									Array(
										"IBLOCK_TYPE" => "clients",
										"IBLOCK_ID" => "6",
										"NEWS_COUNT" => "1",
										"SORT_BY1" => "RAND",
										"SORT_ORDER1" => "ASC",
										"SORT_BY2" => "SORT",
										"SORT_ORDER2" => "ASC",
										"FILTER_NAME" => "history_block_filter",
										"FIELD_CODE" => array("DATE_CREATE", "DETAIL_TEXT"),
										"PROPERTY_CODE" => array(0=>"HISTORY_FILE",1=>"HISTORY_ENG_TEXT",),
										"CHECK_DATES" => "Y",
										"DETAIL_URL" => "",
										"AJAX_MODE" => "N",
										"AJAX_OPTION_SHADOW" => "Y",
										"AJAX_OPTION_JUMP" => "N",
										"AJAX_OPTION_STYLE" => "Y",
										"AJAX_OPTION_HISTORY" => "N",
										"CACHE_TYPE" => "A",
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
										"PARENT_SECTION_CODE" => "",
										"DISPLAY_TOP_PAGER" => "N",
										"DISPLAY_BOTTOM_PAGER" => "N",
										"DISPLAY_DATE" => "Y",
										"DISPLAY_NAME" => "Y",
										"DISPLAY_PICTURE" => "Y",
										"DISPLAY_PREVIEW_TEXT" => "Y",
										"AJAX_OPTION_ADDITIONAL" => ""
									)
								);?>
							
						<?endif;?>

						<?if($block_option['PROPERTY_BLOCK_EVENT_VALUE'] == 'Выводить'):?>
							<?$events_block_filter = array(array('LOGIC' => 'OR', array('PROPERTY_PHOTO_FEDERAL_STATE.CODE' => $_SESSION['REGION']), array('=PROPERTY_PHOTO_FEDERAL_STATE' => false)), 'PROPERTY_PHOTO_PARTNERS' => $arBlockFilter['CP'], 'PROPERTY_PHOTO_CPARTNERS' => $arBlockFilter['PARTNER'], 'PROPERTY_PHOTO_BRANCH' => $arBlockFilter['BRANCH'], 'PROPERTY_PHOTO_SERVICES' => $arBlockFilter['SERVICE'], "><DATE_ACTIVE_FROM" => $findDates);?>
						
								<?// блок Мероприятия
								$APPLICATION->IncludeComponent(
									"bitrix:news.list",
									"events_in_block",
									Array(
										"IBLOCK_TYPE" => "news",
										"IBLOCK_ID" => "7",
										"NEWS_COUNT" => "1",
										"SORT_BY1" => "ACTIVE_FROM",
										"SORT_ORDER1" => "DESC",
										"SORT_BY2" => "SORT",
										"SORT_ORDER2" => "ASC",
										"FILTER_NAME" => "events_block_filter",
										"FIELD_CODE" => array("DATE_CREATE"),
										"PROPERTY_CODE" => array(0=>"PHOTO_ENG_NAME",1=>"PHOTO_ENG_ANOUNCE",),
										"CHECK_DATES" => "Y",
										"DETAIL_URL" => "/press/activity/",
										"AJAX_MODE" => "N",
										"AJAX_OPTION_SHADOW" => "Y",
										"AJAX_OPTION_JUMP" => "N",
										"AJAX_OPTION_STYLE" => "Y",
										"AJAX_OPTION_HISTORY" => "N",
										"CACHE_TYPE" => "A",
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
										"PARENT_SECTION_CODE" => "",
										"DISPLAY_TOP_PAGER" => "N",
										"DISPLAY_BOTTOM_PAGER" => "N",
										"DISPLAY_DATE" => "Y",
										"DISPLAY_NAME" => "Y",
										"DISPLAY_PICTURE" => "Y",
										"DISPLAY_PREVIEW_TEXT" => "Y",
										"AJAX_OPTION_ADDITIONAL" => ""
									)
								);?>
					
						<?endif;?>

						<?if($block_option['PROPERTY_BLOCK_HOTS_VALUE'] == 'Выводить'):?>
							<?$hots_block_filter = array(array('LOGIC' => 'OR', array('PROPERTY_ABOUT_FEDERAL_STATE.CODE' => $_SESSION['REGION']), array('=PROPERTY_ABOUT_FEDERAL_STATE' => false)), 'PROPERTY_ABOUT_PARTNERS' => $arBlockFilter['CP'], 'PROPERTY_ABOUT_CPARTNERS' => $arBlockFilter['PARTNER'], 'PROPERTY_ABOUT_BRANCH' => $arBlockFilter['BRANCH'], 'PROPERTY_ABOUT_SERVICES' => $arBlockFilter['SERVICE'], "><DATE_ACTIVE_FROM" => $findDates);?>
					
								<?// блок Горячие темы
								$APPLICATION->IncludeComponent(
									"bitrix:news.list",
									"hots_in_block",
									Array(
										"IBLOCK_TYPE" => "news",
										"IBLOCK_ID" => "8",
										"NEWS_COUNT" => "1",
										"SORT_BY1" => "ACTIVE_FROM",
										"SORT_ORDER1" => "DESC",
										"SORT_BY2" => "SORT",
										"SORT_ORDER2" => "ASC",
										"FILTER_NAME" => "hots_block_filter",
										"FIELD_CODE" => array("DATE_CREATE"),
										"PROPERTY_CODE" => array(0=>"ABOUT_ENG_NAME",1=>"ABOUT_ENG_ANOUNCE",),
										"CHECK_DATES" => "Y",
										"DETAIL_URL" => "/press/press_about_us/",
										"AJAX_MODE" => "N",
										"AJAX_OPTION_SHADOW" => "Y",
										"AJAX_OPTION_JUMP" => "N",
										"AJAX_OPTION_STYLE" => "Y",
										"AJAX_OPTION_HISTORY" => "N",
										"CACHE_TYPE" => "A",
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
										"PARENT_SECTION_CODE" => "",
										"DISPLAY_TOP_PAGER" => "N",
										"DISPLAY_BOTTOM_PAGER" => "N",
										"DISPLAY_DATE" => "Y",
										"DISPLAY_NAME" => "Y",
										"DISPLAY_PICTURE" => "Y",
										"DISPLAY_PREVIEW_TEXT" => "Y",
										"AJAX_OPTION_ADDITIONAL" => ""
									)
								);?>
			
						<?endif;?>

						<?if($block_option['PROPERTY_BLOCK_MATERIALS_VALUE'] == 'Выводить'):?>
							<?$material_block_filter = array('IBLOCK_ACTIVE' => 'Y', 'ACTIVE' => 'Y', 'IBLOCK_TYPE' => 'content', array('LOGIC' => 'OR', array('PROPERTY_MEDIA_FEDERAL_STATE.CODE' => $_SESSION['REGION']), array('=PROPERTY_MEDIA_FEDERAL_STATE' => false)), 'PROPERTY_MEDIA_PARTNERS' => $arBlockFilter['CP'], 'PROPERTY_MEDIA_CPARTNERS' => $arBlockFilter['PARTNER'], 'PROPERTY_MEDIA_BRANCH' => $arBlockFilter['BRANCH'], '!IBLOCK_CODE' => '%_eng%', 'PROPERTY_SERVICE_LINK' => $arBlockFilter['SERVICE'], "><DATE_ACTIVE_FROM" => $findDates);?>
							
								<?// блок Материалы
								$material = CIBLockElement::GetList(array('rand' => 'asc'), $material_block_filter, false, false, array())->Fetch();
								if (!empty($material['ID'])):?>
								<div class="opt-block">
								<?$APPLICATION->IncludeComponent("bitrix:news.detail", "material_in_block", Array(
										"DISPLAY_DATE" => "Y",
										"DISPLAY_NAME" => "Y",
										"DISPLAY_PICTURE" => "Y",
										"DISPLAY_PREVIEW_TEXT" => "Y",
										"AJAX_MODE" => "N",
										"IBLOCK_TYPE" => "content",
										"IBLOCK_ID" => "",
										"ELEMENT_ID" => $material['ID'],
										"ELEMENT_CODE" => "",
										"CHECK_DATES" => "Y",
										"FIELD_CODE" => Array("ID", "PREVIEW_TEXT", "PREVIEW_PICTURE"),
										"PROPERTY_CODE" => Array("MEDIA_ENG_TEXT", "MEDIA_FILE"),
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
										"CACHE_TYPE" => "A",
										"CACHE_TIME" => "3600",
										"CACHE_GROUPS" => "N",
										"AJAX_OPTION_JUMP" => "N",
										"AJAX_OPTION_STYLE" => "Y",
										"AJAX_OPTION_HISTORY" => "N"
									)
								);?>
								</div>
								<?endif;?>
						<?endif;?>

						<?if($block_option['PROPERTY_BLOCK_ADVERTIS_VALUE'] == 'Выводить'):
							if (!empty($arBlockFilter['SERVICE']))
								$banner_filter['PROPERTY_BANNER_SERVICE'] = $arBlockFilter['SERVICE'];
							elseif (!empty($arBlockFilter['BRANCH']))
								$banner_filter['PROPERTY_BANNER_BRANCH'] = $arBlockFilter['BRANCH'];
							else
								$banner_filter = array('PROPERTY_BANNER_SECTION.CODE' => $top_item['LINK']);
						
							// блок Реклама
							$APPLICATION->IncludeComponent(
								"bitrix:news.list",
								"advertis_in_block",
								Array(
									"IBLOCK_TYPE" => "tools",
									"IBLOCK_ID" => "22",
									"NEWS_COUNT" => "2",
									"SORT_BY1" => "ACTIVE_FROM",
									"SORT_ORDER1" => "DESC",
									"SORT_BY2" => "SORT",
									"SORT_ORDER2" => "ASC",
									"FILTER_NAME" => "banner_filter",
									"FIELD_CODE" => array(),
									"PROPERTY_CODE" => array("BANNER_LINK"),
									"CHECK_DATES" => "Y",
									"DETAIL_URL" => "",
									"AJAX_MODE" => "N",
									"AJAX_OPTION_SHADOW" => "Y",
									"AJAX_OPTION_JUMP" => "N",
									"AJAX_OPTION_STYLE" => "Y",
									"AJAX_OPTION_HISTORY" => "N",
									"CACHE_TYPE" => "A",
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
									"PARENT_SECTION_CODE" => "",
									"DISPLAY_TOP_PAGER" => "N",
									"DISPLAY_BOTTOM_PAGER" => "N",
									"DISPLAY_DATE" => "Y",
									"DISPLAY_NAME" => "Y",
									"DISPLAY_PICTURE" => "Y",
									"DISPLAY_PREVIEW_TEXT" => "Y",
									"AJAX_OPTION_ADDITIONAL" => ""
								)
							);?>
						<?endif;?>

						</div>
					</div>
				</div>
			<?endif;?>


			<div id="footer">
				<div class="footer-content">
					<div class="footer-left">
						<div class="copyright">
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/copyright.php",
								Array(),
								Array("MODE"=>"html")
							);?>
						</div>

						<div>
							<a class="a-green" style="font-style: normal;" href="/map.php"><?=GetMessage("SITE_MAP_LINK")?></a>
						</div>

						<div id="search">
								<?$APPLICATION->IncludeComponent("bitrix:search.form", "footer", array(
									"PAGE" => "#SITE_DIR#search/index.php"
									),
									false
								);?>
						</div>
					</div>

					<div class="footer-right">

						<div class="RSS">
						</div>

						<div id="soc-links">
							<?$footer_soclinks_filter = array('PROPERTY_IN_FOOTER_VALUE' => 'Да', 'ACTIVE' => 'Y');?>
							<?$APPLICATION->IncludeComponent("bitrix:news.list","soc_links",Array(
									"DISPLAY_DATE" => "Y",
									"DISPLAY_NAME" => "Y",
									"DISPLAY_PICTURE" => "Y",
									"DISPLAY_PREVIEW_TEXT" => "Y",
									"IBLOCK_TYPE" => "news",
									"IBLOCK_ID" => "3",
									"NEWS_COUNT" => "10",
									"SORT_BY1" => "SORT",
									"SORT_ORDER1" => "DESC",
									"FILTER_NAME" => "footer_soclinks_filter",
									"FIELD_CODE" => Array("ID"),
									"PROPERTY_CODE" => Array("DESCRIPTION"),
									"CHECK_DATES" => "Y",
									"PREVIEW_TRUNCATE_LEN" => "",
									"ACTIVE_DATE_FORMAT" => "",
									"SET_TITLE" => "N",
									"SET_STATUS_404" => "Y",
									"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
									"ADD_SECTIONS_CHAIN" => "N",
									"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
									"PARENT_SECTION" => "",
									"PARENT_SECTION_CODE" => "",
									"INCLUDE_SUBSECTIONS" => "Y",
									"CACHE_TYPE" => "A",
									"CACHE_TIME" => "3600",
									"CACHE_FILTER" => "N",
									//"CACHE_GROUPS" => "Y",
									"PAGER_SHOW_ALWAYS" => "N",
								)
							);?>
						</div>

						<div class="iphone-lang-toggle">
							<span class="" data-name="ru">EN</span>
							<span class="active" data-name="en">RU</span>
						</div>

					</div>
				</div>		
			</div>
		</div>	
	</div>




<div class="hidden source photoreport">
</div>
		<div class="hidden" id="material-content">
		</div>

		<?if ($APPLICATION->GetCurPage(true) == '/index.php'):?>
					
		<div class="wrapper">
		
			<div class="iphone-content">
				<div class="i-back">
				</div>
				<div class="front">
				</div>
			</div>

			<div class="iphone-footer"></div>

		</div>

		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/devs/parallax.js"></script>
	<?endif;?>


	<!-- Yandex.Metrika informer -->
	<a href="https://metrika.yandex.ru/stat/?id=24721109&amp;from=informer"
	target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/24721109/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
	style="width:88px; height:31px; border:0; display:none;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:24721109,lang:'ru'});return false}catch(e){}"/></a>
	<!-- /Yandex.Metrika informer -->

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
	(function (d, w, c) {
	    (w[c] = w[c] || []).push(function() {
	        try {
	            w.yaCounter24721109 = new Ya.Metrika({id:24721109,
	                    webvisor:true,
	                    clickmap:true,
	                    trackLinks:true,
	                    accurateTrackBounce:true});
	        } catch(e) { }
	    });

	    var n = d.getElementsByTagName("script")[0],
	        s = d.createElement("script"),
	        f = function () { n.parentNode.insertBefore(s, n); };
	    s.type = "text/javascript";
	    s.async = true;
	    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

	    if (w.opera == "[object Opera]") {
	        d.addEventListener("DOMContentLoaded", f, false);
	    } else { f(); }
	})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="//mc.yandex.ru/watch/24721109" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-50162735-1', 'maykor.com');
	  ga('send', 'pageview');

	</script>

	<div class="mobile_flag"></div>
</body>
</html>

<?//ввод последних просмотренных страниц
if (empty($menu_item))
	$page = $top_item;
else
	$page = $menu_item;
if (!in_array($page['LINK'], $_SESSION['RECENT_PAGES'])){
	if (count($_SESSION['RECENT_PAGES']) == 3)
		array_shift($_SESSION['RECENT_PAGES']);
	$_SESSION['RECENT_PAGES'][$page['TEXT']] = $page['LINK'];
}
?>

