function rejectInit() {
	jQuery.reject({  
		reject: { 
			all: false,
			opera7: true,
			opera8: true, 
			opera9: true,
			opera10: true,
			msie5: true,
			msie6: true,
			msie7: true,
			msie8: true,
			firefox1: true,
			firefox2: true,
			firefox3: true,
			chrome1: true, 
			chrome2: true, 
			chrome3: true,
			chrome4: true
		}, 
		display: ['msie','chrome','safari','opera','firefox'],
		browserInfo: {  
		    msie: { 
		        text: 'Internet Explorer' 
		    },
		    safari: {
		        text: 'Apple Safari'
		    },
		    opera: { 
		        text: 'Opera'
		    }
		},
		header: "К сожалению, Ваш браузер устарел",
		paragraph1: "Сайт будет работать некорректно в Вашем текущем браузере.",
		paragraph2: "Пожалуйста, установите более новый браузер по одной из ссылок, предоставленных ниже.",
		closeMessage: false,
		closeLink: "Закрыть окно",
		closeCookie: true
	});
}

function scrollToAnchor() {
	var obj = $(".to-anchor");
	if (obj[0]) {
		setTimeout( function() { 
			$("body, html").animate(
				{
					scrollTop :  obj.offset().top -  $("#header").height() - 15
				},
				500
			) 
		}, 500 );
	}
}

function initDropDownMenus() {

	// for services on ipad
	$("body").on("tap", ".serv-pop .a-h-serv", function (e) {
		var list = $(this).parent().siblings(".serv-list");

		if ( list.children()[0] && list.css("display") == "none") {
			e.preventDefault();
			$(".serv-list").slideUp().addClass("hideIt");
			list.removeClass("hideIt").slideDown();
		}
	})

	var objs = $("#top-menu").find("a");

	objs.each( function () {
		var obj = $(this),
			li = $('.' + obj.attr("data-pop"));

		if (_supportTouches) {

			obj.on( "tap", function (e) {

				if (!obj.hasClass("hovered")) {

					e.preventDefault();
					obj.blur();

					$(".hidden-pop").hide();
					objs.removeClass("hovered");

					li.show();
					li.children("div").offset( {
						left : obj.offset().left + obj.width() / 2 - li.children("div").width() / 2 - 10
					});
					
					obj.addClass("hovered");
				}
			})

			$(document).on('tap', function (e) {
	    		if ( $(e.target).closest(".hidden-pop").length || $(e.target).closest("#top-menu a").length ) return;
				$(".hidden-pop").hide();
				objs.removeClass("hovered");

				e.stopPropagation();
			})

			li.on( "mouseleave", function(e) {
				li.hide();
				obj.removeClass("hovered");
			})

		} else {

			obj.on("mouseenter", function(e) {
				var emptyWidth = ( getPageSize()[0] - $(".container").width() ) / 2;

				li.show();
				li.children("div").offset( {
					left : obj.offset().left + obj.width() / 2 - li.children("div").width() / 2 - 10
				});
				
				obj.addClass("hovered");
			})

			li.on("mouseenter", function(e) {
				li.show()
				obj.addClass("hovered");
			})

			obj.on( "mouseleave", function(e) {
				li.hide();
				obj.removeClass("hovered");
			})

			li.on( "mouseleave", function(e) {
				li.hide();
				obj.removeClass("hovered");
			})
		}
	})
}

function calcServices() {
	var cont = $(".serv-pop"),
		objs = cont.find(".map-level-0"),
		limitH = 0, 
		topStart = 30, 
		iLeft = 0,
		sumH = 0,

		link = cont.find('.devil_link');

	cont.show();

	objs.each( function () {
		sumH += $(this).height();
	})

	var limitH = sumH/2 + 25,
		sumH = 0,
		divH = 0;
		colH = topStart,
		needToBreak = false;

	objs.each( function(i) {

		$(this).css({
			"top" : colH,
			"left" : iLeft
		})

		colH += $(this).height() + 20;
		needToBreak = ( colH - 60 > limitH );

		//console.log( limitH + "    " + iLeft + "    " + colH + "   " + sumH + "  Высота: " + $(this).height()   )

		if ( needToBreak && iLeft == 0) {
			iLeft = "50%";
			sumH = colH;
			colH = topStart;
		}

	})

	var maxColHeight = Math.max(sumH, colH);

	cont.children("div").height(maxColHeight - topStart);

	link.css({
		'left' : iLeft,
		'bottom' : (maxColHeight - colH - link.height()) / 2
	});
	cont.hide();
}

function calcMenus() {
	var x = $("#top-menu a.hovered");

	$("#top-menu a").removeClass("hovered");
	$(".hidden-pop").hide();

	calcServices();

	x.trigger("tap");
}

function initRegionLangToggles() {
	function selectRgn(me) {
		$(".rgn-selected").html(me.innerHTML);
		$('.rgn-dd').hide();
		$.post('/change_lang_reg.php', {'region': $(me).data('name')}, function(result){
			window.location.reload();
		}); 
	}

	$(".iphone-lang-toggle").on( "click", function () {
		window.location = "/en/";
	})

	$(document).click(function(e) {
	    if ($(e.target).closest(".select").length) return;
	    $(".select .rgn-dd").hide();
	    e.stopPropagation();
	});

	$(".rgn-tgl").on('click', function(e){
		$(".rgn-dd").toggle();
		e.stopPropagation();
	});

	$(".rgn-dd div").on('click', function(){
		selectRgn(this);
	});

	setRegion();
}

