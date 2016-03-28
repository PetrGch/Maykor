function initSomeElements() {
	//форма отклика на вакансию
	$(".vacancy_feedback").on("click", function(e) {
		var id = $(this).data('id');
		var city = $(this).parents('div.vac').find('b:first').attr('data-value');
		$( ".popup .popup-content" ).load( "/about/career/ajax_feedback.php", {'VACANCY_ID': id, 'CITY': city}, function(){
			$(".feedback").trigger("click");
			initDDs(".feedback-form.big");
			initPMask();
		});
	});

	//форма отклика на вакансию
	$(".vacancy_work").on("click", function(e) {
		$( ".popup .popup-content" ).load( "/about/career/work_here.php", function(){
			$(".feedback").trigger("click");
			initDDs(".feedback-form.big");
			initPMask();
		});
	});

	//форма регистрации на мероприятие
	$(".activity_register").on("click", function(e) {
		var id = $(this).parents('div.active-content').attr('data-id');
		$( ".popup .popup-content" ).load( "/press/activity/ajax_register.php", {'ACTIVITY_ID': id}, function(){
			$(".feedback").trigger("click");
			initDDs(".feedback-form.big");
			initPMask();
		});
	});

	//формы обратной связи в услугах
	$(".service_feedback").on("click", function(e) {
		var code = $(this).data('code');
		var user = $(this).data('user');
		$( ".popup .popup-content" ).load( "/services/service_feedback.php", {'SERVICE_CODE': code, 'USER': user}, function(){
			$(".feedback").trigger("click");
			initDDs(".feedback-form.big");
			initPMask();
		});
	});

	//формы обратной связи по кнопке из сниппета
	$("input.snippet_feedback").on("click", function(e) {
		var code = $(this).parents('div.service-head').data('code');
		var user = $(this).data('user');
		$( ".popup .popup-content" ).load( "/services/service_feedback.php", {'SERVICE_CODE': code, 'USER': user}, function(){
			$(".feedback").trigger("click");
			initDDs(".feedback-form.big");
			initPMask();
		});
	});

	//формы создания отзыва в разделе Клиенты
	$(".response_create").on("click", function(e) {
		$( ".popup .popup-content" ).load( "/clients/responses/response_create.php", function(){
			$(".feedback").trigger("click");
			initDDs(".feedback-form.big");
			initPMask();
		});
	});

	//добавление фото в хеш
	$('body').on('click', 'a.photo-hash', function(){
		location.hash = 'photo-' + $(this).attr('id');
	});
	
	$('body').on('click', 'a.photo', function(){
		var id = $(this).attr('data-id');
		$('#'+id).find('a:first').trigger('click');
	});
}

//фильтрация элементов Достижения и рейтинги
function filterAchieve(){
	$.post('/about/key_facts/ajax_achievements.php', {'year': $('div[name="achieve_year"]').attr("data-value")}, function(result){
		$('#achieve_result').html(result);
		setTimeout( function() { calcSideBar();}, 500);
	});
}

//фильтрация элементов Филиальная сеть
function filterFederalState(){
	//var comp = $('#federal_filter').parent().parent().attr('id');
	//var bxajaxid = $('#federal_filter').parent().parent().attr('id').substring(5);
	var fstate = $('body').find('#federal_filter').attr("data-value");

	//BX.ajax.insertToNode('/filials/?bxajaxid='+bxajaxid+'&fstate='+fstate, comp);
	location = '/filials/fstate='+fstate;

	//$('div.map-hover-areas').children('div').removeClass('show');
	//$('div[data-fo="'+fstate+'"]').addClass('show');

	/*$("body, html").animate(
		{
			scrollTop : $("#federal_filter").offset().top - 65
		},
		500
	)*/
	return false;
}


//фильтрация элементов Вакансии
function filterVacancy(e){
	//var comp = $('table.m-filters').parent().attr('id');
	//var bxajaxid = comp.substring(5);
	var city = $('div[name="vacancy_city"]').attr("data-value");
	var scope = $('div[name="vacancy_scope"]').attr("data-value");
	var target = e.parents('div.f-dd').attr('id');
	var pagen = 1;
	location = '/about/career/vacancy/?scope='+scope+'&city='+city+'&target='+target+'&PAGEN_3='+pagen;
	//BX.ajax.insertToNode('/about/career/?scope='+scope+'&city='+city+'&bxajaxid='+bxajaxid, comp);
}

function feedbackVacancy(){
	$('.two_feedback').on("click", function(e) {
		$(".popup").fadeToggle("fast", function() {
			if ( $(".popup").css("display") == "none" ){
				$( ".popup .popup-content" ).load("/press/ajax_main_feedback.php");
			}
		});
	});
}

