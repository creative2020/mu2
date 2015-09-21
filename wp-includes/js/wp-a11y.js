window.wp = window.wp || {};

( function ( wp, $ ) {
	'use strict';

<<<<<<< HEAD
	var $container;
=======
	var $containerPolite,
		$containerAssertive,
		role;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

	/**
	 * Update the ARIA live notification area text node.
	 *
	 * @since 4.2.0
<<<<<<< HEAD
	 *
	 * @param {String} message
	 */
	function speak( message ) {
		if ( $container ) {
			$container.text( message );
=======
	 * @since 4.3.0 Introduced the 'ariaLive' argument.
	 *
	 * @param {String} message  The message to be announced by Assistive Technologies.
	 * @param {String} ariaLive Optional. The politeness level for aria-live. Possible values:
	 *                          polite or assertive. Default polite.
	 */
	function speak( message, ariaLive ) {
		// Clear previous messages to allow repeated strings being read out.
		clear();

		if ( $containerAssertive && 'assertive' === ariaLive ) {
			$containerAssertive.text( message );
		} else if ( $containerPolite ) {
			$containerPolite.text( message );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		}
	}

	/**
<<<<<<< HEAD
	 * Initialize wp.a11y and define ARIA live notification area.
	 *
	 * @since 4.2.0
	 */
	$( document ).ready( function() {
		$container = $( '#wp-a11y-speak' );

		if ( ! $container.length ) {
			$container = $( '<div>', {
				id: 'wp-a11y-speak',
				role: 'status',
				'aria-live': 'polite',
				'aria-relevant': 'all',
				'aria-atomic': 'true',
				'class': 'screen-reader-text'
			} );

			$( document.body ).append( $container );
		}
	} );
=======
	 * Build the live regions markup.
	 *
	 * @since 4.3.0
	 *
	 * @param {String} ariaLive Optional. Value for the 'aria-live' attribute, default 'polite'.
	 *
	 * @return {Object} $container The ARIA live region jQuery object.
	 */
	function addContainer( ariaLive ) {
		ariaLive = ariaLive || 'polite';
		role = 'assertive' === ariaLive ? 'alert' : 'status';

		var $container = $( '<div>', {
			'id': 'wp-a11y-speak-' + ariaLive,
			'role': role,
			'aria-live': ariaLive,
			'aria-relevant': 'additions text',
			'aria-atomic': 'true',
			'class': 'screen-reader-text wp-a11y-speak-region'
		});

		$( document.body ).append( $container );
		return $container;
	}

	/**
	 * Clear the live regions.
	 *
	 * @since 4.3.0
	 */
	function clear() {
		$( '.wp-a11y-speak-region' ).text( '' );
	}

	/**
	 * Initialize wp.a11y and define ARIA live notification area.
	 *
	 * @since 4.2.0
	 * @since 4.3.0 Added the assertive live region.
	 */
	$( document ).ready( function() {
		$containerPolite = $( '#wp-a11y-speak-polite' );
		$containerAssertive = $( '#wp-a11y-speak-assertive' );

		if ( ! $containerPolite.length ) {
			$containerPolite = addContainer( 'polite' );
		}

		if ( ! $containerAssertive.length ) {
			$containerAssertive = addContainer( 'assertive' );
		}
	});
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

	wp.a11y = wp.a11y || {};
	wp.a11y.speak = speak;

<<<<<<< HEAD
} )( window.wp, window.jQuery );
=======
}( window.wp, window.jQuery ));
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