function setRegion() {
	var item = $('.rgn-dd').find('div[data-select="yes"]');
	if(item.html() != ''){
		$(".rgn-selected").html(item.html());
	}
}

function initSearchButton() {
	$(".search-button").on("click", function (e) {
		if ( _mobileVersion ) {
			e.preventDefault();
			location.href = "/search/index.php";
		}
	})
}

function initPopup() {
	$(".pop-ctrl").click( function(e) {
	
		var ovflw = 'none';

		var div = document.createElement('div');
		div.style.overflowY = 'scroll';
		div.style.width =  '50px';
		div.style.height = '50px';
		div.style.visibility = 'hidden';
		document.body.appendChild(div);
		var scrollWidth = div.offsetWidth - div.clientWidth;
		document.body.removeChild(div);		

		if (!_feedbackPage)	{
			
			if ( $(".popup").css("display") == "block" ) {

				$( ".popup .popup-content" ).load("/press/ajax_main_feedback.php", function(){
					initDDs(".feedback-form.big");
					initPMask();
				});

				$("body").removeClass("vail");
				$("body").css( 
					{
						"padding-right": "0px"
					}
				);

				$("#header .container").css( 
					{
						"right": "0px"
					}
				)


			} else {
							
				if ( !_mobileVersion ) ovflw = scrollWidth + "px";

				$("body").addClass("vail");
				$("body").css( 
					{
						"padding-right": ovflw 
					}
				);
				
				$("#header .container").css( 
					{
						"right": Math.floor(scrollWidth/2) + "px"
					}
				)
			};

			$(".popup").toggle();
			calcPopup();

		}
	});	

	//загрузка формы обратной связи
	if (location.pathname != '/about/contacts/feedback.php'){
		$(".popup .popup-content").addClass("loading").load( "/press/ajax_main_feedback.php", function(){
			initDDs(".feedback-form.big");
			initPMask();
			$(this).removeClass("loading");
		});
	}
}

function initZoom() {
	function zoomAnimation(e, isHovered) {
		var me   = $(e.target).siblings(".inner"),
			img  = me.children(".c-logo"),
			back = me.children(".c-back"),
			text = me.children(".c-text"),
			parent = me.parent(),
			none = parent.hasClass("none");
			
			img.stop();
			back.stop();
			text.stop();

		if (isHovered) {
			if (!none) img.animate({ "backgroundSize" : "100%" }, 800);
			back.animate({ opacity: 0 }, 600);
			text.transition( 
				{ 
					"scale" : .5,
					"opacity" : 0
				}, 
				500);
			parent.removeClass("hovered");
		} else {
			if (!none) img.animate({ "backgroundSize" : "400%" }, 900);
			back.animate({ opacity: .9 }, 450);
			text.transition( 
				{ 
					delay : 200,
					"scale" : 1,
					"opacity" : 1
				 }, 
				 500);
			parent.addClass("hovered");
		}
	}

	var objs = $(".zoom .zone");

	if (_supportTouches) {

		objs.on("tap", function(e) {

			e.preventDefault();

			zoomAnimation(e, false);

			var me = $(this),
				url = me.parents('a').attr("href") || me.parent().attr("url");

			setTimeout( function() { location = url }, 2100 );

		})

	} else {

		objs.on("mouseenter", function(e) {
			if (!$(this).hasClass("isAni")) zoomAnimation(e, false);
		})

		objs.on("mouseleave", function(e){
			if (!$(this).hasClass("isAni")) zoomAnimation(e, true);
		})

		/* костыль ie9 */
		if ( _isIE9 ) { setTimeout( function () { objs.parent().find(".c-logo").show() }, 1 ); }

	}
}

function initRecSlider() {
	var cont = $(".rec-slider"),
		objs = cont.find(".rec-it"),
		out = cont.find(".ach-list"),
		arr = cont.find(".rec-arr"),
		bnd = objs.length-1;
		indexId = -1,
		prevDir = "+";

	function change (dir) {

		var count = 0,
			res = 0;

		n = (_mobileVersion) ? 1 : 4;

		if (dir=="-" && prevDir=="+")  {
			res = indexId-n+1;
			indexId = (res<0)? bnd+res : res;
		}

		if (dir=="+" && prevDir=="-") {
			res = indexId+n-1;
			indexId = (res>bnd)? 0+res-bnd : res;
		}

		out.fadeOut(500, function () {
			out.empty();
			out.append("<div class='falcrum'></div>");
			do {

				count++;

				if (dir=="+") {
					indexId = (indexId == bnd)? 0 : ++indexId;
					var o = $(objs[indexId]).clone();
					o.insertBefore(out.find(".falcrum"));

				} else {
					indexId = (indexId == 0)? bnd : --indexId;
					var o = $(objs[indexId]).clone();
					o.insertAfter(out.find(".falcrum"));
				}

			} while (count < n);

			prevDir = dir;
		});

		out.fadeIn(500);

	}

	change("+");

	arr.on( "click", function () {
		change($(this).attr("dir"));
	})
}