//фильтрация Медиабиблиотеки
function filterMedia(e){
	/*$.post('/about/medialibrary/ajax.php', {'branch': $('div[name="media-branch"]').attr("data-value"), 'service': $('div[name="media-service"]').attr("data-value")}, function(result){
		$('#materials').html(result);
		initSubmenu('body');
	});*/
	var branch = $('div[name="media-branch"]').attr("data-value");
	var service = $('div[name="media-service"]').attr("data-value");
	var target = e.parents('div.f-dd').attr('id');
	location = location.pathname+'?service='+service+'&branch='+branch+'&target='+target;
}

//фильтрация при клике на название города
function onCityClick(div){
	var city = div.children('b'),
		dd = $('div[name="vacancy_city"]');
	
	dd.children(".f-dd-head").html( city.text() );
	dd.attr("data-value", city.attr("data-value") );
	eval( dd.attr('data-on-change') ); 
}

//фильтрация Партнеров
function filterPartners(){
		//var comp = $('#first_filter').parent('div').attr('id');
		//var bxajaxid = $('#first_filter').parent('div').attr('id').substring(5);
		var sfere = $('body').find('div[name="partner-sfere"]').attr("data-value");
		//BX.ajax.insertToNode('/about/partners/?sfere='+sfere+'&bxajaxid='+bxajaxid, comp);
		location = '/about/partners/?sfere='+sfere;
		return true;
}

//фильтрация элементов в Пресс-Центре
function filterPress(e){
		var rubric = ($(e.target).parents('div.f-dd').data('rubric'));
		//var comp = $('#'+rubric+'_filter').children('div').attr('id');
		//var bxajaxid = $('#'+rubric+'_filter').children('div').attr('id').substring(5);
		var month = $('div[name="'+rubric+'-month"]').attr("data-value");
		var year = $('div[name="'+rubric+'-year"]').attr("data-value");
		if (year != 'archive'){
			location = '/press/'+rubric+'/?'+rubric+'_month='+month+'&'+rubric+'_year='+year
			//BX.ajax.insertToNode(location.pathname+'?'+rubric+'_month='+month+'&'+rubric+'_year='+year+'&bxajaxid='+bxajaxid, comp);
		}
		else{
			location = '/press/'+rubric+'/archive.php';
		}
		return true;
}

//фильтрация архива в Пресс-Центре
function filterPressArchive(e){
		var rubric = ($(e.target).parents('div.f-dd').data('rubric'));
		//var comp = $('#'+rubric+'_filter').children('div').attr('id');
		//var bxajaxid = $('#'+rubric+'_filter').children('div').attr('id').substring(5);
		var month = $('div[name="'+rubric+'-month"]').attr("data-value");
		var year = $('div[name="'+rubric+'-year"]').attr("data-value");
		location = '/press/'+rubric+'/archive.php?'+rubric+'_month='+month+'&'+rubric+'_year='+year;
			//BX.ajax.insertToNode(location.pathname+'?'+rubric+'_month='+month+'&'+rubric+'_year='+year+'&bxajaxid='+bxajaxid, comp);
		return true;
}

//фильтрация Клиентов
function filterClients(e){
		//var comp = $('#first_filter').parent().attr('id');
		//var bxajaxid = $('#first_filter').parent().attr('id').substring(5);
		var fstate = $('body').find('#fstate').attr("data-value");
		var branch = $('body').find('#branch').attr("data-value");
		var service = $('body').find('#service').attr("data-value");
		var target = e.parents('div.f-dd').attr('id');
		if ($('body').find('#solution').length != 0){
			var solution = $('body').find('#solution').attr("data-value");
		}
		else{
			var solution = '';
		}

		location = '/clients/?target='+target+'&fstate='+fstate+'&branch='+branch+'&service='+service+'&solution='+solution;
		//BX.ajax.insertToNode('/clients/?bxajaxid='+bxajaxid+'&target='+target+'&fstate='+fstate+'&branch='+branch+'&service='+service+'&solution='+solution, comp);

		/*if(e.parents('div#fstate').length != 0){
			$('div.map-hover-areas').children('div').removeClass('show');
			$('div[data-fo="'+fstate+'"]').addClass('show');
		}*/

		/*$("body, html").animate(
			{
				scrollTop : $("#fstate").offset().top - 65
			},
			500
		)*/
		//location.hash = '?fstate='+fstate+'&branch='+branch+'&service='+service+'&solution='+solution;
		return false;
}

