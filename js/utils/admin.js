;(function($, window, document, undefined) {
	$(function() {
		function switchTopLevelMenuLinkURL($item, $switch) {
			const newUrl = $switch.attr('href');

			$item.attr('href', newUrl);
		}

		switchTopLevelMenuLinkURL($('.toplevel_page_my-brindle'), $('#toplevel_page_my-brindle > .wp-submenu > .wp-first-item + li > a'));


		function qp_updatePopupTitle() {
			var crbPopupTitleField = $('[name="carbon_fields_compact_input[_qp_form_title]"]');

			if (crbPopupTitleField.length < 1) {
				return;
			}

			$(window).on('load', function() {
				$('#title').val(crbPopupTitleField.val());
			});

			crbPopupTitleField.on('input', function() {
				$('#title').val($(this).val());
			});
		}

		qp_updatePopupTitle();

		function qp_dashboardSetCookie(cookieName, cookieValue, expirationDays) {
			const date = new Date();
			date.setTime(date.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
			const expires = "expires="+ date.toUTCString();
			document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
		}

		function snoozeUpsell() {
			$('.js-upsell-snooze').on('click', function(event) {
				event.preventDefault();

				$(this).closest('.qp-upsell').remove();
	
				qp_dashboardSetCookie('qp_library_upsell_hidden', true, 15);
			});
		}

		snoozeUpsell();
	});
})(jQuery, window, document);