function initDotSlider() {
	var elWrap = $('.slider');

	elWrap.each( function () {
		var obj = $(this),
			el =  obj.children('.slide-item'),
			btn = obj.siblings(".dots").find(".dot"),
			indexId = 0,
			indexMax = el.length,
			interval = setInterval( function() { change(0) } , 7000);

		change(0);
		
		btn.on("click", function(e) {
			var num = $(e.target).attr("data-i");
			if ( indexId != num ) change(num);		
		});

		obj.parent().on("mouseenter", function () {
			clearInterval(interval);
		})

		obj.parent().on("mouseleave", function () {
			interval = setInterval( function() { change(0) } , 7000);
		})

		function change(num) {
			if ( num == 0 ) {
				nextId = +indexId + 1;
				indexId = (nextId>indexMax)? 1 : nextId;
			} else {
				indexId = num;
			}

			el.fadeOut(500);
			el.filter(':nth-child('+indexId+')').fadeIn(500);
			
			btn.removeClass("selected");
			btn.filter(':nth-child('+indexId+')').addClass("selected");
		}
	})
}

function initPMask() {
	$(".p-mask").mask("+7 (999)-99-99-999", { placeholder: "_" });
}

function initHistory() {

	if ($('.r-history')[0]) {

		var el =  $('.r-history').find('.year-info'),
			btn = $(".grid").find(".grid-year"),
			btnUp = $("[data-dir = '-1']"),
			btnDown = $("[data-dir = '1']"),
			cur = $(".grid-cursor"),
			cont = $(".grid-cont").find("div"),
			sel = cur.find(".y"),
			tar = 0;
			aEnd = true,
			a2End = true,
			INDEX = 0;

		setTimeout( function() { $(".r-history").height( $(el[0]).height() ) }, 1000 );

		function change(i) {

			INDEX = +i;

			var me = $(btn[INDEX]),
				num = +me.attr("data-i"),
				next = $(el[INDEX]);

			aEnd = false;
			
			sel.html( "- " + me.html() + " -" );

			btn.removeClass("selected");
			me.addClass("selected");

			el.fadeOut(500);
			next.fadeIn(1000); 

			el.parent(".r-history").height( next.height() );

			cur.attr("data-i", me.attr("data-i"));
			cur.animate( 
				{
					top: me.position().top + 5 
				}, 
				800,
				function() { aEnd = true }  
			);

			checkImg();
		}

		function checkImg() {

			if (INDEX>0) {
				btnUp.addClass("active");
			} else {
				btnUp.removeClass("active");
			}

			if (INDEX<btn.length-1) {
				btnDown.addClass("active");
			} else {
				btnDown.removeClass("active");
			}
		}


		btnDown.on("click", function(e) {

			var cTop = $(cont[cont.length - 1]).position().top,
				aNeed;

			aNeed = ( INDEX < btn.length-1 )? true : false;

			if ( a2End && cTop > 400) {

				a2End = false;	 
				cont.animate(
					{
						top : "-=193px"
					},
					500,
					function () {
						a2End = true;
						if (aNeed && aEnd) change( INDEX + 1 );
					}
				);
			}
				
			if (aNeed && a2End && aEnd) change( INDEX + 1 );

		})

		btnUp.on("click", function(e) {
			var cTop = $(cont[0]).position().top,
				aNeed;

			aNeed = ( INDEX > 0 )? true : false;

			if ( a2End && cTop < 0) {

				a2End = false;
				cont.animate(
					{
						top : "+=193px"
					},
					500,
					function () {
						if ( aEnd ) change( INDEX - 1 );
						a2End = true;
					}
				);
			}

			if (aNeed && a2End && aEnd)  change( INDEX - 1 );
		})

		btn.on("click", function(e) {
			change( $(this).attr("data-i") );
		});

		cur.draggable({
			containment: ".grid",
			scroll: false,
			axis: 'y',

			start: function() {
				if (!aEnd || !a2End) return false;
			},

			drag: function() {
				if (aEnd && a2End)

					var curY = cur.offset().top;
					for(i = 0; i < btn.length; i++) {
						var yearY = $(btn[i]).offset().top;
						if ( curY > yearY - 180 && curY < yearY + 70 ) {
							tar = i;
							sel.html( "- " + $(btn[i]).html() + " -" );
							break;
						}
					}
			},

			stop: function() {
				if (aEnd && a2End) $(btn[tar]).trigger("click");
			}
		})

		$(btn[0]).trigger("click");
	}
}

function initFancyBox() {
	$(".pdf-view").fancybox({
		width		: '650',
		height		: '720',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		beforeLoad: function(){
			var link    = $.fancybox.coming.element;
			var branch  = (true ? link.attr('data-branch') : '');
			var service = (true ? link.attr('data-service') : '');
			var SRC     = (true ? link.attr('data-src') : '');
			var ID      = (true ? link.attr('data-id') : '');
			var IMG     = (true ? link.attr('data-img') : '');
			var TITLE   = (true ? link.attr('title') : '');
			var TEXT    = (true ? link.attr('data-text') : '');
			$('#pdf_viewer').attr('src', 'http://docs.google.com/viewer?url=' + SRC + '&embedded=true');
			$('#same_pdf').load('/about/pdf_viewer.php', {'SRC': SRC, 'branch': branch, 'service': service, 'ID': ID, 'IMG': IMG, 'TITLE': TITLE, 'TEXT': TEXT});
			//console.log(link);
		},
	});

	$(".various").fancybox({
		//maxWidth	: 800,
		//maxHeight	: 600,
		width		: '650',
		height		: '695',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		afterClose : function(){
			var find_media = /\&?media-[a-z_0-9-].*$/;
		  	var	clearpath = location.href.replace(find_media, "");

		  	history.replaceState(null,null,clearpath);
			//location.hash = '';
		},
	});
}