//установка значенией фильтров Клиентов
function addSelectedDropdown(){
	var target = [$('#branch'), $('#service'), $('#year'), $('#solution'), $('#service_two')];
	$.each(target, function(key, div){
		selected = $(div).find('div[data-value="'+$(div).data('value')+'"]');
		$(div).find('div.f-dd-head').text(selected.text());
	});
}

//фильтрация Отзывов
function filterFeedbacks(e){
		//var comp = $('#first_filter').parent().attr('id');
		//var bxajaxid = $('#first_filter').parent().attr('id').substring(5);
		var branch = $('body').find('#branch').attr("data-value");
		var service = $('body').find('#service').attr("data-value");
		var year = $('body').find('#year').attr("data-value");
		var target = e.parents('div.f-dd').attr('id');

		location = '/clients/responses/?branch='+branch+'&year='+year+'&target='+target;//+'&service='+service;
		//BX.ajax.insertToNode('/clients/responses/?bxajaxid='+bxajaxid+'&branch='+branch+'&service='+service, comp);
		return false;
}

//фильтрация Историй успеха
function filterHistories(e){
		//var comp = $('#first_filter').parent().attr('id');
		//var bxajaxid = $('#first_filter').parent().attr('id').substring(5);
		var branch = $('body').find('div[name="branch"]').attr("data-value");
		var service = $('body').find('div[name="service"]').attr("data-value");
		var target = e.parents('div.f-dd').attr('name');
		location = location.pathname+'?service='+service+'&branch='+branch+'&target='+target;

		//BX.ajax.insertToNode('/clients/succes_history/?bxajaxid='+bxajaxid+'&branch='+branch+'&service='+service, comp);

		return false;
}

//реализация подписки
function addSubscribe(){
	//console.log($('#EMAIL').val());
	var email = $('#EMAIL').val();
	var fio = $('#FIO').val();
	var company = $('#COMPANY').val();
	var role = $('#ROLE').val();
	var rub_id = $('#RUB_ID').val();
	$.post('/subscribe/ajax.php', {'EMAIL': email, 'FIO': fio, 'COMPANY': company, 'ROLE': role, 'RUB_ID': rub_id}, function(result){
		if ($.trim(result) != ''){
			var mail =$('#EMAIL');
			mail.addClass('error');
			mail.attr('data-prev-value', email);
			mail.val(result);
		}
		else{
			$(".feedback").trigger("click");
		}
	});
}

//реализация отправки файла по почте
function sendFile(){
	//console.log($('#EMAIL').val());
	var email = $('#EMAIL').val();
	var url = $('#URL').val();
	$.post('/about/medialibrary/sender.php', {'EMAIL': email, 'URL': url}, function(result){
		if ($.trim(result) != ''){
			var mail =$('#EMAIL');
			mail.addClass('error');
			mail.attr('data-prev-value', email);
			mail.val(result);
		}
		else{
			$(".feedback").trigger("click");
		}
	});
}

//смена списка городов при изменении федерального округа в форме обратной связи
function changeFstate(fstate){
	BX.showWait();
	var code = fstate.data('value');
	$.post('/about/contacts/ajax_cities.php', {'fstate': code}, function(result){
		if (result != ''){
			$("div[name='city']").html(result);
			$('input[data-name="FEDERAL_STATE"]').val(fstate.html());
			changeCity($("div[name='city']").children('div'));
			initDDs("div[name='city']");
			//console.log($("div[name='city']").children().html());
		}
		else{
			$('input[data-name="FEDERAL_STATE"]').val(fstate.html());
			changeCity($("div[name='city']").children('div'));
		}
		BX.closeWait();
	});
}

//смена списка городов при изменении федерального округа в форме обратной связи
function changeCity(city){
	$('input[data-name="CITY"]').val(city.html());
}

//обработка адреса с хеш тегом
function byHashUrl(){
	//console.log(location.pathname);
	var yandex = /^#ym_playback.*$/;
	if(location.hash != '' && yandex.test(location.hash) == 0){
		var page = location.hash.substr(1);
		var path = location.pathname;
		var find_about = /\/about\//;
		var find_partners = /\/about\/partners\/[a-z_0-9-]+/;
		var find_services = /\/services\//;
		var find_clients = /\/clients\//;
		var find_press = /\/press\//;
		var find_media = /^&media=([a-z_0-9-]+).*$/;
		var find_photo = /^&photo=([0-9]+).*$/;


		if (find_media.test(page) != 0){
			var	video = page.replace(find_media, "$1");
			showVideo(video);
		}
		else if (find_photo.test(page) != 0){
			var	photo = page.replace(find_photo, "$1");
			showGalery(photo);
		}
		else{
			if (find_partners.test(path) != 0){
				var clear = /^(\/about\/partners\/[a-z_0-9-]+).*$/;
				path = path.replace(clear, "$1");
				path = path + '/';
			}
			else if (find_about.test(path) != 0){
				var clear = /^.*(\/about\/[a-z_0-9-]+\/)[a-z_0-9-]+\/$/;
				path = path.replace(clear, "$1");
			}
			else if (find_services.test(path) != 0){
				var clear = /^(\/services\/[a-z_0-9-]+\/)[a-z_0-9-]+\/$/;
				path = path.replace(clear, "$1");
			}
			else if (find_press.test(path) != 0){
				var clear = /^(\/press\/)[a-z_0-9-]+\/$/;
				path = path.replace(clear, "$1"); 
			}
			else if (find_clients.test(path) != 0){
				var clear = /^(\/clients\/client\/)[a-z_0-9=?]+\/$/;
				path = path.replace(clear, "$1");
			}
			location = path + page;
		}
	}
}

