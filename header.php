<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<link rel="stylesheet" type="text/css" href="css/media-i.css" />
		<link rel="stylesheet" type="text/css" href="/js/libs/reject/style.css" />
		<link rel="stylesheet" type="text/css" href="/css/general.css" />
		<link rel="stylesheet" type="text/css" href="/css/links.css"   />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/content.css" />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/sidebar.css" />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/reset.css"   />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/forms.css"   />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/borders.css" />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/popup.css"   />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/parallax.css"   />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/iphone.css"   />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/print.css"   />

		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/aCircles.css" />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/aZoom.css"    />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/aGray.css"    />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/imgareaselect/imgareaselect-default.css"    />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/map/style.css" />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/magnific.css" />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/sprites.css" />
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/style.min.css" />


	<?CJSCore::Init(array('ajax', 'myjquery', 'popup', 'myfancy', 'imgareaselect'));?>
	
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
	<meta name="HandheldFriendly" content="True"/>
	
	<meta name="format-detection" content="telephone=no"/>
	<meta name="format-detection" content="address=no"/>

	<title><?=$APPLICATION->ShowTitle();?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" />

	<?/*$APPLICATION->ShowHead();*/?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET?>" />  
	<?$APPLICATION->ShowMeta("robots");?>
	<?$APPLICATION->ShowMeta("keywords");?>
	<?$APPLICATION->ShowMeta("description");?>

	<?$APPLICATION->ShowCSS();?>
	<?$APPLICATION->ShowHeadStrings();?>
	<?$APPLICATION->ShowHeadScripts();?> 
	
	<!--[if lte IE 6]>
	<style type="text/css">
		
		#support-question { 
			background-image: none;
			filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='./images/question.png', sizingMethod = 'crop'); 
		}
		
		#support-question { left: -9px;}
		
		#banner-overlay {
			background-image: none;
			filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='./images/overlay.png', sizingMethod = 'crop');
		}
		
	</style>
	<![endif]-->

	<!-- Add jQuery library -->

	<!--<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/reject/reject.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/jquery.mobile.custom.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/mirgate.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/jquery.swipe.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/jquery-ui.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/gray/functions.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/jquery.color.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/transition.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/imgareaselect/jquery.imgareaselect.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/mask.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/jquery.swipe.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH;?>/js/map/jqueryrotate.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/magnific.js"></script>-->
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/scripts.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/gray/grayscale.js"></script>


	<!--Лайки >
	<script type="text/javascript" src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script-->

	<!--[if lte IE 9]>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/ie.js"></script>
	<![endif]-->

	<!-- Add history-API plugin -->
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/history.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/detectBrowser.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox -->
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/js/libs/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

	<!-- Optionally add helpers - button, thumbnail and/or media -->
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/js/libs/fancybox/source/helpers/jquery.fancybox-mybuttons.css?v=1.0.5" type="text/css" media="screen" />
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/fancybox/source/helpers/jquery.fancybox-mybuttons.js?v=1.0.5"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/js/libs/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/libs/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	
	<!-- Add js files >
	
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/devs/front.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/devs/back.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/devs/social.js"></script-->
	<meta property="og:site_name" content="MAYKOR: аутсорсинг ИТ- и бизнес-процессов по всей России" />
	<meta class="ogimg" property="og:image" content="http://<?=$_SERVER['SERVER_NAME'];?><?=$APPLICATION->ShowProperty('OGIMG');?>" />
	<meta class="ogdesc" property="og:description" content="<?=$APPLICATION->ShowProperty('DESCRIPTION');?>">
	<meta class="ogtitle" property="og:title" content="<?=$APPLICATION->ShowProperty('TITLE');?>">
	<meta class="ogurl" property="og:url" content="http://<?=$_SERVER['SERVER_NAME'].$APPLICATION->GetCurPage(false);?>" />
	<meta class="imgvk" content="http://<?=$_SERVER['SERVER_NAME'].SITE_TEMPLATE_PATH;?>/images/logovk.png">
	<meta name="robots" content="noyaca"/>
	<meta name="robots" content="noodp"/>