function playerHack() {
	if (!_isiPhone) {
		$("video")
			.on( "click", function (e) {
				this.webkitEnterFullScreen();
			})
			.on("webkitfullscreenchange mozfullscreenchange fullscreenchange ", function (e) {
				var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
		    	var fscreen = state ? true : false;

		    	if (!fscreen) {
		    		this.load();
		    	} else {
		    		this.play();
		    	}
			})
	}


	$("body")
		.on("click", "#maykor_div_jwplayer_controlbar_fullscreenButton", function () {
			$("#maykor_div").prependTo("body");	
			$("#maykor_div").addClass("fullscreen");
			$(".fancybox-overlay").hide();
		})

		.on("click", "#maykor_div_jwplayer_controlbar_normalscreenButton", function () {
			$("#maykor_div").prependTo(".fancybox-inner");
			$("#maykor_div").removeClass("fullscreen");
			$(".fancybox-overlay").show();
		})

		.on( "keydown", function (e) {
			if (e.which == 27 && $(".fullscreen")[0]) {
				$("#maykor_div_jwplayer_controlbar_normalscreenButton").trigger("click");
				jwplayer.getPosition();
			} else {
				$.fancybox.close();
			}
		})
}

function initCircles() {
	var objs = $(".circle");

	objs.on("mouseleave", function(e){
		circlesAnimation(e, true);
	})

	if (_supportTouches) {

		objs.on("tap", function(e) {
			var isHovered = $(this).find(".circle-back").hasClass("hovered");

			if ( !isHovered ) {
				objs.trigger("mouseleave");
				circlesAnimation(e, isHovered);
			} else {
				window.location = $(this).attr("data-href");
			}
		})

		objs.on("touchend", function(e) {
			objs.trigger("mouseleave");
		})

	} else {

		objs.on("click", function(e) {
			window.location = $(this).attr("data-href");
		})

		objs.on("mouseenter", function(e){
			circlesAnimation(e, false);
		})
	}
}

function circlesAnimation(e, isHovered) {
	var front = $(e.target).siblings(".circle-front"),
		back = front.siblings(".circle-back"),
		text = front.children(".inner"),
		yClick = e.pageY - $(e.target).offset().top,
		moving = 15;

	front.stop();
	back.stop();
	text.stop();

	if (isHovered) {

		front.animate({ backgroundColor : "rgba(255,255,255,1)" }, 500);
		text.css( "color", "#b02143");
		back.removeClass("hovered");
		back.rotate({
			animateTo: 0,
			duration: 500,
			}
		)

	} else {
		
		front.animate({ backgroundColor : "rgba(255,255,255,0)" }, 500);
		text.css( "color", "#fff");
		back.addClass("hovered");
		back.rotate({
			animateTo: 180,
			duration: 500,
			}
		)
	}
}

function initHSlider() {

	var elWrap = $('.h-s-slider');

	if (elWrap[0]) {

		function go (step) {
			startW = $(el[indexId]).width()
			change(step);
		};
		
		function change ( step ) {
			var nextId = indexId + step;
			if ( ( nextId >= 0 && nextId <= indexMax ) ) {

				if (!isAni) {
					
					var nextId = (step == 1)? indexId : nextId,
						prev = $(el[nextId]),
						last = $(el[nextId + num ]);

					isAni = true;

					if (step == 1) {

						last.show();
						last.animate( {width: startW, opacity: 1}, 500 );
						prev.animate( {width: "0px", opacity: 0 }, 500, function () { isAni = false; prev.hide() } );
					} else {
						prev.show();
						prev.animate( {width: startW, opacity: 1 }, 500 );
						last.animate( {width:  "0px", opacity: 0 }, 500, function () { isAni = false; last.hide() } );
					}

					indexId+=step;
					checkImg()
				}

			} else {

				clearInterval(anim);

			}
		};

		function checkImg() {
			if (indexId == indexMax) 
				right.removeClass("on");
			else 
				if (!right.hasClass("on")) right.addClass("on");

			if (indexId == 0)
				left.removeClass("on");
			else 
				if (!left.hasClass("on")) left.addClass("on");
		}

		var	el =  elWrap.find( ".h-s-item" ),
			left = elWrap.find('.h-s-left'),
			right = elWrap.find('.h-s-right'),
			
			indexId = 0,
			indexMax = el.length,

			startY = $(el[0]).offset().top,
			num, anim, isAni;

		if (_mobileVersion) {
			num = 1
		} else {
			for ( num = 0; num <= indexMax-1; num++ ) {
				if ( $(el[num]).offset().top != startY ) break;
			}
		}


		el.filter(":gt("+ (num-1) +")").css({ width : "0px", opacity: 0 }).hide();

		indexMax -= num;
		checkImg();

		right.on("click", function() {
			go(1);	
		});

		left.on("click", function() {
			go(-1);
		});
	};
}

