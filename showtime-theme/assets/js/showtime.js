/**
 * Showtime Entertainment — menu overlay + quote-form feedback.
 * No dependencies. Animation: none by design.
 */
( function () {
	'use strict';

	// ----- Full-screen menu overlay -----
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
			// "Close" or any overlay link closes it.
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

	// ----- Quote form feedback tags (?enquiry=received|missing) -----
	var params = new URLSearchParams( window.location.search );
	var state = params.get( 'enquiry' );
	if ( state ) {
		var tag = document.querySelector(
			'received' === state ? '.st-tag--success' : '.st-tag--warning'
		);
		if ( tag ) {
			tag.hidden = false;
		}
	}

	// ----- Client-side required check mirrors the server rule -----
	var form = document.querySelector( '.st-form form' );
	if ( form ) {
		form.addEventListener( 'submit', function ( e ) {
			var name = form.querySelector( '[name="st_name"]' );
			var email = form.querySelector( '[name="st_email"]' );
			if ( ( name && ! name.value.trim() ) || ( email && ! email.value.trim() ) ) {
				e.preventDefault();
				var warn = document.querySelector( '.st-tag--warning' );
				var ok = document.querySelector( '.st-tag--success' );
				if ( ok ) {
					ok.hidden = true;
				}
				if ( warn ) {
					warn.hidden = false;
				}
			}
		} );
	}
} )();
