var _menuClosed = true,
	_feedbackPage = false,
	_supportTouches = ('ontouchstart' in document.documentElement),
	_isiPhone = navigator.userAgent.match(/iPhone/i) != null,
	_isIE9 = $('html').hasClass('msie9'),
	_mobileVersion, _needH, _flipInterval;
	_desktopInit = false, _mobileInit = false;

$(function() {
	/* стартовые скрипты */
		if (!_supportTouches) rejectInit();			// проверка браузера
		scrollToAnchor();							// скролл к якорю
		byHashUrl();								// обработка адреса с хеш тегом

	/* обязательные скрипты */		
		initDropDownMenus();						// иниц. выпадающего меню
		calcServices();								// пересчет услуг в меню
		initRegionLangToggles(); 					// включить смену языка и региона
		initSearchButton();							// поведение кнопки поиска
		initPopup();								// иниц. попапа

	/* необязательные скрипты */ 
		/* частые */
		initZoom();									// зумэффект на ссылках (клиенты, истории успеха)
		initRecSlider();							// слайдеры мэйкор рекомендует
		initDotSlider();							// иниц. т.н. СНИППЕТОВ

		/* редкие */
		initPMask();								// иниц. маски телефона
		initFancyBox();								// fancyBox
		playerHack() 								// КОСТЫЛИЩА ДЛЯ ПЛЕЕРА 

		/* главная */
		initCircles();								// круги
		initHSlider();								// слайдер достижений

		/* кроме главной */
		initNewsLine();								// иниц. новостной ленты
		initSubmenu("body");						// иниц. аккордеонов подразделов
		initColorLink();							// подсветка пунктов меню
		initDDs();									// иниц. дропдаунов
		initTriggerAnchors();						// иниц. ссылки в меню
		initVisited();								// популярные\просмотренные

		/* остальные */
		initSomeElements();							//-----------------
		initSubscribe('body');						// * Мишина магия *
		initSendFile('body');						//-----------------

	$(window)
		.on('load', function() { 
			calcSideBar(); 							// посчитать высоту сайдбара
			initTiles(); 							// pinterest style
		})
		.on('resize', function () {
			calcResize();							// пересчеты при ресайзе
		})
		.on("scroll", function() {
			var sPos = getPosY();
			if ( sPos > 1 ) { 
				$("#header").addClass("glow");
			} else {
				$("#header").removeClass("glow") ;
			}
		})
	
	setContentH();									// установка минимальной высоты контентной части
	$(window).resize();
	hase();
})