</head>


<body onorientationchange="calcMenus()">
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	<?//ввод логотипа в og тег
	if ( $_REQUEST['SERVICE'] == 'vnedrenie-i-podderzhka-biznes-prilozheniy' )
		$APPLICATION->SetPageProperty('ogImg', SITE_TEMPLATE_PATH.'/images/gmcs.png');
	else
		$APPLICATION->SetPageProperty('ogImg', SITE_TEMPLATE_PATH.'/images/logovk.png');
	?>

	<div class="hidden">
		<?if (!empty($_GET['media'])):
			CModule::IncludeModule('iblock');
			
				$code = $_GET['media'];
				if ($res = CIBlockElement::GetList(array(), array('IBLOCK_TYPE' => 'content', 'CODE' => $code))->Fetch()):

				//установка свойствв страницы из видео
				$APPLICATION->SetPageProperty("title", "MAYKOR: ".$res['NAME']);
				$APPLICATION->SetPageProperty("description", HTMLToTxt($res['PREVIEW_TEXT']));
				$arOgImg = CFile::GetFileArray($res['PREVIEW_PICTURE']);
				$APPLICATION->SetPageProperty('ogImg', $arOgImg['SRC']);

					$APPLICATION->IncludeComponent("bitrix:news.detail", "materials_hash", Array(
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "N",
						"IBLOCK_TYPE" => "content",
						//"IBLOCK_ID" => "4",
						"ELEMENT_ID" => "",
						"ELEMENT_CODE" => $code,
						"CHECK_DATES" => "Y",
						"FIELD_CODE" => Array("ID"),
						"PROPERTY_CODE" => Array("DESCRIPTION", "MEDIA_FILE"),
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
				else:
					$arFile = CFile::GetFileArray($code);
					if (preg_match('/^video.*/', $arFile['CONTENT_TYPE']) != 0):?>
						<a class="various fancybox.ajax show" href="/about/mediaplayer.php?path=<?=$arFile['SRC'];?>"></a>
					<?elseif (preg_match('/^application.*/', $arFile['CONTENT_TYPE']) != 0):?>
						<a class="show" href="<?=$arFile['SRC'];?>" target="_blank"></a>
					<?endif;?>
				<?//echo '<pre>'; print_r($arFile); echo '<pre>';?>
				<?endif;?>

				<?unset($_GET['media']);?>
			
		<?endif;?>

		<?if ( !empty($_REQUEST['photo']) ):
			include_once $_SERVER['DOCUMENT_ROOT']."/about/medialibrary/galery.php";
		endif;?>

	</div>

		<div class="nav hidden">
				
				<?//мобильное меню
				$APPLICATION->IncludeComponent("maykor:mobile.menu", "", Array(
					"LEVEL"	=>	"1",
					//"MY_DIR" => "/",
					"COL_NUM"	=>	"1",
					"SHOW_DESCRIPTION"	=>	"Y",
					"SET_TITLE"	=>	"Y",
					"CACHE_TIME"	=>	"36000000",
					"CACHE_TYPE" => "N",
					)
				);?>

		</div>
		
		<div class="popup">
			<div class="popup-in">
				<div class="popup-close pop-ctrl"></div>
				<div class="popup-content">
				<?/*if ($APPLICATION->GetCurPage(true) != '/about/contacts/feedback.php'):?>
					<?$APPLICATION->IncludeComponent("maykor:vacancy_feedback", "main_feedback",Array(
							"SEF_MODE" => "N", 
							"WEB_FORM_ID" => "5", 
							"LIST_URL" => "",
							"EDIT_URL" => "",
							"SUCCESS_URL" => "", 
							"CHAIN_ITEM_TEXT" => "", 
							"CHAIN_ITEM_LINK" => "", 
							"IGNORE_CUSTOM_TEMPLATE" => "N", 
							"USE_EXTENDED_ERRORS" => "Y", 
							"CACHE_TYPE" => "N", 
							"CACHE_TIME" => "3600", 
							"SEF_FOLDER" => "/", 
							"VARIABLE_ALIASES" => Array(
							),
							"AJAX_MODE" => "Y",
							"AJAX_OPTION_SHADOW" => "Y",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "N",
							"AJAX_OPTION_HISTORY" => "N",
						)
					);?>
				<?endif;*/?>

				</div>
			</div>

			<div class="popup-out pop-ctrl"></div>
		</div>


			<?if ($APPLICATION->GetCurPage(true) != '/index.php'):?>
				<div class="iphone-header">
			<?else:?>
				<div class="iphone-header ind">
			<?endif;?>
				<a href="/"><div class="logo"></div></a>

				<a href="tel:+74957874500">
					<div class="btn phone-icon"></div>
				</a>

				<div class="btn menu-icon"></div>

			</div>


				
			<div id="header">

				<div class="container center mmenu">

					<a href="<?=SITE_DIR?>" title="<?=GetMessage("HDR_GOTO_MAIN")?>">
						<div class="logo" style="background-image: url(/include/logo.png)"> <?/*$APPLICATION->IncludeFile(
												SITE_DIR."include/company_name.php",
												Array(),
												Array("MODE"=>"html")
											);*/?>
						</div>
					</a>
					
					<div class="header-form">
						<div class="select">
							<div class="lng-tgl">
								<div class="lng-selected icon-ru" onclick="window.location = '/en/';">Eng</div>
							</div>
						</div>	

						<div class="select">
							<div class="rgn-tgl">
								<div class="ar-little-down"></div>
								<div class="rgn-selected">Выберите округ</div>
								<div class="clear"></div>
							</div>
							<div class="rgn-dd glow hidden" style="z-index: 150">
								<div data-name="mosk" <?=($_SESSION['REGION'] == 'mosk') ? 'data-select="yes"' : '';?>>Москва</div>
								<div data-name="centr" <?=($_SESSION['REGION'] == 'centr') ? 'data-select="yes"' : '';?>>Центральный ФО</div>
								<div data-name="dal_vos" <?=($_SESSION['REGION'] == 'dal_vos') ? 'data-select="yes"' : '';?>>Дальневосточный ФО</div>
								<div data-name="privol" <?=($_SESSION['REGION'] == 'privol') ? 'data-select="yes"' : '';?>>Приволжский ФО</div>
								<div data-name="sev_zap" <?=($_SESSION['REGION'] == 'sev_zap') ? 'data-select="yes"' : '';?>>Северо-Западный ФО</div>
								<div data-name="sev_kav" <?=($_SESSION['REGION'] == 'sev_kav') ? 'data-select="yes"' : '';?>>Северо-Кавказский ФО</div>
								<div data-name="sibir" <?=($_SESSION['REGION'] == 'sibir') ? 'data-select="yes"' : '';?>>Сибирский ФО</div>
								<div data-name="ural" <?=($_SESSION['REGION'] == 'ural') ? 'data-select="yes"' : '';?>>Уральский ФО</div>
								<div data-name="yuzhn" <?=($_SESSION['REGION'] == 'yuzhn') ? 'data-select="yes"' : '';?>>Южный ФО</div>
								<div data-name="krym" <?=($_SESSION['REGION'] == 'krym') ? 'data-select="yes"' : '';?>>Крымский ФО</div>
							</div>
						</div>
					</div>

					<div class="feedback pop-ctrl">
						<a class="a-green "><?=GetMessage("HDR_ASK")?></a>
					</div>

					<div class="header-menu">
						<?$APPLICATION->IncludeComponent("bitrix:menu", "main", array(
						"ROOT_MENU_TYPE" => "top",
						"CHILD_MENU_TYPE" => "right",
						"MENU_CACHE_TYPE" => "A",
						"MENU_CACHE_TIME" => "36000000",
						"MENU_CACHE_GET_VARS" => array(
						),
						"MAX_LEVEL" => "1",
						"USE_EXT" => "Y",
						"ALLOW_MULTI_SELECT" => "Y"
						),
						false
						);?>			
					</div>

					<div class="telephone">
						<nobr>
							<?$APPLICATION->IncludeFile(
							SITE_DIR."include/phone.php",
							Array(),
							Array("MODE"=>"html")
							);?>
						</nobr>
					</div>
				</div>

				<div class="hidden-pop about-pop container center">
					<?//вывод меню для раздела о компании
					$APPLICATION->IncludeComponent("maykor:site.map", "about", Array(
						"LEVEL"	=>	"1",
						"MY_DIR" => "/about/",
						"COL_NUM"	=>	"1",
						"SHOW_DESCRIPTION"	=>	"Y",
						"SET_TITLE"	=>	"Y",
						"CACHE_TIME"	=>	"36000000",
						"CACHE_TYPE" => "A",
						)
					);?>
				</div>

				<div class="hidden-pop serv-pop container center">
					<div>
						<div>
						<?//вывод меню для раздела услуги
						$APPLICATION->IncludeComponent("maykor:site.map", "services", Array(
							"LEVEL"	=>	"2",
							"MY_DIR" => "/services/",
							"COL_NUM"	=>	"2",
							"SHOW_DESCRIPTION"	=>	"Y",
							"SET_TITLE"	=>	"Y",
							"CACHE_TIME"	=>	"36000000",
							"CACHE_TYPE" => "A",
							)
						);?>
						</div>
					</div>
				</div>

				<div class="hidden-pop branch-pop container center">
						<?//вывод меню для раздела отрасли
						$APPLICATION->IncludeComponent("maykor:site.map", "branches", Array(
							"LEVEL"	=>	"1",
							"MY_DIR" => "/branches/",
							"COL_NUM"	=>	"2",
							"SHOW_DESCRIPTION"	=>	"Y",
							"SET_TITLE"	=>	"Y",
							"CACHE_TIME"	=>	"36000000",
							"CACHE_TYPE" => "A",
							)
						);?>
				</div>

				
				<div class="hidden-pop clients-pop container center">
					<?//вывод меню для раздела клиенты
					$APPLICATION->IncludeComponent("maykor:site.map", "clients", Array(
						"LEVEL"	=>	"1",
						"MY_DIR" => "/clients/",
						"COL_NUM"	=>	"1",
						"SHOW_DESCRIPTION"	=>	"Y",
						"SET_TITLE"	=>	"Y",
						"CACHE_TIME"	=>	"36000000",
						"CACHE_TYPE" => "A",
						)
					);?>
				</div>

				<div class="hidden-pop filials-pop container center">
					<?//вывод меню для раздела филиалы
						$APPLICATION->IncludeComponent("maykor:site.map", "filials", Array(
							"LEVEL"	=>	"1",
							"MY_DIR" => "/filials/",
							"COL_NUM"	=>	"1",
							"SHOW_DESCRIPTION"	=>	"Y",
							"SET_TITLE"	=>	"Y",
							"CACHE_TIME"	=>	"36000000",
							"CACHE_TYPE" => "A",
							)
						);?>
				</div>

				<div class="hidden-pop press-pop container center">
						<?//вывод меню для раздела пресс-центр
						$APPLICATION->IncludeComponent("maykor:site.map", "press", Array(
							"LEVEL"	=>	"2",
							"MY_DIR" => "/press/",
							"COL_NUM"	=>	"1",
							"SHOW_DESCRIPTION"	=>	"Y",
							"SET_TITLE"	=>	"Y",
							"CACHE_TIME"	=>	"36000000",
							"CACHE_TYPE" => "A",
							)
						);?>
				</div>

			</div>

			<?if ($APPLICATION->GetCurPage(true) != '/index.php'):?>
				<div class="content-wrapper">
					<div class="news-line">
						<div class="h-slider container center">
							<div  class="news-controls">
								<div class="news-right arr-r h-right on"></div>
								<div class="news-left arr-l h-left"></div>
							</div>

							<div class="news-caption">
								<?=GetMessage("LAST_NEWS")?>
							</div>

							<div class="news-items">
								<?$line_filter = array(array('LOGIC' => 'OR', array('PROPERTY_NEWS_FEDERAL_STATE.CODE' => $_SESSION['REGION']), array('=PROPERTY_NEWS_FEDERAL_STATE' => false)), 'PROPERTY_NEWS_CP' => $arBlockFilter['CP'], 'PROPERTY_NEWS_PARTNERS' => $arBlockFilter['PARTNER'], 'PROPERTY_NEWS_BRANCH' => $arBlockFilter['BRANCH'], 'PROPERTY_NEWS_SERVICE' => $arBlockFilter['SERVICE']);?>
								<?$APPLICATION->IncludeComponent("bitrix:news.list","news_line",Array(
									"DISPLAY_DATE" => "Y",
									"DISPLAY_NAME" => "Y",
									"DISPLAY_PICTURE" => "Y",
									"DISPLAY_PREVIEW_TEXT" => "Y",
									"IBLOCK_TYPE" => "news",
									"IBLOCK_ID" => "1",
									"NEWS_COUNT" => "10",
									"SORT_BY1" => "ACTIVE_FROM",
									"SORT_ORDER1" => "DESC",
									"SORT_BY2" => "SORT",
									"SORT_ORDER2" => "DESC",
									"FILTER_NAME" => "line_filter",
									"FIELD_CODE" => Array("ID"),
									"PROPERTY_CODE" => Array("DESCRIPTION", "NEWS_ENG_NAME"),
									"DETAIL_URL" => "/press/news/",
									"CHECK_DATES" => "Y",
									"PREVIEW_TRUNCATE_LEN" => "",
									"ACTIVE_DATE_FORMAT" => "d.m.Y",
									"SET_TITLE" => "Y",
									"SET_STATUS_404" => "Y",
									"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
									"ADD_SECTIONS_CHAIN" => "N",
									"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
									"PARENT_SECTION" => "",
									"PARENT_SECTION_CODE" => "",
									"INCLUDE_SUBSECTIONS" => "Y",
									"DISPLAY_TOP_PAGER" => "N",
									"DISPLAY_BOTTOM_PAGER" => "N",
									"PAGER_TITLE" => "",
									"CACHE_TYPE" => "A",
									"CACHE_TIME" => "3600",
									"CACHE_FILTER" => "Y",
								)
							);?>
							</div>
						</div>
					</div>
			<?else:?>
				<div class="content-wrapper index">
					<div class="news-line-ind">
						<div class="container center">
							<?
							$res = CIBlockElement::GetList(array(), array('IBLOCK_CODE' => 'title_maps', 'CODE' => 'NEWS_LINE'), false, false, array('ID', 'DETAIL_TEXT'))->Fetch();
							echo $res['DETAIL_TEXT'];
							?>
						</div>
					</div>
			<?endif;?>

				<div class="content container center">


					<div id="workarea-wrapper">

					<?if($APPLICATION->GetCurPage(false)!=SITE_DIR):?>
						<div id="breadcrumb">
							<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "mycrumb", array(
								"START_FROM" => "0",
								"PATH" => "",
								"SITE_ID" => SITE_ID
								),
								false
							);?>
						</div>				
					<?endif?>
			
<!--a class="simple-ajax-popup" href="/about/mediaplayer.php?path=/upload/iblock/f43/Malkin.mp4&ID=2712&branch=&service=">Load another content via ajax</a-->
					<div id="workarea">
						<div id="workarea-inner">