//запуск галереи из хеш
function showGalery(photo){
	$.post('/about/medialibrary/galery.php', {'photo': photo}, function(result){
		$('body').append(result);
		initMagnific('div.hash-images', $('div.hash-images').attr('data-code'));
		$('div.hash-images').find('#'+photo).trigger('click');
	}); 
}

//запуск видео из хеш
function showVideo(video){
	$.post('/about/medialibrary/video.php', {'video': video}, function(result){
		$('body').append(result);
		$('a.hash-video').trigger('click');
	}); 
}

//смена url для раскрывающихся разделов
function changeHash(id) {
	var href = location.href;
	var page = id;
	var path = location.pathname;
	var find_about = /\/about\//;
	var find_partners = /\/about\/partners\/[a-z_0-9-]+/;
	var find_contacts = /\/about\/contacts\/[a-z_0-9-]+/;
	var find_services = /\/services\//;
	var find_clients = /\/clients\//;
	var find_press = /\/press\//;

	
	if (find_partners.test(path) != 0){
		var clear = /^(\/about\/partners\/[a-z_0-9-]+).*$/;
		path = path.replace(clear, "$1");
		path = path + '/';
	}
	else if (find_contacts.test(path) != 0){
		var clear = /^(\/about\/contacts\/[a-z_0-9-]+).*$/;
		path = path.replace(clear, "$1");
		path = path + '/';
	}
	else if (find_about.test(path) != 0){
		var clear = /^.*(\/about\/[a-z_0-9-]+\/)[a-z_0-9-]+\/$/;
		path = path.replace(clear, "$1");
	}
	else if (find_services.test(path) != 0){
		var clear = /^(\/services\/[a-z_0-9-]+\/)[a-z_0-9-]+\/$/;
		path = path.replace(clear, "$1");
	}
	else if (find_press.test(path) != 0){
		var clear = /^(\/press\/)[a-z_0-9-]+\/?$/;
		path = path.replace(clear, "$1"); 
	}
	else if (find_clients.test(path) != 0){
		var clear = /^(\/clients\/client\/)[a-z_0-9=?]+\/$/;
		path = path.replace(clear, "$1");
	}

	if (href != path + page){
		try {
			if ( _isIE9 ) throw 'catch';
			history.replaceState(null,null,path + page);
		}
		catch(e) {
			location.hash = page;
		}
	}
}

//смена url для фотоотчетов
function changePhotoUrl(id) {
	var amp = ( id == '' ) ? '' : '&';
	var	clearpath = location.href.replace(new RegExp("\&?photo=[0-9].*",'g'), "");

	try {
		if ( _isIE9 ) throw 'catch';
		history.replaceState(null,null,clearpath + amp + id);
	}
	catch(e) {
		location.hash = amp + id;
	}
}

//смена url для видео
function changeVideoUrl(id) {
	var amp = ( id == '' ) ? '' : '&';
	var	clearpath = location.href.replace(new RegExp("\&?media=[a-z_0-9-].*",'g'), "");

	try {
		if ( _isIE9 ) throw 'catch';
		history.replaceState(null,null,clearpath + amp + id);
	}
	catch(e) {
		location.hash = amp + id;
	}
}

function initSubscribe(cont){
	//вывод формы подписки
	$(cont).on("click", "#subscribe", function(e) {
		$( ".popup .popup-content" ).load("/subscribe/subscribe_form.php", {'rubric': $(this).data('rubric')}, function(){
			$(".feedback").trigger("click");
			initFormValidation();
		});
	});
}

function initSendFile(cont){
	//вывод поп
	$(cont).on("click", "#sender", function(e) {
		$( ".popup .popup-content" ).load("/about/medialibrary/send_popup.php", {'file': $(this).data('file')}, function(){
			$(".feedback").trigger("click");
			initFormValidation();
		});
	});
}