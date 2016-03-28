 /*!
 * Buttons helper for fancyBox
 * version: 1.0.5 (Mon, 15 Oct 2012)
 * @requires fancyBox v2.0 or later
 *
 * Usage:
 *     $(".fancybox").fancybox({
 *         helpers : {
 *             buttons: {
 *                 position : 'top'
 *             }
 *         }
 *     });
 *
 */
(function ($) {
	//Shortcut for fancyBox object
	var F = $.fancybox,
		html = "";

	html += '<div id="fancybox-buttons">';
	html += 	'<a href="" class="a-null downloader" download>';
	html +=			'<input class="f-button bSave" type="button" value="Сохранить" />';
	// html += 		'<input type="button" id="subscribe" class="f-button bSubs" data-rubric="2" value="Подписаться на рассылку" onclick="" />';
	html += 		'<input class="f-button bSand" id="sender" data-file="" type="button" value="Отправить на e-mail" />';
	html +=		'</a>';
	html +=	'</div>';
	html += '<div class="soc-video">';
	html +=		'<div id="vk_share"></div>';
	html +=		'<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Поделиться</a>';
	html +=		'<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>';
	html +=		'<script src="//platform.linkedin.com/in.js" type="text/javascript">lang: ru_RU</script>';
	html +=		'<script type="IN/Share" data-counter="right"></script>';
	html +=	'</div>';



	//Add helper object
	F.helpers.mybuttons = {
		defaults : {
			skipSingle : false, // disables if gallery contains single image
			position   : 'top', // 'top' or 'bottom'
			tpl        : html
		},

		list : null,
		buttons: null,

		/*beforeLoad: function (opts, obj) {
			//Remove self if gallery do not have at least two items

			if (opts.skipSingle && obj.group.length < 2) {
				obj.helpers.mybuttons = false;
				obj.closeBtn = true;

				return;
			}

			//Increase top margin to give space for buttons
			obj.margin[ opts.position === 'bottom' ? 2 : 0 ] += 10;
		},*/

		onPlayStart: function () {
			if (this.buttons) {
				this.buttons.play.attr('title', 'Pause slideshow').addClass('btnPlayOn');
			}
		},

		onPlayEnd: function () {
			if (this.buttons) {
				this.buttons.play.attr('title', 'Start slideshow').removeClass('btnPlayOn');
			}
		},

		afterShow: function (opts, obj) {
			var buttons = this.buttons;
			var e = $.fancybox.current;

			if (!buttons) {
				this.list = $(opts.tpl).addClass(opts.position).appendTo('div.fancybox-wrap');

				buttons = {
					save   : this.list.find('.bSave'),
					send   : this.list.find('.bSend'),
					subs   : this.list.find('.bSubs'),
				}
			}

			if($('div.fancybox-wrap').find('input').length == 0){
				this.list.appendTo('div.fancybox-wrap')
			}

			location.hash = 'photo-' + e.element.attr('id');
			$('body').find('a.downloader').attr('href', e.element.attr('href'));
			$('body').find('#sender').attr('data-file', e.element.attr('href'));

			this.buttons = buttons;
			this.onUpdate(opts, obj);

			if($("#vk_share").find('table').length == 0){
				var button = VK.Share.button(false, {type: "button", text: "Поделиться"});
				$("#vk_share").append(button);
			}

			/*(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=1484890991724023";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));*/

		},

		onUpdate: function (opts, obj) {
			var toggle;

			if (!this.buttons) {
				return;
			}

			/*toggle = this.buttons.toggle.removeClass('btnDisabled btnToggleOn');

			//Size toggle button
			if (obj.canShrink) {
				toggle.addClass('btnToggleOn');

			} else if (!obj.canExpand) {
				toggle.addClass('btnDisabled');
			}*/
		},

		beforeClose: function () {
			if (this.list) {
				this.list.remove();
			}

			this.list    = null;
			this.buttons = null;
		}
	};

}(jQuery));
