/**
 * Showtime Classic — menu overlay toggle with scroll lock.
 */
( function () {
	'use strict';

	var overlay = document.getElementById( 'st-menu-overlay' );
	var openBtn = document.querySelector( '.st-menu-open' );

	function setOpen( open ) {
		if ( ! overlay ) {
			return;
		}
		overlay.hidden = ! open;
		document.body.classList.toggle( 'st-locked', open );
		if ( openBtn ) {
			openBtn.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
		}
	}

	if ( overlay && openBtn ) {
		openBtn.addEventListener( 'click', function () {
			setOpen( true );
		} );

		overlay.addEventListener( 'click', function ( e ) {
			if ( e.target.closest( '.st-menu-close' ) || e.target.closest( 'a' ) ) {
				setOpen( false );
			}
		} );

		document.addEventListener( 'keydown', function ( e ) {
			if ( 'Escape' === e.key && ! overlay.hidden ) {
				setOpen( false );
			}
		} );
	}
} )();
