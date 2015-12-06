$(document).ready(function () {
	var paypal = $('#paypal');

	if (paypal.hasClass('active')) {
		var action = paypal.find('form').attr('action');

		paypal.on('submit', 'form', function(e) {
			e.preventDefault();
			var form = $(this),
				action = form.attr('action'),
				status = true;

			status = process.validate(form, status);
			if (status) {
				$.ajax({
					type: 'POST',
					url: action,
					data: form.serialize(),
					dataType: 'json',
					beforeSend: function() {
						form.spin("modal");
					},
					success: process.success,
					fail: process.fail
				});
			}
			
			return false;
		});
	}
});

var process = {
	success: function(data) {
		$('form').spin("modal");
		var error = $('.paypal-error'),
			success = $('.paypal-success');
		if (data.ACK == 'Failure') {
			error.removeClass('hidden');
			success.addClass('hidden');
			error.html(data.L_LONGMESSAGE0);
		} else if (data.ACK == 'Success'){
			$('form').trigger('reset');
			error.addClass('hidden');
			success.removeClass('hidden');
			success.html('Payment Success click <a href="#">HERE</a> to homepage.');
		}
	},
	fail: function(data) {

	},
	validate: function(form, status) {
		var requires = $('input, select', form);
		$.each(requires, function() {
			if ($(this).attr('data-require') == 'required' && $(this).val() == '') {
				$(this).addClass('has-error').on('change', function() {
					$(this).removeClass('has-error');
				});
			}
		});
		if (requires.hasClass('has-error')) {
			status = false;
		}

		return status;
	}
}