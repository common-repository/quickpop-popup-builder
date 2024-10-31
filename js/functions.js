;(function($, window, document, undefined) {
	$(document).ready(function() {
		qp_triggerPopup();
		qp_btnHoversPopup();
		qp_hidePopupOnClick();
		qp_popupFormSubmit();
	});

	function qp_setCookie(cookieName, cookieValue, expirationDays) {
		const date = new Date();
		date.setTime(date.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
		const expires = "expires="+ date.toUTCString();
		document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
	}

	function qp_triggerPopup() {
		$(window).on('load', function() {
			var quickPopPopups = $('.qp-js-popup');
			
			quickPopPopups.each(function(index, elem) {
				var $elem = $(elem);
				var delay = $elem.data('delay');
				var regexPattern = /^\d+$/;


				if (! regexPattern.test(delay)) {
					delay = 0;
				}

				delay = parseInt(delay);
				delay *= 1000;

				setTimeout(function() {
					$elem.addClass('is-visible');
				}, delay);
			});
		});
	}

	function qp_hidePopup($popup) {
		var expirationDays = ! $popup.is('.is-submitted') ? 1 : 999;
		var cookieName = 'hide-popup-' + $popup.data('id');

		qp_setCookie(cookieName, true, expirationDays);

		$popup.removeClass('is-visible');

		setTimeout(function() {
			$popup.remove();
		}, 800);

	}

	function qp_hidePopupOnClick() {
		$('.qp-js-hide-popup').on('click', function(event) {
			event.preventDefault();
			var $popup = $(this).closest('.qp-js-popup');
			
			qp_hidePopup($popup);
		});

		$(document).on('click', function(event) {
			event.stopPropagation();

			var $eventTarget = $(event.target);

			if ($eventTarget.is('.qp-popup .qp-popup__body') || $eventTarget.closest('.qp-popup .qp-popup__body').length > 0) {
				return;
			}


			$('.qp-js-popup').each(function(index, elem) {
				qp_hidePopup($(elem));
			});

		});
	}

	function qp_btnHoversPopup() {
		$('.qp-js-btn-hover').each(function(index, elem) {
			var $elem = $(elem);
			var color = $elem.data('hoverColor');

			$elem.hover(
				function() {
					$elem.css({
						'background-color' : 'transparent',
						'color' : color,
					});
				},

				function() {
					$elem.css({
						'background-color' : color,
						'color' : '#fff',
					});
				}
			)
		})
	}

	function qp_validateEmail(email) {
		const regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		return regex.test(email);
	}

	function qp_popupFormSubmit() {
		$('.qp-popup form').on('submit', function(event) {
			event.preventDefault();
			
			var $this = $(this);
			var emailValue = $(this).find('#qp-popup-form-email-field').val();

			if (! qp_validateEmail(emailValue)) {
				$this.parent().addClass('error');

				return;
			}

	        // ajax the results!
			$.ajax({
				type: 'POST',
	        	data: {
					action: 'mbqp_ajax_form_submission',
	        		'email' : emailValue
	        	},
	            url: mbqp_options.ajax_url,
	            success: function(result) {
					$this.closest('.qp-popup').addClass('is-submitted');
	            },
	            error: function(jqXHR, textStatus, errorThrown) {
	            	alert('An unexpected error occurred, please try reloading the page.');
	            }
	        });
		});
	}
})(jQuery, window, document);
