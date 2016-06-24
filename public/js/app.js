
$(function() {
	$(document).on('click', '.bw-modal', function(e) {
		e.preventDefault();
		bw.ajaxmodal($(this));
	});

	$(document).on('click', '.bw-ajaxlink', function(e) {
		e.preventDefault();
		bw.ajaxlink($(this));
	});
});

var bw = {
	ajaxloader: null,
	ajaxmodal: function(link) {
		var id = link.data('data-id') != null ? link.data('data-id') : 'ajax-modal';
		var size = link.data('data-size') != null ? ' modal-' + link.data('data-size') + ' ' : '';
		var animation = link.data('data-animation') != null ? link.data('data-animation') : 'fadein';
		var overlaySpeed = link.data('data-overlaySpeed') != null ? link.data('data-overlaySpeed') : '200';
		var overlayColor = link.data('data-overlayColor') != null ? link.data('data-overlayColor') : '#36404a';

		var backdrop = link.data('data-backdrop') != null ? link.data('data-backdrop') : true;
		var keyboard = link.data('data-keyboard') != null ? link.data('data-keyboard') : true;

		var modal = $('<div id="' + id + '" class=" '+animation+'  modal-demo"  aria-labelledby="' + id + '" aria-hidden="true">ii</div>');

		var loader = this.ajaxloader;

		if (loader != null) {
			loader.appendTo(modal);
		}
		
		$('body').append(modal);


		$.ajax({
			url: link.attr('href'),
			type: 'get',
			success: function(response) {
				if (response.success == undefined) {
					modal.html(response);
					Custombox.open({
						target: "#"+id,
						effect: animation,
						overlaySpeed: overlaySpeed,
						overlayColor: overlayColor
					});

				}
			}
		});
	},
	ajaxlink: function(link) {
		if (link.data('confirm') == null) {
			doAjax()
		} else {
			bootbox.confirm(link.data('confirm'), function(result) {
				if (result) {
					doAjax();
				}
			});
		}

		function doAjax() {
			$.getJSON(link.attr('href'), function(response) {
				if (response.success) {
					if (link.data('callback') == null) {
						link.replaceWith(response.data.html)
					} else {
						var func = window[link.data('callback')];
						if (typeof func == 'function') {
							func(link, response);
						}
					}
				}
			});
		}
	},
	msgtpl: function(type, msg, duration) {
		return $('<div class="alert alert-' + type + ' ' + (duration !== false ? 'alert-dismissible' : '') + '" role="alert">' +
			(duration !== false ? '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
				'<span aria-hidden="true">&times;</span></button>' : '') + msg + '</div>');
	},
	msg: function(type, msg, duration) {
		var alertwrap = $('<div id="alertwrap"></div>');
		alertwrap.append('<div class="alert-container"></div>');

		var alert = this.msgtpl(type, msg, duration);

		if ($('#alertwrap').length == 0) {
			$('body').append(alertwrap);
		}

		var alertContainer = $('#alertwrap').find('.alert-container');

		if (duration === false) {
			alertContainer.empty();
		}

		alertContainer.append(alert);

		if (duration > 0) {
			window.setTimeout(function() {
				alert.fadeOut(function() {
					alert.remove();
				});
			}, duration);
		}
	},
	lockform: function(form) {
		$(form).find('button[type="submit"]').addClass('Loading').button('loading');
	},
	unlockform: function(form) {
		$(form).find('button[type="submit"]').removeClass('Loading').button('reset');
	},
	closemodal: function(form) {
		$('body').find(form).closest('.modal').modal('hide');
	}
};


$(document).ajaxComplete(function(event, xhr, settings) {

    var code, status, timeout, response = 0;

    try {
        response = $.parseJSON(xhr.responseText);
    } catch (e) {
        //console.log(e)
    }

    status = (response == 0) ? xhr.status : response;
    if (status != 0 && status != null) {
        var code = status.code != undefined ? status.code : 0;
        if (code == 0) {
            if (response.data != undefined && response.data.redir != undefined) {
                if (response.message != null) {
                	$.Notification.notify('warning','top right','Warning', response.message + '. redirecting&hellip;');
                    timeout = 0;
                }
                setTimeout(function() {
                    window.location = response.data.redir;
                }, timeout);
            }

            if (response.message != undefined && response.message != null && response.message.length > 0 && response.data.redir == undefined) {
                $.Notification.autoHideNotify(response.success ? 'success' : 'warning','top right',response.success ? 'Success' : 'Warning', response.message);
            }

            if (response.data != undefined && response.data.errors != undefined) {
                var msg = '<strong>Validation failed</strong> Please correct them and try again <br/>';
                $.each(response.data.errors, function(field, err) {
                    $.each(err, function(i, e) {
                        msg = msg + e + '<br/>';
                    });
                });

                $.Notification.autoHideNotify('warning','top right', msg);
            }
        }
    }

    $(window).resize();
});

$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="hash"]').attr('content')
    }
});


jQuery(document).ready(function() {
    // Select2
    $(".select2").select2();

    //Date range picker
    $('.input-daterange-datepicker').daterangepicker({
    	buttonClasses: ['btn', 'btn-sm'],
    	applyClass: 'btn-default',
    	cancelClass: 'btn-white'
    });
});


