<<<<<<< HEAD
/* global postboxes:true, commentL10n:true */
=======
/* global postboxes, commentL10n */
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
jQuery(document).ready( function($) {

	postboxes.add_postbox_toggles('comment');

<<<<<<< HEAD
	var stamp = $('#timestamp').html();
	$('.edit-timestamp').click(function () {
		if ($('#timestampdiv').is(':hidden')) {
			$('#timestampdiv').slideDown('normal');
			$('.edit-timestamp').hide();
		}
		return false;
	});

	$('.cancel-timestamp').click(function() {
		$('#timestampdiv').slideUp('normal');
=======
	var $timestampdiv = $('#timestampdiv'),
		$timestamp = $( '#timestamp' ),
		stamp = $timestamp.html(),
		$timestampwrap = $timestampdiv.find( '.timestamp-wrap' ),
		$edittimestamp = $timestampdiv.siblings( 'a.edit-timestamp' );

	$edittimestamp.click( function( event ) {
		if ( $timestampdiv.is( ':hidden' ) ) {
			$timestampdiv.slideDown( 'fast', function() {
				$( 'input, select', $timestampwrap ).first().focus();
			} );
			$(this).hide();
		}
		event.preventDefault();
	});

	$timestampdiv.find('.cancel-timestamp').click( function( event ) {
		// Move focus back to the Edit link.
		$edittimestamp.show().focus();
		$timestampdiv.slideUp( 'fast' );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		$('#mm').val($('#hidden_mm').val());
		$('#jj').val($('#hidden_jj').val());
		$('#aa').val($('#hidden_aa').val());
		$('#hh').val($('#hidden_hh').val());
		$('#mn').val($('#hidden_mn').val());
<<<<<<< HEAD
		$('#timestamp').html(stamp);
		$('.edit-timestamp').show();
		return false;
	});

	$('.save-timestamp').click(function () { // crazyhorse - multiple ok cancels
		var aa = $('#aa').val(), mm = $('#mm').val(), jj = $('#jj').val(), hh = $('#hh').val(), mn = $('#mn').val(),
			newD = new Date( aa, mm - 1, jj, hh, mn );

		if ( newD.getFullYear() != aa || (1 + newD.getMonth()) != mm || newD.getDate() != jj || newD.getMinutes() != mn ) {
			$('.timestamp-wrap', '#timestampdiv').addClass('form-invalid');
			return false;
		} else {
			$('.timestamp-wrap', '#timestampdiv').removeClass('form-invalid');
		}

		$('#timestampdiv').slideUp('normal');
		$('.edit-timestamp').show();
		$('#timestamp').html(
			commentL10n.submittedOn + ' <b>' +
			$( '#mm option[value="' + mm + '"]' ).text() + ' ' +
			jj + ', ' +
			aa + ' @ ' +
			hh + ':' +
			mn + '</b> '
		);
		return false;
=======
		$timestamp.html( stamp );
		event.preventDefault();
	});

	$timestampdiv.find('.save-timestamp').click( function( event ) { // crazyhorse - multiple ok cancels
		var aa = $('#aa').val(), mm = $('#mm').val(), jj = $('#jj').val(), hh = $('#hh').val(), mn = $('#mn').val(),
			newD = new Date( aa, mm - 1, jj, hh, mn );

		event.preventDefault();

		if ( newD.getFullYear() != aa || (1 + newD.getMonth()) != mm || newD.getDate() != jj || newD.getMinutes() != mn ) {
			$timestampwrap.addClass( 'form-invalid' );
			return;
		} else {
			$timestampwrap.removeClass( 'form-invalid' );
		}

		$timestamp.html(
			commentL10n.submittedOn + ' <b>' +
			commentL10n.dateFormat
				.replace( '%1$s', $( 'option[value="' + mm + '"]', '#mm' ).attr( 'data-text' ) )
				.replace( '%2$s', parseInt( jj, 10 ) )
				.replace( '%3$s', aa )
				.replace( '%4$s', ( '00' + hh ).slice( -2 ) )
				.replace( '%5$s', ( '00' + mn ).slice( -2 ) ) +
				'</b> '
		);

		// Move focus back to the Edit link.
		$edittimestamp.show().focus();
		$timestampdiv.slideUp( 'fast' );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	});
});