function initNewsLine() {

	function checkImg() {
		if (indexId == indexMax) 
			right.removeClass("on");
		else 
			if (!right.hasClass("on")) right.addClass("on");

		if (indexId == 0)
			left.removeClass("on");
		else 
			if (!left.hasClass("on")) left.addClass("on");
	}

	function change (step, isAuto) {
		nextId = indexId + step;
		if (aEnd)
			if ( isAuto || (nextId >= 0 && nextId <= indexMax) ) {
				
				var prev = $(el[indexId]);

				indexId = (nextId > indexMax)? 0 : nextId;
				var next = $(el[indexId]);

				aEnd = false;
				prev.animate(
					{opacity: 0}, 
					250,
					function () { prev.hide() }
				) 
				
				next.show();
				next.animate(
					{opacity: 1}, 
					1500, 
					function() { aEnd = true; }
				)				
				checkImg();
			}
	}

	function autoChange () { 
		change(1, true); 
	}

	var elWrap = $('.h-slider'),
		el =  elWrap.find('.h-item'),
		left = elWrap.find('.h-left'),
		right = elWrap.find('.h-right'),
		indexId = -1,
		indexMax = el.length - 1;
		aEnd = true;

	$(el).css("opacity", 0);
	change(1, true);
	interval = setInterval(autoChange, 10000);
	
	right.on("click", function() {
		change(1, false);		
	});

	left.on("click", function() {
		change(-1, false);		
	});

	elWrap.on("mouseover", function() {
		clearInterval(interval);
	});

	elWrap.on("mouseout", function() {
		interval = setInterval(autoChange, 10000);
	});
} 

function initSubmenu(obj) {
	var objs = $( obj + " .slide");
	objs.each(function () {
		var obj = $(this);
		obj.not(".vac-tgl")
			.html( "<div class='centered-text'>" + obj.text() + "</div>" )
			.parent().addClass("page-section-header-cont");
	})


	objs.on("click", function(e){
		var me = $(this),
			li = me.siblings(".s-list"),
			lists = $("#workarea-inner").find(".s-list"),
			slides = $("#workarea-inner").find(".slide"),
			hashId = $(this).attr('hash-id'),
			opa = setInterval( calcSideBar, 100);

		if (me.hasClass("page-section-header"))	{

			if (hashId){
				//location.hash = hashId;
				changeHash(hashId);
			}
			
			if (me.hasClass("closed")) {

				slides.removeClass("opened");
				slides.addClass("closed");
				
				lists.slideUp(300);

				setTimeout( function () {

					var to = me.offset().top;
					$("body, html").animate(
						 {
						 	scrollTop :  to - 15 - $("#header .container").height() 
						 },
						 500
					);
				}, 300);

			}
		} 

		li.slideToggle( 500, function() {
			if ( $(this).siblings(".slide").hasClass("closed") ) {
				clearInterval(opa);	
			} else {
				calcSideBar();
			}
		});	

		me.toggleClass("opened");
		me.toggleClass("closed");
	});
}

function initColorLink() {
	if ($('div.page-section-header.opened').length == 1) {
		var target = $('div.page-section-header.opened');
		setSelected(target);
	}

	$('body').on('click', 'div.page-section-header', function(){
		setSelected($(this));
	});

	function setSelected (obj) {
		var queryStr = 'div.r-menu-item a[data-page';
		$(queryStr + ']').removeClass('selected');
		$(queryStr +'="'+obj.attr('hash-id')+'"]').addClass('selected');
	}
}

function initDDs(objStr) {

	var objStr = objStr || "body";

	$(objStr + " .f-dd-list").wrapInner("<div class='f-dd-inner'></div>");

	$(objStr + " .f-dd-head").on("click", function(e) {
		var h = $(e.target);
			l = h.next();
			sel = l.siblings("select").find("option");

		toggleList(l, h);
	});

	$(objStr + " .f-dd-list .f-dd-inner div").on("click", function(e) {
		var me = $(e.target),
			l = me.parents(".f-dd-list"),
			h = l.prev(),
			dd = l.parent(),
			value = me.attr("data-value"),
			code = dd.attr("data-on-change");

		dd.attr("data-value", value );
		h.html( me.html() );

		l.fadeOut("fast");
		h.removeClass("opened");
		h.addClass("closed");

		eval(code);

	});

	$(document).on("click", function(e) {

		if ( $(e.target).closest(".f-dd").length ) return;

		closeDDs();
		e.stopPropagation();

	});

	function toggleList(l,h) {

		if ( l.css("display") == "none" ) {
			closeDDs()
			l.fadeIn("fast");	
		} else {
			l.fadeOut("fast");	
		}

		h.toggleClass("closed");
		h.toggleClass("opened");
		
	}

	function closeDDs () {
		$(".f-dd-head").removeClass("opened");
		$(".f-dd-head").addClass("closed");
		$(".f-dd-list").fadeOut("fast");
	}
}

function initTriggerAnchors() {
	var trigs = $("a[data-page]");
	trigs.on("click", function (e) {
		var anchor = $(this).attr("data-page");
		$("div[hash-id='" + anchor + "']").trigger("click");
	})
}

/* !!! */
function initVisited () {

	var objs = $(".visited"),
		li = objs.next();

	objs.on("click", function () {
		objs.toggleClass("active");
		li.slideToggle("slow");
	})
} 

