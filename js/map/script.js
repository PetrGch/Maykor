$(function () {
	"use strict";

	var mapSupportTouches = ('ontouchstart' in document.documentElement);

	//if(!mapSupportTouches){
		$('map area').on('mouseenter',activeFO );
		$('map area').on('mouseleave', deActiveFO);
/*	}else{
		$('map area').on('touch', activeFO);
	}*/

	$('map area').on('click', function  (e) {
		e.preventDefault()
		$(e.currentTarget).addClass('selected');
		var fo_id = $(e.currentTarget).attr('data-value');
		$('.map-filter [data-value="'  +  fo_id + '"]').trigger('click');
		return false;
	})


	function activeFO (e) {
		var   area_element = $('#map-area' + $(e.currentTarget).data('num'));
		
		$('.show').removeClass('show');
		area_element.addClass('show');
		

		var timeOut = setTimeout(function () {
			area_element.find('.map_circle').rotate({
				animateTo: 30,
				duration: 500,
				callback: function  () {
					area_element.find('.map_circle').rotate({animateTo:0,duration: 500});
				}
			})
		}, 500) 

		$(e.currentTarget).one('mouseleave', function  () {
			clearTimeout(timeOut);
			area_element.find('.map_circle').rotate(0);
		});

	}

	function deActiveFO (e) {
		if($(e.currentTarget).hasClass('selected')) return false;
		var   area_element = $('#map-area' + $(e.currentTarget).data('num'));
		area_element.removeClass('show');
	}


	$('.chooseMap').on('click', function(e){
		var mapId= $(e.currentTarget).attr('data-map');
		
		if (mapId == 'mapEurope'){
			location = '/clients/?fstate=europe';
		} else {
			location = '/clients/';
		}
		$('.chooseMap.active').removeClass('active');
		$(e.currentTarget).addClass('active')
	});


	var IE = (window.ActiveXObject === undefined)? false : true;
	if (IE) {
		$("area").on("focus", function() { $(this).blur(); })
	}

});