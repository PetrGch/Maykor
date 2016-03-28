function initParaSlider() {

		function slideReInit(n) {

			var slide = $(".visual-cont .para-slide:nth-child("+ (n+1) +")"),
				layers = slide.find("div").not(".para-lt"),
				text = slide.find(".para-lt b");

			layers
				.clearQueue()
				.delay(900)
				.queue(
					function (next) {
						layers.css({
							"scale" : 1,
							"left": 0,
							"top": 0
						})
						next();
					}
				)

			text
				.clearQueue()
				.delay(900)
				.queue(
					function (next) {
						text.css({
							"bottom" : "-15px",
							"opacity" : 0
						})
						additionalReInits(n)
						next();
					}
				)
		}

		function additionalReInits(n) {

			switch (n) {
				case 0: 
					var me = ".para-slide[data-slide='0'] .para-l",
						specialist = $( me + "1");

					specialist.css("opacity", .2);

					break;
				case 1: 
					var me = ".para-slide[data-slide='1'] .para-l",
						specialist = $( me + "1");

					specialist.css("opacity", .2);

					break;
				case 2: 
					var me = ".para-slide[data-slide='2'] .para-l",
							 panel = $( me + "1"),
					   	specialist = $( me + "3"),
						   monitor = $( me + "4");

					panel.css("opacity", .2);
					specialist.css("opacity", .2);
					monitor.css("opacity", 0);

					break;
				case 3: 
					var me = ".para-slide[data-slide='3'] .para-l",
						blur = $( me + "1");

					blur.css("opacity", 1);

					break;
				case 4: 
					var me = ".para-slide[data-slide='4'] .para-l",
					   	specialist = $( me + "2");

					specialist.css("opacity", .2);
					break;
				case 5:
					var me = ".para-slide[data-slide='5'] .para-l",
						blur = $( me + "22"),
					   	specialist = $( me + "4"),
					   	car = $( me + "1");

					specialist.css("opacity", .2);
					car.css("opacity", .2);
					blur.css("opacity", 1);
					break;
			}	
		}

		function slideInit(n) {

			var path = "url(/bitrix/templates/rus/images/parallax/",
				thisSlide = $(".para-slide[data-slide='" + n + "']");

			if ( thisSlide.hasClass("init") ) return;
			thisSlide.addClass("init");

			switch (n) {
				case 0: 
					var me = ".para-slide[data-slide='0'] .para-l",
						background = $( me + "0"),
						specialist = $( me + "1"),
							   man = $( me + "2"),
							 woman = $( me + "3"),
							  text = $( me + "t b");

					specialist.css("opacity", .2);

					background.css("background-image", path + "sl-1-0.jpg" + ")"); 
					specialist.css("background-image", path + "sl-1-1.png" + ")"); 
					man.css("background-image", path + "sl-1-2.png" + ")"); 
					woman.css("background-image", path + "sl-1-3.png" + ")"); 

					break;
				case 1: 
					var me = ".para-slide[data-slide='1'] .para-l",
						background = $( me + "0"),
						specialist = $( me + "1"),
					   		  cash = $( me + "2"),
							 woman = $( me + "3"),
							  text = $( me + "t b");

					specialist.css("opacity", .2);

					background.css("background-image", path + "sl-3-0.jpg" + ")"); 
					specialist.css("background-image", path + "sl-3-1.png" + ")"); 
					cash.css("background-image", path + "sl-3-2.png" + ")"); 
					woman.css("background-image", path + "sl-3-3.png" + ")"); 

					break;
				case 2: 
					var me = ".para-slide[data-slide='2'] .para-l",
						background = $( me + "0"),
							 panel = $( me + "1"),
							people = $( me + "2"),
					   	specialist = $( me + "3"),
						   monitor = $( me + "4"),
							  text = $( me + "t b");

					panel.css("opacity", .2);
					specialist.css("opacity", .2);
					monitor.css("opacity", .0);

					background.css("background-image", path + "sl-2-0.jpg" + ")"); 
					panel.css("background-image", path + "sl-2-1.png" + ")"); 
					people.css("background-image", path + "sl-2-2.png" + ")"); 
					specialist.css("background-image", path + "sl-2-3.png" + ")"); 
					monitor.css("background-image", path + "sl-2-4.png" + ")"); 

					break;
				case 3: 
					var me = ".para-slide[data-slide='3'] .para-l",
						background = $( me + "0"),
							  blur = $( me + "1"),
							   man = $( me + "2"),
							  text = $( me + "t b");


					background.css("background-image", path + "sl-4-0.jpg" + ")"); 
					blur.css("background-image", path + "sl-4-1.png" + ")"); 
					man.css("background-image", path + "sl-4-2.png" + ")"); 

					break;
				case 4: 
					var me = ".para-slide[data-slide='4'] .para-l",
						background = $( me + "0"),
							  wall = $( me + "1"),
					   	specialist = $( me + "2"),
							 woman = $( me + "3"),
							  text = $( me + "t b");

					specialist.css("opacity", .2);

					background.css("background-image", path + "sl-5-0.jpg" + ")"); 
					wall.css("background-image", path + "sl-5-1.png" + ")"); 
					specialist.css("background-image", path + "sl-5-2.png" + ")"); 
					woman.css("background-image", path + "sl-5-3.png" + ")"); 

					break;
				case 5: 
					var me = ".para-slide[data-slide='5'] .para-l",
						background = $( me + "0"),
							   car = $( me + "1"),
					   stationback = $( me + "2"),
					   stationblur = $( me + "22"),
					   	   station = $( me + "3"),
						specialist = $( me + "4"),
							  text = $( me + "t b");

					specialist.css("opacity", .2);
					car.css("opacity", .2);

					background.css("background-image", path + "sl-6-0.jpg" + ")"); 
					car.css("background-image", path + "sl-6-1.png" + ")"); 
					stationback.css("background-image", path + "sl-6-2.png" + ")"); 
					stationblur.css("background-image", path + "sl-6-22.png" + ")"); 
					station.css("background-image", path + "sl-6-3.png" + ")"); 
					specialist.css("background-image", path + "sl-6-4.png" + ")"); 

					break;
			}
		}

		function slideStart (n) {

			prevSlide = n;

			switch (n) {
				case 0: 
					var me = ".para-slide[data-slide='0'] .para-l",
						background = $( me + "0"),
						specialist = $( me + "1"),
							   man = $( me + "2"),
							 woman = $( me + "3"),
							  text = $( me + "t b");

					woman
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(1500)

						.animate(
							{
								left: "60px",
								scale: 1.1
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)


					man
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(1500)

						.animate(
							{
								left: "0px",
								scale: 1.1
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)


					background
						.animate(
							{
								left: "-50px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(1500)

						.animate(
							{
								scale: 1.1
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)
						
						
					specialist
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.animate(
							{
								opacity: 1
							},
							1500
						)
					

					text
						.delay(1500)

						.animate(
							{
								bottom: "5px",
								opacity: 1		
							},
							1000
						)
					break;				
				case 1: 
					var me = ".para-slide[data-slide='1'] .para-l",
						background = $( me + "0"),
						specialist = $( me + "1"),
					   		  cash = $( me + "2"),
							 woman = $( me + "3"),
							  text = $( me + "t b");

					woman
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(1500)

						.animate(
							{
								left: "0px",
								scale: 1.1
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					cash
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(1500)

						.animate(
							{
								left: "0px",
								scale: 1.1
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)


					background
						.animate(
							{
								left: "-40px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(1500)

						.animate(
							{
								scale: 1.1
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)
						
						
					specialist
						.animate(
							{
								left: "-40px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.animate(
							{
								opacity: 1
							},
							1500
						)

						.animate(
							{
								scale: 1.1
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)
					

					text
						.delay(1500)

						.animate(
							{
								bottom: "5px",
								opacity: 1		
							},
							1000
						)
					break;
				case 2: 

					var me = ".para-slide[data-slide='2'] .para-l",
						background = $( me + "0"),
							 panel = $( me + "1"),
							people = $( me + "2"),
					   	specialist = $( me + "3"),
						   monitor = $( me + "4"),
							  text = $( me + "t b");

					people
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(1500)

						.animate(
							{
								scale: 1.1
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)


					panel
						.animate(
							{
								left: "-40px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.animate(
							{
								opacity: 1
							},
							1500
						)

						.animate(
							{
								scale: 1.1,
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)


					monitor
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.animate(
							{
								opacity: 1
							},
							1500
						)

						.animate(
							{
								scale: 1.1,
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)


					background
						.animate(
							{
								left: "-40px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(1500)

						.animate(
							{
								scale: 1.1
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						
					specialist
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.animate(
							{
								opacity: 1
							},
							1500
						)

						.animate(
							{
								scale: 1.1
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					
					text
						.delay(1500)

						.animate(
							{
								bottom: "5px",
								opacity: 1		
							},
							1000
						)

					break;
				case 3: 

					var me = ".para-slide[data-slide='3'] .para-l",
						background = $( me + "0"),
							  blur = $( me + "1"),
							   man = $( me + "2"),
							  text = $( me + "t b");

					blur

						.animate(
							{
								left: "-30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.animate(
							{
								opacity: 0
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.animate(
							{
								scale: 1.1,
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					man
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.animate(
							{
								opacity: 1
							},
							1500
						)

						.animate(
							{
								scale: 1.1,
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					background

						.animate(
							{
								left: "-30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(1500)

						.animate(
							{
								scale: 1.1,
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					text
						.delay(1500)

						.animate(
							{
								bottom: "5px",
								opacity: 1		
							},
							1000
						)

					break;
				case 4: 
					var me = ".para-slide[data-slide='4'] .para-l",
						background = $( me + "0"),
							  wall = $( me + "1"),
						specialist = $( me + "2"),
							 woman = $( me + "3"),
							  text = $( me + "t b");

					wall
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(3000)

						.animate(
							{
								scale: 1.1,
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					woman
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(3000)

						.animate(
							{
								scale: 1.1,
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					specialist
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.animate(
							{
								opacity: 1
							},
							1500
						)

						.delay(1500)

						.animate(
							{
								scale: 1.1,
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					background
						.animate(
							{
								left: "15px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(3000)

						.animate(
							{
								scale: 1.05,
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					text
						.delay(1500)

						.animate(
							{
								bottom: "5px",
								opacity: 1		
							},
							1000
						)

					break;
				case 5: 
					var me = ".para-slide[data-slide='5'] .para-l",
						background = $( me + "0"),
							   car = $( me + "1"),
					   stationblur = $( me + "22"),
					   stationback = $( me + "2"),
					   	   station = $( me + "3"),
						specialist = $( me + "4"),
							  text = $( me + "t b");

					car
						.animate(
							{
								left: "-30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.animate(
							{
								opacity: 1
							},
							1500
						)

						.delay(1500)

						.animate(
							{
								scale: 1.1								
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					station
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(3000)

						.animate(
							{
								scale: 1.1,
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					specialist
						.animate(
							{
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.animate(
							{
								opacity: 1
							},
							1500
						)

						.delay(1500)

						.animate(
							{
								scale: 1.1,
								left: "30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					background
						.animate(
							{
								left: "-30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(3000)

						.animate(
							{
								scale: 1.1
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					stationback
						.animate(
							{
								left: "-30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.delay(3000)

						.animate(
							{
								scale: 1.1
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					stationblur
						.animate(
							{
								left: "-30px"
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

						.animate(
							{
								opacity : 0
							},
							{
								easing: 'swing',
								duration: 1500
							}
						)

					text
						.delay(1500)

						.animate(
							{
								bottom: "5px",
								opacity: 1		
							},
							1000
						)

					break;
			}
		}

		function autoChange() {
			if (!isAni) move(-1);
		}

		function move(to) {


			if (to == -1) {	
				to = ( indexId == N )? 0 : ++indexId; 
			}

			slideInit(to);

			var next = $(".visual-cont .para-slide:nth-child("+ (to+1) +")"),
				prev = $(".visual-cont .para-slide:nth-child("+ (prevSlide+1) +")");

			indexId = to

			prevSlide = indexId;
			
			btn.removeClass("active");
			$(btn[indexId]).addClass("active");	

			isAni = true;
			prev.fadeOut(500, function () {
				for (i=0; i<=N; i++) slideReInit(i);
			});
			next.fadeIn(1600, function () { 
				isAni = false;
				slideStart(to);
			});

		}

		function swipeChange (n) {
			$(arrs[n]).trigger("click");
			clearInterval(_interval);
		}

	if (getPageSize()[2] > 700) {
		
		var N = 5;

		//случайный индекс первого слайда
		var rndIndx = rand(0, N);

		var cont = $(".visual-cont"),
			zone = $("#serv-ind"),
			arrs = $(".para-arr"),
			btn = $(".para-dot"),
			indexId = rndIndx,
			prevSlide = rndIndx,
			isAni = false;

		cont.children("div").hide();

		move(rndIndx);

		btn
		.each(function(i){
			$(this).attr('slide-num', i);
		})
		.on('click', function(){
			if (!isAni) move(+$(this).attr('slide-num'));
		})

		arrs.on( "click", function() {

			var to;
			if (!isAni) {

				if ( $(this).hasClass("left") ) {
					to = (indexId == 0 )? N : --indexId;
				} else {
					to = (indexId == N )? 0 : ++indexId;
				}
				move(to);
			}
		})

		zone.on("mouseenter", function() {
			clearInterval(_interval);
		})

		zone.on("mouseleave", function() {
			_interval = setInterval( autoChange, 10000 );
		})

		var IE = (window.ActiveXObject === undefined)? false : true;
		if (!IE) {
			zone
				.on("swipeleft",  function () { if (!isAni) swipeChange(1); })
				.on("swiperight", function () { if (!isAni) swipeChange(0); })
		}
	}

	var _interval = setInterval( autoChange, 10000 );

}