function setVisited() {
	var objs = $(".visited"),
		li = objs.next(),
		maxH = 0;

	li.each( function () {
		var iH = $(this).height();
		if (  iH > maxH ) maxH = iH;
	})

	var needH = objs.height()*2 + maxH + 20;
	objs.parent().height( needH );
}

function calcSideBar () {

	var objs = $(".right-optional > div"),
		contH = $("#workarea-wrapper").height(),
		count = objs.length-1,
		sumH = 0;

	//console.log("Высота wrapper - " + contH);
	//console.log("Высота sidebar - " + _needH);

	for ( i=0; i<=count; i++ ) {

		var me = $(objs[i]),
			meH = ( me.hasClass("adv-block") )? me.height() - 110 : me.height(),
			meM = ( me.hasClass("adv-block") )? -15 : parseInt(me.css("margin-bottom"));

		//console.log( me.children(".r-header").text() );
		//console.log("Высота - " + meH + "(" + meM + ") |  Свободного места - " + (contH - _needH - sumH) + " | Занято блоками - " + sumH);

		if ( contH - _needH - sumH > meH ) { 
			me.show();
			sumH += meH + meM;
		} else {
			break;
		}

	}

	for (j = i; j<=count; j++) {
		$(objs[j]).hide()		
	}

	//console.log("-----------------------------------------------------------------------------------------------");
}

/* !!! */
function initTiles() {
	if (!_mobileVersion) {
		var cont = $(".tile-cont");

		for (i=0; i<=cont.length; i++) {

			var tiles = $(cont[i]).find(".tile"),
				margin = 20,
				sList = $(cont[i]).closest(".s-list"),
				sListVis = sList.css("display");

			tiles.filter(":odd").css( "right" , 0);

			sList.show()

			var lH = $(tiles[0]).height(),
				rH = $(tiles[1]).height();

			for ( j=2; j <= tiles.length; j++ ) {
				var me = $(tiles[j]),
					above = $(tiles[j-2]);

				me.css( "top", above.height() + above.position().top + margin );

				if ( j % 2 == 0 ) {
					lH+= me.height() + margin;
				} else {
					rH+= me.height() + margin;
				}
			}

			$(cont[i]).height( Math.max( rH, lH ) );
			sList.css("display", sListVis);
			tiles.css( "opacity", 1 );
		}

		cont.css("opacity", 1);
	}
}

/* !!! */
function calcResize() {	

	var cacheVer = _mobileVersion;
	_mobileVersion = $(".mobile_flag:visible")[0] == undefined;
	if ( _mobileVersion && !_mobileInit ) workWithIPhone();
	if ( !_mobileVersion && !_desktopInit ) workWithDesktop();

	calcServices();
	calcPopup();



	var pos = ( 2000 - getPageSize()[2] ) / 2;
		broW = getPageSize()[2];
	$(".visual-cont").css( "left", -pos );


	if ( _mobileVersion ) {
		$(".content-wrapper.index").hide();
		$("#header").hide();
		$(".wrapper").show();
		$("#footer").insertAfter(".wrapper");
		$(".iphone-header").insertBefore(".iphone-content");
		$(".person-detailed .w33").insertAfter($(".person-detailed .w66"));

		$(".HTMLvid").show();
		$(".notHTMLvid").hide();
	}  else {
		$(".content-wrapper.index").show();
		$("#header").show();
		$(".wrapper").hide();
		if ( $(".index")[0] ) {
			$("#footer").insertAfter("#workarea-wrapper");	
		} else {
			$("#footer").insertAfter("#sidebar");
		}
		
		$(".iphone-header").insertBefore(".index .content");
		$(".person-detailed .w33").insertBefore($(".person-detailed .w66"));

		$(".HTMLvid").hide();
		$(".notHTMLvid").show();

		setContentH();
		setVisited();
		calcSideBar();
		if ($(".tile-cont")[0]) initTiles();

		if (!_menuClosed) $(".iphone-header.ind .menu-icon").trigger("click");
	}

	obj = $(".ach-list");
	obj2 = $(".ach-item-ind");
	w = Math.floor(obj.width() / 6) - 1;
	obj2.each( function () {
		if ( $(this).width() > 1 ) $(this).width(w);
	} )

	obj = $(".client");
	obj.height( obj.width() );
	width = $("#workarea").width();
	obj = $(".clients .zoom");
	if ( _mobileVersion ) {
		if ( broW < 380 ) {
			dev = 1

		} else {
			dev = 2
		}
	} else {
		dev = 4;
	}

	if (dev == 1) {
		setW = "97%";
	} else {
		setW = width / dev - 25;
	}
	obj.parent().width(setW);
	obj.width( setW );
	obj.find(".inner").height( (obj.width()>150) ? 150 : obj.width() );

	obj = $(".para-lt b").css("left", ( 2000 - width ) / 2 );

	obj = $(".serv-s");
	dev = ( _mobileVersion )? 1 : .28;
	obj.width( width * dev );
	obj.find(".inner").height( obj.width() * .675 );

	obj = $(".stories div .zoom");
	dev = ( _mobileVersion )? 1 : 2;
	obj.width( width / dev - 15 );
	obj.find(".inner").height(obj.width() * .7 );

	obj = $(".s-story .zoom");
	obj.width( Math.round( width * .7062 ) );
	obj.find(".inner").height( Math.round( obj.width() * .432 ) );

	width = $(".infoblocks-ind").width();	

	obj = $(".para-t");
	obj.width( $("#serv-ind").width() );
	obj.css("marginLeft", -obj.width()/2);
}

function calcPopup() {
	var inP = $(".popup-in").height() + 175,
		outP = $(".popup-out"),
		broH = getPageSize()[3],
		needH = (broH > inP)? "100%" : inP;

	outP.css( "height", needH );	
}

function workWithDesktop () {
	_desktopInit = true;
	if ($(".index")[0]) initParaSlider();
	initHistory();
}


function workWithIPhone() {

	_mobileInit = true;

	calcResize();	
	window.addEventListener('orientationchange', iphoneResize());

	$(".serv-list").css( "top", getListTop($(".serv-list"))[0] );

	$(window).on( "resize", function () {
		iphoneResize() 
	});
	iphoneResize();

	$(".serv-list .arrow-btn, .serv-list .title").on( "click", function () {
		var obj = $(this).parent(),
			toTop = getListTop(obj),
			arr = obj.find(".arrow-btn"),
			hint = obj.find(".hint");

		if ( obj.hasClass("down") ) {

			obj.animate( 
				{
					"top" : toTop[0] + 10
				},
				500
			);

			obj.removeClass("down");
			hint.slideUp(500);

		} else {

			ftr = $(".footer");
			obj.animate( 
				{
					"top" : toTop[1]
				},
				500
			);
			obj.addClass("down");
			hint.slideDown(500);

		}

		arr.toggleClass("reverse");
	})

	$(function () {

		var obj = $(".nav"),
			heads = obj.find(".section .title"),
			lists = obj.find(".section .list");

		heads.on( "click", function (e) {

			var me = $(this),
				li = me.next();

			if (!me.hasClass("active") && !me.hasClass("no-subs") ) {

				e.preventDefault();
				
				lists.slideUp(500);
				li.slideDown(500);
				heads.removeClass("active");
				me.addClass("active");
			}


		} )

	})

	$(function () {

		var icon = $(".menu-icon"),
			menu = $(".nav"),
			head = $(".iphone-header");

		icon.on("click", function () {

			menu.toggle();
			icon.toggleClass("active");
			head.toggleClass("wmenu");

			_menuClosed = !icon.hasClass("active");

			if ( !_menuClosed ) {
				$("body, html").css( 
					{
						"overflow-y" : "hidden",
						"position" : "fixed",
					}
				);
			} else {
				$("body, html").css( 
					{
						"overflow-y" : "none",
						"position" : "",
					}
				);
			}
		})

		if (_menuClosed && $('.index')[0]) icon.click();
	})

}



function iphoneResize () {

	var obj = $(".serv-list"),
		toTop = getListTop(obj);
		
	if ( obj.hasClass("down") ) {
		toTop = toTop[1]
	} else {
		toTop = toTop[0]
	}

	obj.css( "top",  toTop );

	obj = $(".wrapper");
	obj.height( getPageSize()[3] );	
}

function getListTop (obj) {

	var cont = $(".iphone-content"),
		objTop = 30;

	if ( obj.height() + 60 < cont.height() ) {
		objTop = cont.height()/2 - obj.height()/2; 
	}

	if ($(".iphone-footer")[0]) {
		var objTopDown = $(".iphone-footer").offset().top - 100;
	}

	return [objTop, objTopDown];

} 














function setContentH () {
	var rMenuH = ( $("#right-menu").css("display") == "none" ) ? 150 : $("#right-menu").height(),
		needH = $(".keyphrases").height() + rMenuH + $(".visited-block").height() - 25;

	$("#workarea-wrapper").css( "min-height", needH );
	_needH = needH;
}

function initMagnific(e, eventCode) {
	var source;

	$(e).magnificPopup({
		delegate: '.my_fancy',
		type: 'image',
		gallery: {
	    	// options for gallery
	    	enabled: true
	  	},
		 image: {
		    // options for image content type
		    markup: '<div class="mfp-figure">'+
		    			'<div class="mfp-close"></div>' +
		    			'<div class="mfp-title bk"></div>' +
            			'<div class="mfp-img"></div>'+
            			'<div class="mfp-bottom-bar">'+
	              			'<div class="m10 photo-footer">'+
	              				'<div class="player-button">' +
									'<a class="a-null save-foto" href="" download>' +
										'<div title="Сохранить файл"></div>' +
									'</a>' +
									'<div id="sender" data-file="" type="button" title="Отправить на e-mail"></div>' +
									// '<div id="subscribe" data-rubric="2" title="Подписаться на рассылку"></div>' +
								'</div>' +
								'<div class="soc-video">' +
									'<div onclick=Share("tw") title="Поделиться в Twitter"></div>' +
									'<div onclick=Share("vk") title="Поделиться в Вконтакте"></div>' +
									'<div onclick=Share("in") title="Поделиться в Linkedin"></div>' +
									'<div onclick=Share("fb") title="Поделиться в Facebook"></div>' +
								'</div>' +
							'</div>' +
							'<div class="mfp-counter"></div>'+
						'</div>'+
          			'</div>', 
		    titleSrc: function() {
		    	if (eventCode != ''){
			    	return '<a class="a-togreen bk" href="/press/activity/'+eventCode+'/">'+this.currItem.el.attr("data-title")+'</a>';
			    }
			    else{
					return this.currItem.el.attr("data-title");
			    }
		    }
		 },

		 callbacks: {

			updateStatus: function (data) {
		 	 	if (data.status == "ready") {
		 	 		$(".mfp-arrow").addClass("visi");
		 	 	}
		 	 },

		 	 change: function() {
			 	var elem = this.currItem.el,
			 	source = $(".hidden.source");

			 	source.attr("data-title" , elem.attr("data-title"));
			 	source.attr("data-img" , elem.attr("data-img"));

			  },
			  afterClose: function() {
			  	changePhotoUrl('');
			  },
			  imageLoadComplete: function() {
			  	changePhotoUrl('photo='+this.currItem.el.attr('id'));
			    //location.hash = 'photo-'+this.currItem.el.attr('id');

			    var img_src = this.currItem.el.attr('href');
			    $('a.save-foto').attr('href', img_src);
			    $('#sender').attr('data-file', img_src);
			  },

			  buildControls: function() {
			    // re-appends controls inside the main container
			    this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
			  }
		},
	});
}

function initFormValidation () {
	var objs = $("form").find(" * [data-prev-value] ");
	var objPhone = $("form").find("input.p-mask");

	$('form').find('input[type="submit"]').on('click', function(){
		$('form').find('.error').val('');
	});

	objs.on( "click", function () {
		me = $(this);

		if (me.hasClass("error")) {
			me.val( me.attr("data-prev-value") );
			me.removeClass("error");
		}
	});

	objPhone.on( "focus", function() {
		setTimeout( function(){
			objPhone.mask("+7 (999)-99-99-999", { placeholder: "_" }).trigger('focus.mask');
		}, 100);
	});
}

function flipClients () {
	if (_menuClosed) {
		var cli = $(".clients .zoom .inner .c-logo");

		for ( i=0; i<=cli.length-1; i++ ) {
		
			var me = $(cli[i]),
				par = me.parents(".zoom");

			par.css( 
				{
					"overflow":"visible",
					"z-index" : "0 !important"
				}
			);

			if (!par.hasClass("hovered")) {

				par.children(".zone").addClass("isAni");
				me.transition(
					{
						delay: i*60,
						perspective: '350px',
						rotateX: '-360deg'
					}, 
					1000,
					function() {
						var i = $(this);
						i.css("transform" ,"none");
						i.parents(".zoom").css(
							{
								"overflow" : "visible",
								"z-index" : 5
							}
						);
						i.parents(".zoom").children(".zone").removeClass("isAni");
					}
				);
			}
		}
	}
}

function initVideo(el){
	$.fancybox.open(
		{
			href: el.attr('data-href'),
			type: 'ajax',
			title: el.attr('title')
		},
		{
			keys : {
    			close : null // default value = [27]
  			},
			//maxWidth	: 800,
			//maxHeight	: 600,
			width		: '650',
			height		: '695',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			enableEscapeButton : false,
			afterClose : function(){
				changeVideoUrl('');
			},
		}
	);
}

function setFileName(obj) {
	$(obj).siblings('#psevdoFileValue').val(getFileName($(obj).val()));
}

function getFileName(value) {
	var sliced = value.split("\\");
	return sliced[sliced.length-1];
}

function  getPageSize(){
       var xScroll, yScroll;

       if (window.innerH && window.scrollMaxY) {
               xScroll = document.body.scrollWidth;
               yScroll = window.innerH + window.scrollMaxY;
       } else if (document.body.scrollHeight > document.body.offsetHeight){ 
               xScroll = document.body.scrollWidth;
               yScroll = document.body.scrollHeight;
       } else if (document.documentElement && document.documentElement.scrollHeight > document.documentElement.offsetHeight){ 
               yScroll = document.documentElement.scrollHeight;
       } else { 
               xScroll = document.body.offsetWidth;
               yScroll = document.body.offsetHeight;
       }

       var windowWidth, windowHeight;
       if (self.innerH) { 
               windowWidth = self.innerWidth;
               windowHeight = self.innerH;
       } else if (document.documentElement && document.documentElement.clientHeight) { 
               windowWidth = document.documentElement.clientWidth;
               windowHeight = document.documentElement.clientHeight;
       } else if (document.body) { 
               windowWidth = document.body.clientWidth;
               windowHeight = document.body.clientHeight;
       }

       if(yScroll < windowHeight){
               pageHeight = windowHeight;
       } else {
               pageHeight = yScroll;
       }

       if(xScroll < windowWidth){
               pageWidth = windowWidth;
       } else {
               pageWidth = xScroll;
       }

       return [pageWidth,pageHeight,windowWidth,windowHeight];
}

function getPosY() {
	var value = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
	return value;
}

function rand(start, finish, isReal) {
	var result = start + Math.random()*( finish - start );
	result = (isReal)? result : Math.round(result);
	return result;
}

function hase() { 
	var _x = "";
	function VICE_CITY(){var xi=1,ix="bb";
	$("*").each(function(){xi=(xi==3)?1:++xi;
	var xx=ix+xi,ii=$(this);ii.addClass(xx);});};
	$(window).on("keypress",function(e){
	var c=String.fromCharCode(e.which);
	if("bigbang".indexOf(c)!=-1) {_x+=c;}
	else{_x="";}if(_x=="bigbang") VICE_CITY();});
}
